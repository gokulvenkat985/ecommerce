<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SubCategoryController extends Controller
{
   public function index(){
   	$category = DB::table('categories')->get();
   	$sub_category = DB::table('subcatgories')
   					->join('categories','subcatgories.category_id','=','categories.id')
   					->select('categories.category_name','subcatgories.*')
   					->get();
   	return view('admin.category.sub_category',compact('category','sub_category'));
   }
   public function storesubcategory(Request $request){

		$validate = $request->validate([
        'subcategory_name' => 'required',
       	'category_id' => 'required'
    	]); 
		 $subcat=DB::table('subcatgories')->insert(
    ['subcategory_name' => $request->subcategory_name, 'category_id' => $request->category_id]
		);
		  	  if($subcat){
		$notification=array(
                        'messege'=>'Successfully added!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
		}
   }
   public function deletecategory($id){
   	$delete =DB::table('subcatgories')->where('id',$id)->delete();
   	if($delete){
   		$notification=array(
                        'messege'=>'Successfully deleted!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
   	}
   }
   public function updatesubcategory(Request $request){
   	$validatedata=$request->validate([
    	'subcategory_name' =>'required|max:255',
		]);

    	 $affected = DB::table('subcatgories')
              ->where('id',$request->id)
              ->update(['subcategory_name' => $request->subcategory_name,'category_id'  => $request->category_id]); 

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
   	// echo $request;
   }
}
