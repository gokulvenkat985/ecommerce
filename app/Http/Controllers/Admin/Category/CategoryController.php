<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use DB;

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
    public function deletecategory(Request $request,$id){
    	$category=DB::table('categories')->where('id',$id)->delete();
    	if($category){
		$notification=array(
                        'messege'=>'Successfully deleted!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
		}
    }
    public function updatecategory(Request $request){
    	$validatedata=$request->validate([
    	'category_name' =>'required|max:255',
		]);

    	 $affected = DB::table('categories')
              ->where('id',$request->id)
              ->update(['category_name' => $request->category_name]); 

        if($affected){
		$notification=array(
                        'messege'=>'Successfully Updated!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
		}
		else{
		$notification=array(
                        'messege'=>'Noting to Updated!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);	
		}
    }
   
}
