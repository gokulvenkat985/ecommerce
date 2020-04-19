<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Brand;
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
        'brand_logo' => 'required',
    	]);

    	$brand = new Brand;
    	$brand->brand_name=$request->brand_name;
    	// $brand->brand_logo=$request->file('brand_logo');
    	$brand->save();

    	 request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

  

        $imageName = time().'.'.request()->image->getClientOriginalExtension();

  

        request()->image->move(public_path('images'), $imageName);

  

        return back()

            ->with('success','You have successfully upload image.')

            ->with('image',$imageName);
    }
}
