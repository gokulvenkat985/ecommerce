@extends('admin.admin_layout')
@section('main_content')
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Product </span>
      </nav>

      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">New Product Add</h6>
          <p class="mg-b-20 mg-sm-b-30">New Product Add Form</p>
<form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
  @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Productname: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="" placeholder="Enter Productname">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="" placeholder="Enter ProductCode">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="" placeholder="Enter product quantity">
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
                  <input class="form-control" type="text" name="product_size" value="" id="size" data-role="tagsinput"placeholder="Enter product quantity">
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_color" value=""  data-role="tagsinput"placeholder="Enter Product Color">
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling price : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="selling_price" value="" placeholder="Enter Selling price">
                </div>
              </div>

                <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details : <span class="tx-danger">*</span></label>
                  <!-- <input class="form-control" > -->
                   <!-- <div id="summernote" ></div> -->
                   <textarea rows="10" class="form-control" placeholder="Textarea" name="product_details"></textarea>

                </div>
              </div>

               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                  <input class="form-control" name="video_link" placeholder="Video link">
                </div>
              </div>
               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image one(Main Thumbnail): <span class="tx-danger">*</span></label>
                 <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this)" required="">
                    <span class="custom-file-control"></span>
                    <img src="#" id="one">
                  </label>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                 <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this)" required="">
                    <span class="custom-file-control"></span>
                    <img src="#" id="two">
                  </label>
                </div>
              </div>

               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                 <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this)" required="">
                    <span class="custom-file-control"></span>
                    <img src="#" id="three">
                  </label>
                </div>
              </div>
                          </div>            <hr>
<br><br>

            <div class="row">
                 <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="main_slider" value="1">
                    <span>Main Slider</span>
                  </label>
                 </div>
                  <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="hot_deal" value="1">
                    <span>Hot Deal</span>
                  </label>
                 </div>
                  <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="best_rated" value="1">
                    <span>Best rated</span>
                  </label>
                 </div>

                 <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="trend" value="1">
                    <span>Trend Product</span>
                  </label>
                 </div>
                 <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="mide_slider" value="1">
                    <span>Mid Slider</span>
                  </label>
                 </div>

                 <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="hot_new" value="1">
                    <span>Hot New</span>
                  </label>
                 </div>
               </div>
               <hr>
<br><br>
            <div class="form-layout-footer">
              <button type="submit" class="btn btn-info mg-r-5">Submit Form</button>
              <button class="btn btn-secondary">Cancel</button>
            </div>
          </div>
        </form>
        </div>
       
        </div>
        <!-- row -->
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