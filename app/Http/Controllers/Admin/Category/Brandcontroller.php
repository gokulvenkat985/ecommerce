<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Brand;
use DB;

class Brandcontroller extends Controller
{
    public function brand()
    {	
    	$brand = Brand::all();
    	return view('admin.category.brand',compact('brand'));
    }
    public function storebrand(Request $request){
    	$validate = $request->validate([
        'brand_name' => 'required|unique:brands|max:255',
       
    	]);

    	$data=array();
    	$data['brand_name']=  $request->brand_name;
    	$image = $request->file('brand_logo');

    	if($image){
    		$image_name = date('dmy_H_s_i');
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'public/media/brand/';
    		$image_url = $upload_path.$image_full_name;
    		$success =  $image->move($upload_path,$image_full_name);

    		$data['brand_logo'] = $image_url;
    		$brand = DB::table('brands')->insert($data);
    		$notification=array(
                        'messege'=>'Successfully added!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
		}
		else{
			$brand = DB::table('brands')->insert($data);
			$notification=array(
                        'messege'=>'Successfully added!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
		}
    	}
    	public function deletebrand($id){
    		$data=DB::table('brands')->where('id',$id)->first();
    		$image=$data->brand_logo;
    		unlink($image);
    		$delete=DB::table('brands')->where('id',$id)->delete();
    		if($delete){
    			$notification=array(
                        'messege'=>'Successfully deleted!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
    		}
    	}
    	public function editbrand($id){
    		$brand = DB::table('brands')->where('id',$id)->first();
    		return view('admin.category.editbrand',compact('brand'));
    	}
    	public function updatebrand(Request $request,$id){
    	$old_logo = $request->old_logo;
    	$data=array();
    	$data['brand_name']=  $request->brand_name;
    	$image = $request->file('brand_logo');

    	if($image){
    		unlink($old_logo);
    		$image_name = date('dmy_H_s_i');
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'public/media/brand/';
    		$image_url = $upload_path.$image_full_name;
    		$success =  $image->move($upload_path,$image_full_name);
    		$data['brand_logo'] = $image_url;
    		$brand = DB::table('brands')->where('id',$id)->update($data);
    		$notification=array(
                        'messege'=>'Successfully added!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('brand')->with($notification);
		}
		else{
			$brand = DB::table('brands')->where('id',$id)->update($data);
			$notification=array(
                        'messege'=>'Update without image',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('brand')->with($notification);
		}
    	}
    }

