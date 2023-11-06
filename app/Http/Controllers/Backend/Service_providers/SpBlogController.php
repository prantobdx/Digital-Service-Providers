<?php

namespace App\Http\Controllers\Backend\Service_providers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Validator;
use Illuminate\Support\Str;
use App\Models\Blog;

class SpBlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('all-auth:Service');
    }

    public function showBlogPostForm(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request,[
                'title' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png,gif',
            ]);

            $blog = new Blog;
            $blog->title = $request->title;
            $blog->sub_title = $request->sub_title;
            $blog->description = $request->Description;
            $blog->posted_by_id = Auth::user()->id;
            if ($request->hasFile('image')) {
                $dir = 'images/blog/';
                $extension = strtolower($request->file('image')->getClientOriginalExtension());
                $fileName = str::random() . '.' . $extension;
                $request->file('image')->move($dir, $fileName);
                $blog->image = $fileName;
            }

            $blog->save();
            return redirect(route('ServicePro.add-blog'))->with('add_blog_flash_success','Successfully addeded');
        }
        return view('service-providers.add_BlogPost');
    }
    public function showBlogList()
    {
        $posted_by_id = Auth::user()->id;
        $blogs = Blog::where(['posted_by_id'=>$posted_by_id])->get();
    return view('service-providers.Show_BlogPost_List')->with(compact('blogs'));
    }

    public function deleteBlog($id=null)
    {
        if (!empty($id)) {
            $data = Blog::FindOrFail($id);
            if (!empty($data->image)) {
                unlink('images/blog/'.$data->image);
            }
            Blog::find($id)->delete();
            return redirect()->back()->with('delete_blog_flash_success','Blog successfully deleted');
        }

    }
    public function showEditBlogPostForm(Request $request,$id)
    {
        $blog = Blog::find($id);

        if ($request->isMethod('post')) {
            $this->validate($request,[
                'title' => 'required',
            ]);
            $blog->title = $request->title;
            $blog->sub_title = $request->sub_title;
            $blog->description = $request->Description;
            $blog->posted_by_id = Auth::user()->id;
            if ($request->hasFile('image')) {
                $dir = 'images/blog/';
                if (!empty($blog->image)) {
                    unlink($dir.$blog->image );
                }
                $extension = strtolower($request->file('image')->getClientOriginalExtension());
                $fileName = str::random() . '.' . $extension;
                $request->file('image')->move($dir, $fileName);
                $blog->image = $fileName;
            }
            $blog->save();
            return redirect()->back()->with('upadte_blog_flash_success','Successfully updated');
        }
        return view('service-providers.edit_BlogPost')->with(compact('blog'));
    }

}
