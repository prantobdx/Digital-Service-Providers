<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Auth;
use Validator;
use App\Models\Admin;
use App\Models\Category;
use App\Models\ServicesPost;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('all-auth:admin');
    }

    public function addCategory(Request $request)
    {
    	if ($request->isMethod('post'))
    	{
	        $this->validate($request,[
	            'category_name' => 'required',
	        ]);
	        $category = new Category;
	        $category->name = $request->category_name;
	        $category->parent_id = $request->parent_id;
	        $category->description = $request->description;

            if ($request->hasFile('img'))
            {
                $dir = 'images/categories/';
                $extension = strtolower($request->file('img')->getClientOriginalExtension());
                $fileName = str::random() . '.' . $extension;
                $request->file('img')->move($dir, $fileName);
                $category->img = $fileName;
            }

	        $category->save();
	        return redirect(route('admin.add-category'))->with('add_category_flash_success','Successfully addeded');
    	}
    	$levels = Category::where(['parent_id'=>0])->get();
    	return view('Admin.categories.add_category')->with(compact('levels'));
    }

    public function showCategory(){
    	$categories = Category::all();
    return view('Admin.categories.view_category')->with(compact('categories'));
    }



    public function editCategory(Request $request, $id=null)
    {
        if ($request->isMethod('post')) {
            $this->validate($request,[
                'category_name' => 'required',
            ]);
            $category = Category::find($id);
            $category->name = $request->category_name;
            $category->parent_id = $request->parent_id;
            $category->description = $request->description;
            if ($request->hasFile('img')) {
                $dir = 'images/categories/';
                $extension = strtolower($request->file('img')->getClientOriginalExtension());
                $fileName = str::random() . '.' . $extension;
                $request->file('img')->move($dir, $fileName);
                $category->img = $fileName;
            }
            $category->save();
            return redirect()->back()->with('edit_category_flash_success','Successfully updated');
        }
        $levels = Category::where(['parent_id'=>0])->get();
        $categoryDetails = Category::where(['id'=>$id])->first();
        return view('Admin.categories.edit_category')->with(compact('categoryDetails','levels'));
    }

    public function deleteCategory($id=null)
    {
        if (!empty($id)) {
            $data = Category::FindOrFail($id);
            if (!empty($data->img)) {
                unlink('images/categories/'.$data->img);
            }
            Category::find($id)->delete();
            return redirect()->back()->with('delete_category_flash_success','Category successfully deleted');
        }

    }
}
