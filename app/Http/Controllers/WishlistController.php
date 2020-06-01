<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class WishlistController extends Controller
{
    public function addwishlist($id){
        $product_id=$id;
    	$user_id = Auth::id();
    	$check = DB::table('wishlists')->where('user_id',$user_id)->where('product_id',$product_id)->first();
    	$data = array(
    		'user_id' => $user_id,
    		'product_id' => $id
    	);
    	if(Auth::Check())
    	{
    		if($check){
    		  return \Response::json(['error' => 'product already on wishlist']);
                // echo "check";
    		}
    		else{
    			DB::table('wishlists')->insert($data);
                return \Response::json(['success' => 'Product Added in Wishlist']);
                // echo "insert";       
    		}
    	}
    	else
    	{
    		return \Response::json(['error' => 'At first login your Account']);
            // echo "error";
    	}
    }
}
