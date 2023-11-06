<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Validator;
use App\Models\Admin;
use App\Models\User;
use App\Models\Blog;
use App\Models\Review;

class Blogcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('all-auth:admin');
    }

    public function showBlogList($id=null)
    {
        $blogs = Blog::get();

        if (!empty($id)) {
            $blog = Blog::find($id);
            $blog->status = 1;
            $blog->save();
            return redirect()->back()->with('approved_blog_flash_success','Successfully approved',compact('blog'));
        }
        return view('Admin.blog_list')->with(compact('blogs'));
    }
    public function changeBlogList($id=null)
    {
        $blogs = Blog::get();

        if (!empty($id)) {
            $blog = Blog::find($id);
            $blog->status = 0;
            $blog->save();
            return redirect()->back()->with('unapproved_blog_flash_success','Unapproved the blog Successfully',compact('blog'));
        }
        return view('Admin.blog_list')->with(compact('blogs'));
    }

    public function deleteBlog($id=null)
    {
        if (!empty($id)) {
            $data = Blog::FindOrFail($id);
            if (!empty($data->image)) {
                unlink('images/blog/'.$data->image);
            }
            Blog::find($id)->delete();
            return redirect()->back()->with('delete_blog_flash_success','audio successfully deleted');
        }

    }

    public function showBlogReviewList()
    {

        $reviews = Review::get();
        return view('Admin.blog_review_list')->with(compact('reviews'));
    }

    public function deleteReview($id=null)
    {
        if (!empty($id))
        {
            Review::find($id)->delete();
            return redirect()->back()->with ('delete_message_flash_success',
                'Review successfully deleted');
        }

    }


}
