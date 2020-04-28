
@extends('admin.admin_layout')
@section('main_content')
<div class="sl-mainpanel">
      <!-- <nav class="breadcrumb sl-breadcrumb"> -->
        <!-- <a class="breadcrumb-item" href="index.html">Starlight</a> -->
        <!-- <a class="breadcrumb-item" href="index.html">Tables</a> -->
        <!-- <span class="breadcrumb-item active">Data Table</span> -->
      <!-- </nav> -->

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>All Blog Post</h5>
          <!-- <p>DataTables is a plug-in for the jQuery Javascript library.</p> -->
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Blog list
          	<!-- <a href="" class="btn btn-sm btn-warning pd-x-20" data-toggle="modal" data-target="#modaldemo3" style="float:right;">Add New Category</a> -->

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
            <table  id="datatable4" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Id</th>
                  <th class="wd-15p">Post Title</th>
                  <th class="wd-15p">Post Category</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-20p">Action</th>
                  </tr>
              </thead>
              <tbody>
              	<!-- view the records in table -->
              	@foreach($allpost as $key=>$data)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{ $data->post_title_en }}</td>
                  <td>{{ $data->category_name_en }}</td>
                  <td ><img src="{{ URL::to($data->post_image)}}" width="70px;" height="80px;"></td>
                  <td>
                  	<a href="{{URL::to('/edit/blogpost/'.$data->id)}}" class="btn btn-primary btn-sm "  >Edit</a>
                  	<a href="{{URL::to('/delete/blogpost/'.$data->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                  </td>
                </tr>
                @endforeach	
                <!-- end the table  view records -->
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->


</div>

@endsection