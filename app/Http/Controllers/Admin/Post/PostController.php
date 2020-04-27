<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function BloCatList(){
    
    $bloglist = DB::table('post_category')->get();
    return view('admin.blog.category.index',compact('bloglist'));
    }

    public function storecatlist(Request $request){
    	$validate = $request->validate([
    		'category_name_en' =>'required|max:255',
    		'category_name_in' =>'required|max:255',
    	]);

    	$data = array();
    	$data['category_name_en'] = $request->category_name_en;
    	$data['category_name_in'] = $request->category_name_in;

    	$store = DB::table('post_category')->insert($data);
    	if($store){
    		$notification=array(
                        'messege'=>'Blog Category Successfully added!',
                        'alert-type'=>'success'
                         );
             return Redirect()->back()->with($notification);
    	}
    }
    public function deleteblogcat($id){
   		$delete = DB::table('post_category')->where('id',$id)->delete();
   		if($delete){
   			$notification=array(
                        'messege'=>'Blog Category Successfully deleted!',
                        'alert-type'=>'success'
                         );
             return Redirect()->back()->with($notification);
   		}
    }
    public function updateblogcat(Request $request){
    	$id=$request->id;
    	$update = DB::table('post_category')->where('id',$id)->update(['category_name_in'=>$request->category_name_in,'category_name_en'=>$request->category_name_en]);
    	if($update){
    		$notification=array(
                        'messege'=>'Blog Category Successfully Updated!',
                        'alert-type'=>'success'
                         );
             return Redirect()->back()->with($notification);
    	}

    	// echo $request;

    }
}