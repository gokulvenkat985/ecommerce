@extends('admin.admin_layout')
@section('main_content')
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Product </span>
      </nav>

      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Product</h6>
          <!-- <p class="mg-b-20 mg-sm-b-30">New Product Add Form</p> -->
<form method="post" action="{{ url('product/update/'.$product->id) }}" enctype="multipart/form-data">
  @csrf
  @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
      @endif
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Productname: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}" >
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="{{ $product->product_code }}" placeholder="Enter ProductCode">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="{{ $product->product_quantity }}" placeholder="Enter product quantity">
                </div>
              </div>
              
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Discount Prize: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="discount_price"  placeholder="Enter Discount Prize" value="{{ $product->discount_price }}">
                </div>
              </div>
           
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose country" id="getcat" name="category_id">


                    <option label="Choose Category"></option>
                    @foreach($category as $data)
                    <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                    @endforeach


                  </select>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose country" id="hidesub">
                    <option label="Choose Sub Category"></option>
                  </select >
                  <div id="subcat"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose country" name="brand_id">
                    <option label="Choose country"></option>
                    @foreach($brand as $data)
                    <option value="{{ $data->id }}">{{ $data->brand_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_size" value="{{ $product->product_size }}" id="size" data-role="tagsinput"placeholder="Enter product Size">
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_color" value="{{ $product->product_color }}"  data-role="tagsinput"placeholder="Enter Product Color">
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling price : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="selling_price" value="{{ $product->selling_price }}" placeholder="Enter Selling price">
                </div>
              </div>

                <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details : <span class="tx-danger">*</span></label>
                  <!-- <input class="form-control" > -->
                   <!-- <div id="summernote" ></div> -->
                   <textarea rows="10" class="form-control" placeholder="Textarea" value="" name="product_details">{{ $product->product_details }}</textarea>

                </div>
              </div>

               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                  <input class="form-control" name="video_link" placeholder="Video link" value="{{ $product->video_link }}">
                </div>
              </div>
               
                          </div>            <hr>
<br><br>

            <div class="row">
                 <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="main_slider" value="1" <?php if($product->main_slider  == 1)
                    {
                      echo "checked";
                    } ?> > 
                    <span>Main Slider</span>
                  </label>
                 </div>
                  <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="hot_deal" value="1"<?php if($product->hot_deal  == 1)
                    {
                      echo "checked";
                    } ?> >
                    <span>Hot Deal</span>
                  </label>
                 </div>
                  <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="best_rated" value="1" <?php if($product->best_rated  == 1)
                    {
                      echo "checked";
                    } ?> >
                    <span>Best rated</span>
                  </label>
                 </div>

                 <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="trend" value="1" <?php if($product->trend  == 1)
                    {
                      echo "checked";
                    } ?>>
                    <span>Trend Product</span>
                  </label>
                 </div>
                 <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="mide_slider" value="1" <?php if($product->mide_slider  == 1)
                    {
                      echo "checked";
                    } ?>>
                    <span>Mid Slider</span>
                  </label>
                 </div>

                 <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="hot_new" value="1"<?php if($product->hot_new  == 1)
                    {
                      echo "checked";
                    } ?>>
                    <span>Hot New</span>
                  </label>
                 </div>

                 <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="buyone_getone" value="1"<?php if($product->buyone_getone  == 1)
                    {
                      echo "checked";
                    } ?>>
                    <span>Buyone getone</span>
                  </label>
                 </div>

               </div>
               <hr>
<br><br>
            <div class="form-layout-footer">
              <button type="submit" class="btn btn-primary mg-r-5">Update</button>
              <!-- <button type="submit" class="btn btn-info mg-r-5">Cancel</button> -->
              <a href="{{ route('all.product') }}" class="btn btn-primary">Cancel</a>
              <!-- <button class="btn btn-secondary">Cancel</button> -->
            </div>
          </div>
        </form>
        </div>
       
        </div>
        <!-- row -->
        <!-- image upload -->
          <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Images</h6>

<form method="post" action="{{ route('update.image') }}" enctype="multipart/form-data">
@csrf
            <div class="row">
              <div class="col-lg-6 col-sm-6">
                <input type="hidden" name="id" value="{{ $product->id }}">
                  <label class="form-control-label">Image one(Main Thumbnail): <span class="tx-danger">*</span></label>
                 <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this)" >
                    <span class="custom-file-control"></span>
                    <input type="hidden" name="old_one" value="{{ $product->image_one }}">
                   
                  </label>
                </div>
                <div class="col-lg-6 col-sm-6">
                   <img src="#" id="one" alt="Uploaded image" >
                  <img src="{{ URL::to($product->image_one) }}" width="100px;" height="100px;">
                </div>
              </div>
            
            <div class="row">
              <div class="col-lg-6 col-sm-6">
                
                  <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label><br>
                 <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this)" >
                    <span class="custom-file-control"></span>
                    <input type="hidden" name="old_two" value="{{ $product->image_two }}">
                 
                  </label>
                </div>

                <div class="col-lg-6 col-sm-6">
                     <img src="#" id="two" alt="Uploaded image">
                  <img src="{{ URL::to($product->image_two) }}" width="100px;" height="100px;">
              </div>
            </div>
            <div class="row">
               <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label><br>
                 <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this)" >
                    <span class="custom-file-control"></span>
                    <input type="hidden" name="old_three" value="{{ $product->image_two }}">
                    
                  </label>
                </div>
              </div>
              <div class="col-lg-6">
                <img src="#" id="three" alt="Uploaded image">
                 <img src="{{ URL::to($product->image_three) }}" width="100px;" height="100px;">
              </div>
            </div>
            <button type="submit" class="btn btn-warning">Update Photo</button>
</form>
<!-- ----------------------- -->
      </div>
      </div>
      
      </div><!-- sl-pagebody -->    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    $( "#getcat" ).on( "click",function() {
 $val=$(this).val();
$.ajax(
  {
    url: "{{ route('ajax.subcategory') }}",
    type:'post',
    data: {
        "_token": "{{ csrf_token() }}",
        "id": $val
        },
    success: function(result){
      $('#hidesub').hide();
      $('#subcat').html(result);
    // alert(result);
    }
});
});
});
</script>

<script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)

        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script type="text/javascript">
  function readURL2(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#two')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script type="text/javascript">
  function readURL3(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#three')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection