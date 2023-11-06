<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
Use App\Models\Admin;
Use App\Models\ServicesPost;
use App\Models\Category;
use Auth;
use Validator;


class ManagePostController extends Controller
{
	public function __construct()
    {
        $this->middleware('all-auth:admin');
    }

    public function showServicesList()
    {
        $services = ServicesPost::get();
        return view('Admin.ServicesPostList')->with(compact('services'));
    }

    public function deleteService($id=null)
    {
        if (!empty($id))
         {
            $data = ServicesPost::FindOrFail($id);
            if (!empty($data->image))
            {
                unlink('images/services-post/'.$data->image);
            }
            ServicesPost::find($id)->delete();
            return redirect()->back()->with('delete_event_flash_success','Service successfully deleted');
        }
    }
}
