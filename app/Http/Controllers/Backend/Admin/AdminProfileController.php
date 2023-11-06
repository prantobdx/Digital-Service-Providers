<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Auth;
use Validator;
use App\Models\Admin;

class AdminProfileController extends Controller
{
	 public function __construct()
    {
        $this->middleware('all-auth:admin');
    }
    public function showProfile()
    {
    	return view('Admin.profile');
    }

    public function editProfile()
    {
        return view('Admin.edit_profile');
    }

     public function updateProfile(Request $request)
    {
    	if ($request->isMethod('post'))
    	{
	        $this->validate($request,[
	            'name' => 'required | min:4',
	            'job_title' => 'required',
	        ]);

	        $id = $request->id;
	        $admin = Admin::find($id);
	        $admin->name = $request->name;
	        $admin->job_title = $request->job_title;
	        if ($request->hasFile('image')) {
	            if (!empty($admin->image)) {
	                unlink('images/admin-profile/'.$admin->image);
	            }
	            $dir = 'images/admin-profile/';
	            $extension = strtolower($request->file('image')->getClientOriginalExtension());
	            $fileName = str::random() . '.' . $extension;
	            $request->file('image')->move($dir, $fileName);
	            $admin->image = $fileName;
	        }

	        $admin->save();
	        return redirect(route('admin.edit.profile'))->with('edit_profile_flash_success','Successfully updated');
    	}
    	else{
    		return redirect(route('admin.edit.profile'))->with('edit_profile_flash_error','Something wrong !');
    	}
    }


}
