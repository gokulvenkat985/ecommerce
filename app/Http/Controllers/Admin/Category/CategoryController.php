<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;

class CategoryController extends Controller
{
    // public function _construct()
    // {
    // 	$this->middleware('auth:admin');
    // }

    public function category(){
    	$category = Category::all();
    	return view('admin.category.category',compact('category'));
    }
    public function storecategory(Request $request){
    	$validatedata=$request->validate([
    	'category_name' =>'required|unique:categories|max:255',
		]);

		$category = new Category;
		$category->category_name = $request->category_name;
		$category->save();
		if($category){
		$notification=array(
                        'messege'=>'Successfully added!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
		}

    }
}
