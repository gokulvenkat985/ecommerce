<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

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
    }
    public function createblog(){
       $blogcat = DB::table('post_category')->get();
       return view('admin.blog.create',compact('blogcat'));

        }
    public function postadd(Request $request){
        $validate = $request->validate([
            'category_id'=>'required',
            'post_title_en'=>'required',
            'post_title_in'=>'required',
            'details_en'=>'required',
            'details_in'=>'required',
        ]);

        $data=array();
        $data['category_id']= $request->category_id;
        $data['post_title_en']= $request->post_title_en;
        $data['post_title_in']= $request->post_title_in;
        $data['details_en']= $request->details_en;
        $data['details_in']= $request->details_in;


        $image_one = $request->file('post_image');

        if($image_one){
        $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(400,200)->save('public/public/media/post/'.$image_one_name);
            $data['post_image']='public/public/media/post/'.$image_one_name;
        
        $insert = DB::table('posts')->insert($data);
      
            $notification=array(
                        'messege'=>'Post Successfully Inserted!',
                        'alert-type'=>'success'
                         );
             return Redirect()->back()->with($notification);
        
        }
        else{
            $data['post_image']='';
            $insert = DB::table('posts')->insert($data);
            $notification=array(
                        'messege'=>'Post Successfully Without Image!',
                        'alert-type'=>'success'
                         );
             return Redirect()->back()->with($notification);

        }
        }
        public function allblogpost(){
            $allpost = DB::table('posts')
                        ->join('post_category','posts.category_id','=','post_category.id')
                        ->select('posts.*','post_category.category_name_en')
                        ->get();
            // return response()->json($allpost);
                        return view('admin.blog.index',compact('allpost'));

        }
        public function deletepost($id)
        {
            $deleteimage = DB::table('posts')->where('id',$id)->first();
            $del_post_img = $deleteimage->post_image;
            unlink($del_post_img);

            $deletepost = DB::table('posts')->where('id',$id)->delete();
            if($deletepost){
                $notification=array(
                        'messege'=>'Post Deleted Successfully!',
                        'alert-type'=>'success'
                         );
             return Redirect()->back()->with($notification);
            }
        }
        public function editpost($id){
            $categoryname = DB::table('post_category')->get();
            $editpost= DB::table('posts')->where('id',$id)->first();
            // return response()->json($editpost);
            return view('admin.blog.edit',compact('editpost','categoryname'));
        }
        public function updateblogpost(Request $request){
        $validate =  $request->validate([
            'category_id' => 'required',    
        ]);
        $data=array();
        $data['category_id']= $request->category_id;
        $data['post_title_en']= $request->post_title_en;
        $data['post_title_in']= $request->post_title_in;
        $data['details_en']= $request->details_en;
        $data['details_in']= $request->details_in;

        $old_image = $request->old_image;
        
        $image_one = $request->file('post_image');

        if($image_one){
        unlink($old_image);
        $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(400,200)->save('public/public/media/post/'.$image_one_name);
            $data['post_image']='public/public/media/post/'.$image_one_name;
        
        $insert = DB::table('posts')->update($data);
      
            $notification=array(
                        'messege'=>'Post Updated Successfully!',
                        'alert-type'=>'success'
                         );
             return Redirect()->back()->with($notification);
        
        }
        else{
                $insert = DB::table('posts')->update($data);
                $notification=array(
                        'messege'=>'Post Updated without image Successfully!',
                        'alert-type'=>'success'
                         );
             return Redirect()->back()->with($notification);            
        }
        }
}