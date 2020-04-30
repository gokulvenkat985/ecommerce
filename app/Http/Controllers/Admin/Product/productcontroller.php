<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class productcontroller extends Controller
{   
     public function imageupdate(Request $request){
        
        $id=$request->id;
        $old_logo1 = $request->old_one;
        $old_logo2 = $request->old_two;
        $old_logo3 = $request->old_three;

        $data=array();
       
        $image_one = $request->file('image_one');
        $image_two = $request->file('image_two');
        $image_three = $request->file('image_three');

        if($image_one){
            unlink($old_logo1);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image_one->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/public/media/product/';
            $image_url = $upload_path.$image_full_name;
            $success =  $image_one->move($upload_path,$image_full_name);
            $data['image_one'] = $image_url;
            $product_image = DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                        'messege'=>'Successfully one uploaded!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
        }
        if($image_two){
            unlink($old_logo2);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image_two->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/public/media/product/';
            $image_url = $upload_path.$image_full_name;
            $success =  $image_two->move($upload_path,$image_full_name);
            $data['image_two'] = $image_url;
            $product_image = DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                        'messege'=>'Successfully two uploaded!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
        }
        if($image_three){
            unlink($old_logo3);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image_three->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/public/media/product/';
            $image_url = $upload_path.$image_full_name;
            $success =  $image_three->move($upload_path,$image_full_name);
            $data['image_three'] = $image_url;
            $product_image = DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                        'messege'=>'Successfully three uploaded!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
        }
        
        
        }
       
    public function allproduct(){
        $product = DB::table('products')
             ->join('categories','products.category_id','=','categories.id')
             ->join('brands','products.brand_id','=','brands.id')
             ->select('products.*','categories.category_name','brands.brand_name')
             ->get();
        return view('admin.product.allproduct',compact('product'));
             // return response()->json($product);
    }

    public function addproduct(){
    	$category = DB::table('categories')->get();
    	$brand = DB::table('brands')->get();

    	return view('admin.product.create',compact('category','brand'));
    }
    public function ajaxproduct(Request $request){
    	$output = '<select class="form-control select2" data-placeholder="Choose country" name="subcategory_id">';
    	$subcategory = DB::table('subcatgories')->where('category_id',$request->id)->get();
    	foreach($subcategory as $row){
    		$output .= '<option value='.$row->id.'>'.$row->subcategory_name.'</option>';
    	}
    	$output .= '</select>';
    	echo $output;
    }

    public function storeproduct(Request $request){
        $data=array();
    	$data['product_name']= $request->product_name;
      $data['discount_price']= $request->discount_price;
    	$data['product_code']= $request->product_code;
    	$data['product_quantity']= $request->product_quantity;
    	$data['category_id']= $request->category_id;
    	$data['subcategory_id']= $request->subcategory_id;
    	$data['brand_id']= $request->brand_id;
        $data['video_link']= $request->video_link;
    	$data['product_size']= $request->product_size;
    	$data['product_color']= $request->product_color;
    	$data['selling_price']= $request->selling_price;
    	$data['subcategory_id']= $request->subcategory_id;
    	$data['product_details']= $request->product_details;
    	
    	$data['main_slider']= $request->main_slider;
    	$data['hot_deal']= $request->hot_deal;
    	$data['best_rated']= $request->best_rated;
    	$data['trend']= $request->trend;
    	$data['mide_slider']= $request->mide_slider;
    	$data['hot_new']= $request->hot_new;
    	
    	
    	$data['status']=1;

    	$image_one = $request->image_one;
    	$image_two = $request->image_two;
    	$image_three = $request->image_three;

    	// return response()->json($data);
///random numbe r: 12132.png 
    	if($image_one && $image_two && $image_three){
    		$image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
    		Image::make($image_one)->resize(300,300)->save('public/public/media/product/'.$image_one_name);
    		$data['image_one']='public/public/media/product/'.$image_one_name;
        
    		$image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
    		Image::make($image_two)->resize(300,300)->save('public/public/media/product/'.$image_two_name);
    		$data['image_two']='public/public/media/product/'.$image_two_name;
    		$image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
    		Image::make($image_three)->resize(300,300)->save('public/public/media/product/'.$image_three_name);
    		$data['image_three']='public/public/media/product/'.$image_three_name;

    		$product = DB::table('products')->insert($data); 
    		if($product){
		$notification=array(
                        'messege'=>'Product Successfully added!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
						}
    		    	}

    }
        public function inactive($id){
            $update = DB::table('products')->where('id',$id)->update(['status' => 0]);
            $notification=array(
                        'messege'=>'Product inactivated!',
                        'alert-type'=>'error'
                         );
             return Redirect()->back()->with($notification);
        }
        public function active($id){
             $update = DB::table('products')->where('id',$id)->update(['status' => 1]);
            $notification=array(
                        'messege'=>'Product activated!',
                        'alert-type'=>'success'
                         );
             return Redirect()->back()->with($notification);
        }
        public function delete($id){
            $delete = DB::table('products')->where('id',$id)->first();
            $image_one = $delete->image_one;
             $image_two = $delete->image_two;
              $image_three = $delete->image_three;

               echo $image_one.$image_two.$image_three;
               unlink($image_one);
               unlink($image_two);
               unlink($image_three);
               $notify=DB::table('products')->where('id',$id)->delete();
            if($notify){
                $notification=array(
                        'messege'=>'Product Deleted Successfully!',
                        'alert-type'=>'success'
                         );
             return Redirect()->back()->with($notification);
            }
        }

        public function viewproduct($id){
            $product = DB::table('products')
             ->join('categories','products.category_id','=','categories.id')
             ->join('brands','products.brand_id','=','brands.id')
             ->join('subcatgories','products.subcategory_id','=','subcatgories.id')
             ->select('products.*','categories.category_name','brands.brand_name','subcatgories.subcategory_name')
             ->where('products.id',$id)
             ->first();
        return view('admin.product.show',compact('product'));
             // return response()->json($product);
        }
        public function editproduct($id){
        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();
        $product=DB::table('products')->where('id',$id)->first();
          return view('admin.product.edit',compact('product','category','brand'));
        
        // return response()->json($product);
        }
        public function updateproduct(Request $request,$id)
        {
            $validate = $request->validate([
                'product_name' => 'required','product_code' => 'required','product_quantity' => 'required','product_size' => 'required','product_color' => 'required','selling_price' => 'required',
       
        'category_id' => 'required',
       'subcategory_id' => 'required','brand_id' => 'required',
        ]);

        $data=array();
        $data['product_name']= $request->product_name;
        $data['product_code']= $request->product_code;
        $data['product_quantity']= $request->product_quantity;
        $data['category_id']= $request->category_id;
        $data['subcategory_id']= $request->subcategory_id;
        $data['brand_id']= $request->brand_id;
        $data['video_link']= $request->video_link;
        $data['product_size']= $request->product_size;
        $data['product_color']= $request->product_color;
        $data['selling_price']= $request->selling_price;
        $data['subcategory_id']= $request->subcategory_id;
        $data['product_details']= $request->product_details;
        $data['discount_price'] =  $request->discount_price;
        $data['main_slider']= $request->main_slider;
        $data['hot_deal']= $request->hot_deal;
        $data['best_rated']= $request->best_rated;
        $data['trend']= $request->trend;
        $data['mide_slider']= $request->mide_slider;
        $data['hot_new']= $request->hot_new;

         $affected = DB::table('products')
              ->where('id', $id)
              ->update($data);
              if($affected){
              $notification=array(
                        'messege'=>'Successfully Updated!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('all.product')->with($notification);
                   }
                   else{
                    $notification=array(
                        'messege'=>'Nothing to update!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->route('all.product')->with($notification);
                   }
        }

       
}
