@extends('admin.admin_layout')
@section('main_content')
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Blog section </span>
      </nav>

      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title"> Post update</h6>
          <!-- <p class="mg-b-20 mg-sm-b-30">Product Add Form</p> -->
<form method="post" action="{{ route('update.blogpost') }}" enctype="multipart/form-data">
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
      <input type="hidden" value="{{ $editpost->id}}" name="id">
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Title(English): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_en" value="{{ $editpost->post_title_en }}" placeholder="Enter Productname">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Title(Tamil): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_in" value="{{ $editpost->post_title_in }}" placeholder="Enter ProductCode">
                </div>
              </div>
            
           
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Blog Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose country" id="getcat" name="category_id">


                    <option label="Choose Category"></option>
                    @foreach($categoryname as $data)
                    <option value="{{ $data->id }}">{{ $data->category_name_en }}</option>
                    @endforeach

                  </select>
                </div>
              </div>

                <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details(English): <span class="tx-danger">*</span></label>
                  <!-- <input class="form-control" > -->
                   <!-- <div id="summernote" ></div> -->
                   <textarea rows="10" class="form-control" placeholder="Textarea" name="details_en" id="summernote">{{ $editpost->details_en }}</textarea>
                </div>
              </div>


                <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details(Tamil): <span class="tx-danger">*</span></label>
                  <!-- <input class="form-control" > -->
                   <!-- <div id="summernote" ></div> -->
                   <textarea rows="10" class="form-control" placeholder="Textarea" name="details_in" id="summernote1">{{ $editpost->details_in }}</textarea>
                </div>
              </div>

               <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Image: <span class="tx-danger">*</span></label><br>
                 <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this)" >
                    <span class="custom-file-control"></span><br>
                    <img src="#" id="one">
                  </label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Old Image: <span class="tx-danger">*</span></label><br>
                 <label class="custom-file">
                    <img src="{{ URL::to($editpost->post_image) }}" width="80px;" height="100px;" >
                    <input type="hidden" name="old_image" value="{{ $editpost->post_image}}">
                  </label>
                </div>
              </div>

                          </div>          
             
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
@endsection