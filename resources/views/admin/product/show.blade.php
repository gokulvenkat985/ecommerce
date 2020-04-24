@extends('admin.admin_layout')
@section('main_content')
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Product </span>
      </nav>

      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product Details Page</h6>
          <!-- <p class="mg-b-20 mg-sm-b-30">New Product Add Form</p> -->
<!-- <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data"> -->
  
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Productname: <span class="tx-danger">*</span></label><br>
                  <strong>{{ $product->product_name }}</strong>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <!-- <input class="form-control" type="text" name="product_code" value="" placeholder="Enter ProductCode"> -->
                  <br><strong>{{ $product->product_code }}</strong>

                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <!-- <input class="form-control" type="text" name="product_quantity" value="" placeholder="Enter product quantity"> -->
                  <br><strong>{{ $product->product_quantity }}</strong>

                </div>
              </div>
              
           
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <!-- <select class="form-control select2" data-placeholder="Choose country" id="getcat" name="category_id"> -->

                  <br><strong>{{ $product->category_name }}</strong>



                  <!-- </select> -->
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                  <!-- <select class="form-control select2" data-placeholder="Choose country" id="hidesub"> -->
                    <!-- <option label="Choose Sub Category"></option> -->
                  <!-- </select > -->
                  <!-- <div id="subcat"></div> -->
                  <br><strong>{{ $product->subcategory_name }}</strong>

                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <!-- <select class="form-control select2" data-placeholder="Choose country" name="brand_id"> -->
                    <!-- <option label="Choose country"></option> -->
                  <br><strong>{{ $product->brand_name }}</strong>
                    
                  <!-- </select> -->
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                  <!-- <input class="form-control" type="text" name="product_size" value="" id="size" data-role="tagsinput"placeholder="Enter product quantity"> -->
                  <br><strong>{{ $product->product_size }}</strong>

                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                  <!-- <input class="form-control" type="text" name="product_color" value=""  data-role="tagsinput"placeholder="Enter Product Color"> -->
                  <br><strong>{{ $product->product_color }}</strong>

                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling price : <span class="tx-danger">*</span></label>
                  <!-- <input class="form-control" type="text" name="selling_price" value="" placeholder="Enter Selling price"> -->
                  <br><strong>{{ $product->selling_price }}</strong>

                </div>
              </div>

                <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details : <span class="tx-danger">*</span></label>
                  <!-- <input class="form-control" > -->
                   <!-- <div id="summernote" ></div> -->
                   <!-- <textarea rows="10" class="form-control" placeholder="Textarea" name="product_details"></textarea> -->
                  <br><strong>{{ $product->product_details }}</strong>

                </div>
              </div>

               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                  <!-- <input class="form-control" name="video_link" placeholder="Video link"> -->
                  <br><strong>{{ $product->video_link }}</strong>

                </div>
              </div>
               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image one(Main Thumbnail): <span class="tx-danger">*</span></label><br>
                 <label class="custom-file">
                    <!-- <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this)" required=""> -->
                    <img src="{{URL::to($product->image_one)}}" width="80px;" height="80px;">
                    <!-- <span class="custom-file-control"></span> -->
                    <!-- <img src="#" id="one"> -->
                  </label>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label><br>
                 <label class="custom-file">
                    <!-- <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this)" required=""> -->
                    <!-- <span class="custom-file-control"></span> -->
                    <img src="{{URL::to($product->image_two)}}" width="80px;" height="80px;">
                    <!-- <img src="#" id="two"> -->
                  </label>
                </div>
              </div>

               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label><br>
                 <label class="custom-file">
                    <!-- <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this)" required=""> -->
                    <!-- <span class="custom-file-control"></span> -->
                    <img src="{{URL::to($product->image_three)}}" width="80px;" height="80px;">

                    <!-- <img src="#" id="three"> -->
                  </label>
                </div>
              </div>
                          </div>            <hr>
<br><br>

            <div class="row">
                 <div class="col-lg-4">
                  <label >
                   
                    @if($product->main_slider == 1)
                    <!-- <strong>xdhgfu</strong> -->
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">InActive</span>
                    @endif

                    <span>Main Slider</span>
                  </label>
                 </div>
                  <div class="col-lg-4">
                  <label >
                    @if($product->hot_deal == 1)
                    <!-- <strong>xdhgfu</strong> -->
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">InActive</span>
                    @endif
                     <span>Hot Deal</span>
                  </label>
                 </div>
                  <div class="col-lg-4">
                  <label >
                    <!-- <input type="checkbox" name="" value="1"> -->
                    @if($product->best_rated == 1)
                    <!-- <strong>xdhgfu</strong> -->
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">InActive</span>
                    @endif
                    <span>Best rated</span>
                  </label>
                 </div>

                 <div class="col-lg-4">
                  <label >
                   
                    @if($product->trend == 1)
                    <!-- <strong>xdhgfu</strong> -->
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">InActive</span>
                    @endif
                    <span>Trend Product</span>
                  </label>
                 </div>
                 <div class="col-lg-4">
                  <label >
                    <!-- <input type="checkbox" name="mide_slider" value="1"> -->
                    @if($product->mide_slider == 1)
                    <!-- <strong>xdhgfu</strong> -->
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">InActive</span>
                    @endif
                    <span>Mid Slider</span>
                  </label>
                 </div>

                 <div class="col-lg-4">
                  <label >
                    
                    @if($product->mide_slider == 1)
                    
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">InActive</span>
                    @endif
                    <span>Hot New</span>
                  </label>
                 </div>
               </div>
               <hr>
<br><br>
        
          </div>
        <!-- </form> -->
        </div>
       
        </div>
        <!-- row -->
      </div><!-- sl-pagebody -->    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
@endsection