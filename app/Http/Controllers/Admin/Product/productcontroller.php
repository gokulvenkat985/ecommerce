<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class productcontroller extends Controller
{
    public function index(){

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
}
