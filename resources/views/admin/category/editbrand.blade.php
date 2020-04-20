@extends('admin.admin_layout')

@section('main_content')
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Tables</a>
        <span class="breadcrumb-item active">Data Table</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand Table</h5>
          <!-- <p>DataTables is a plug-in for the jQuery Javascript library.</p> -->
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Edit Brand list

           </h6>
           @if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
			@endif
			
		
          <div class="table-wrapper">
<form method="post" action="{{ url('update/brand/'.$brand->id) }}" enctype="multipart/form-data">
	@csrf
	<div class="modal-body pd-20">
		<div class="form-group">
			<label for="exampleInputEmail">Brand Name</label>
			<input type="text" class="form-control" value="{{$brand->brand_name}}" name="brand_name">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail">Brand logo</label>
			<input type="file" class="form-control" id="exampleInputEmail1" name="brand_logo">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail">Old Brand logo</label>
			<img src="{{URL::to($brand->brand_logo)}}" height="70px;" width="90px;">
			<input type="hidden" name="old_logo" value="{{$brand->brand_logo}}">
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-info pd-x-20">Update</button>
	</div>
	
</div>
</form>
</div>
</div>
</div>
</div>
@endsection