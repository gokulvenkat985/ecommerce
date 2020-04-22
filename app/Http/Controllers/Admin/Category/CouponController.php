<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CouponController extends Controller
{
	public function index(){
		$coupon = DB::table('coupons')->get();
		return view('admin.coupon.coupon',compact('coupon'));
	}
	public function storecoupon(Request $request){
		$validatedata=$request->validate([
    	'coupon' =>'required|unique:coupons|max:255',
    	'discount' =>'required',
		]);

		$data=array();
		$data['coupon']=$request->coupon;
		$data['discount']=$request->discount;
		$insert=DB::table('coupons')->insert($data);
		if($insert){
			$notification=array(
                        'messege'=>'Successfully added!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
		}
	}
	public function deletecoupon($id){
		$delete = DB::table('coupons')->where('id',$id)->delete();
		if($delete){
			$notification=array(
                        'messege'=>'Successfully delete!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
		}
	}
	public function updatecoupon(Request $request){
		$id = $request->id;
 		$update =  DB::table('coupons')->where('id',$id)
 						->update(['coupon'=>$request->coupon,'discount'=>$request->discount]);
 		if($update){
 			$notification=array(
                        'messege'=>'Successfully updated!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
 		}
 		else{
 			$notification=array(
                        'messege'=>'Nothing to update!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
 		}				
	}
	public function newslater(){
		$newslater = DB::table('newslaters')->get();
		return view('admin.coupon.newslater',compact('newslater'));
	}
	public function deletenewslater($id){
		$delete = DB::table('newslaters')->where('id',$id)->delete();
		if($delete){
			$notification=array(
                        'messege'=>'Successfully deleted!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
		}
	}
}
