<?php

namespace App\Http\Controllers\Backend\Service_providers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Category;
use App\Models\ServicesPost;



class ServicesPostController extends Controller
{

    public function __construct()
    {
        $this->middleware('all-auth:Service');
    }

    public function showServicesPostForm(Request $request)
    {
    	$categories = Category::where(['parent_id'=>Auth::user()->org_type_id])->get();
        if ($request->isMethod('post'))
        {
            $this->validate($request,[
                'category_id' => 'required',
                'title' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:2024',
                'service_area'=>'required',
                'contact'=>'required|max:12',
            ]);

            $service = new ServicesPost;
            $service->category_id = $request->category_id;
            $service->title = $request->title;
            $service->sub_title = $request->sub_title;
            $service->service_area = $request->service_area;
            $service->location = $request->location;
            $service->contact = $request->contact;
            $service->description = $request->Description;
            $service->posted_by_id = Auth::user()->id;

            if ($request->hasFile('image')) {
                $dir = 'images/services-post/';
                $extension = strtolower($request->file('image')->getClientOriginalExtension());
                $fileName = str::random() . '.' . $extension;
                $request->file('image')->move($dir, $fileName);
                $service->image = $fileName;
            }
            $service->save();
            return redirect(route('ServicePro.add-service-post'))->with('add_service_flash_success','Service Successfully addeded');
        }

    return view('service-providers.add_ServicePost')->with(compact('categories'));
    }


    public function showServiceList()
    {
        $posted_by_id = Auth::user()->id;
        $services = ServicesPost::where(['posted_by_id'=>$posted_by_id])->get();
        return view('service-providers.show_ServicePost')->with(compact('services'));
    }


    public function EditServicePost(Request $request,$id)
    {
        $service = ServicesPost::find($id);
    $categories = Category::where(['parent_id'=>Auth::user()->org_type_id])->get();

        if ($request->isMethod('post'))
         {
           $this->validate($request,[
                'category_id' => 'required',
                'title' => 'required',
            ]);

            $service->category_id = $request->category_id;
            $service->title = $request->title;
            $service->sub_title = $request->sub_title;
            $service->location = $request->location;
            $service->service_area = $request->service_area;
            $service->contact = $request->contact;
            $service->description = $request->description;
            $service->posted_by_id = Auth::user()->id;

            if ($request->hasFile('image'))
            {
                $dir = 'images/services-post/';
                $extension = strtolower($request->file('image')->getClientOriginalExtension());
                $fileName =  str::random() . '.' . $extension;
                $request->file('image')->move($dir, $fileName);
                $service->image = $fileName;
            }

            $service->save();
            return redirect()->back()->with('upadte_event_flash_success','Successfully updated');
        }
        return view('service-providers.edit_ServicePost')->with(compact('categories','service'));
    }

    public function DeleteServicePost($id=null)
    {
        if (!empty($id)) {
            $data = ServicesPost::FindOrFail($id);
            if (!empty($data->image)) {
                unlink('images/services-post/'.$data->image);
            }
            ServicesPost::find($id)->delete();
            return redirect()->back()->with('delete_event_flash_success','Service successfully deleted');
        }
    }


}



