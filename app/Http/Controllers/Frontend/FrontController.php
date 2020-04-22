<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FrontController extends Controller
{
    public function storenewslater(Request $request){
    	$validate = $request->validate([
    		'email' =>'required|unique:newslaters|max:55'
    	]);
    	$data = array();
    	$data['email']=$request->email;
    	$insert = DB::table('newslaters')->insert($data);
    	if($insert){
    		$notification=array(
                        'messege'=>'Thank for Subscribing!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
    	}
        
    }
}
