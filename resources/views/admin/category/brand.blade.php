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
          <h6 class="card-body-title">Brand list
          	<a href="" class="btn btn-sm btn-warning pd-x-20" data-toggle="modal" data-target="#modaldemo3" style="float:right;">Add new</a>

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
          <!-- <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p> -->

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Brand Name</th>
                  <th class="wd-15p">Brand Logo</th>
                  <th class="wd-20p">Action</th>
                  </tr>
              </thead>
              <tbody>
              	<!-- view the records in table -->
              	@foreach($brand as $key=>$data)
                <tr>
                  <td>{{$key+1}}</td>
                  <td style="display: none;">{{$data->id}}</td>
                  <td>{{$data->brand_name}}</td>
                  <td><img src="{{URL::to($data->brand_logo)}}" height="70px;" width="80px;"></td>
                  <td>
                  	<a href="{{ URL::to('edit/brand/'.$data->id)}}" class="btn btn-primary btn-sm">Edit</a>
                  	<a href="{{URL::to('/delete/brand/'.$data->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                  </td>
                </tr>
                @endforeach	
                <!-- end the table  view records -->
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
<div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h4 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">BRAND ADD</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pd-20">
       			 <form method="post" action="{{route('store.brand')}}" enctype="multipart/form-data">
       			 	@csrf
				  <div class="form-group">
				    <label for="exampleInputEmail1">Brand Name</label>
				    <input type="text" class="form-control" id="exampleInputEmail1" name="brand_name">
				    <label for="exampleInputEmail1">Brand Logo</label>
				    <input type="file" class="form-control" id="exampleInputEmail1" name="brand_logo">
				    <!-- <small id="emailHelp" class="form-text text-muted">Entert the .</small> -->
				  </div>
				  
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
          </div><!-- modal-dialog -->
        </div>
       
    </div>
@endsection