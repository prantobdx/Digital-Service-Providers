<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\ServiceProviders;
use Illuminate\Support\Facades\Hash;
use App\Models\Blog;
use App\Models\Review;

class UserBlogController extends Controller
{
    public function showBlog()
    {
       $blogs = Blog::where(['status'=>1])->orderBy('id', 'desc')->paginate(2);
        return view('blog')->with(compact('blogs'));
    }

    public function showBlogDetails($id)
    {
        $blog = Blog::where(['status'=>1])->find($id);
        $reviews = Review::where('post_id', [$id])->orderBy('id', 'DESC')->get();
        return view('blog_details')->with(compact('blog','reviews'));
    }

     public function BlogReviewSubmit(Request $request)
    {
        if (!isset(Auth::user()->id))
         {
            return redirect()->back()->with('add_review_flash_error','Please login first...!');
         }

        if ($request->isMethod('post'))
        {
        	$this->validate($request,[
                'massage' => 'required',
            ]);
            $review = new Review;
            $review->post_id = $request->post_id;
            $review->user_id = Auth::user()->id;
            $review->review = $request->massage;
            $review->save();

            return redirect()->back()->with('add_review_flash_success','Review successfully submitted');
         }
        else{
            return redirect()->back()->with('add_review_flash_error','Something error.......!');
        }
    }
}
