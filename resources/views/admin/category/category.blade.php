@extends('admin.admin_layout')
@section('main_content')
<div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Category Table</h5>
          <!-- <p>DataTables is a plug-in for the jQuery Javascript library.</p> -->
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Category list
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
    

          <div class="table-wrapper">
            <table id="datatable1" class="datatable1 table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Category Name</th>
                  <th class="wd-20p">Action</th>
                  </tr>
              </thead>
              <tbody>
              	<!-- view the records in table -->
              	@foreach($category as $key=>$data)
                <tr>
                  <td>{{$key+1}}</td>
                  <td style="display: none;">{{$data->id}}</td>
                  <td>{{$data->category_name}}</td>
                  <td>
                  	<a href="" class="btn btn-primary btn-sm btnSelect" data-toggle="modal" data-target="#modaldemo4">Edit</a>
                  	<a href="{{URL::to('/delete/category/'.$data->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                  </td>
                </tr>
                @endforeach	
                <!-- end the table  view records -->
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

</div>
</div>
<div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h4 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">CATEGORY ADD</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pd-20">
             <form method="post" action="{{route('store.category')}}">
              @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="category_name">

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
        <div id="modaldemo4" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h4 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">EDIT CATEGORY</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pd-20">
             <form method="post" action="{{route('update.category')}}">
              @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="hidden" class="form-control" id="copy1" name="id">
             <input type="text" class="form-control" id="copy2" name="category_name">

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
@endsection