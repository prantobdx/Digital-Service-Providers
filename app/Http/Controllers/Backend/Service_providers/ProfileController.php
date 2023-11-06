<?php

namespace App\Http\Controllers\Backend\Service_providers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Auth;
use App\Models\Category;
use App\Models\ServicesPost;
Use App\Models\ServiceProviders;

class ProfileController extends Controller
{
	public function __construct()
    {
        $this->middleware('all-auth:Service');
    }

    public function showProfile()
    {
        return view('service-providers.profile');
    }

    public function editProfile()
    {
        return view('service-providers.edit_profile');
    }

    public function updateProfile(Request $request)
    {
    	if ($request->isMethod('post')) {
	        $this->validate($request,[
	            'name' => 'required | min:4',
	            'phone' => 'required',
	        ]);

	        $id = $request->id;
	        $Sp_Profile = ServiceProviders::find($id);
	        $Sp_Profile->name = $request->name;
	        $Sp_Profile->phone = $request->phone;
	        if ($request->hasFile('image')) {
	            if (!empty($Sp_Profile->image)) {
	                unlink('images/Sp_Profile/'.$Sp_Profile->image);
	            }
	            $dir = 'images/Sp_Profile/';
	            $extension = strtolower($request->file('image')->getClientOriginalExtension());
	            $fileName = str::random() . '.' . $extension;
	            $request->file('image')->move($dir, $fileName);
	            $Sp_Profile->image = $fileName;
	        }

	        $Sp_Profile->save();
	        return redirect(route('ServicePro.edit.profile'))->with('edit_profile_flash_success','Successfully updated');
    	}else{
    		return redirect(route('ServicePro.edit.profile'))->with('edit_profile_flash_error','Something wrong !');
    	}
    }
}
