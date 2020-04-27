@extends('admin.admin_layout')

@section('main_content')
<div class="sl-mainpanel">
    
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Table</h5>
          <!-- <p>DataTables is a plug-in for the jQuery Javascript library.</p> -->
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product list
          	<a href="{{ route('add.product') }}"  class="btn btn-sm btn-warning pd-x-20"  style="float:right;">Add new</a>

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
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Product Code</th>
                  <th class="wd-15p">Product Name</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-20p">Category</th>
                  <th class="wd-20p">Brand</th>

                  <th class="wd-20p">Quantity</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-20p" style="width: 500px;">Action</th>
        
                  </tr>
              </thead>
              <tbody>
              	<!-- view the records in table -->
              	@foreach($product as $key=>$data)
                <tr>
                  <td>{{ $data->product_code }}</td>
                  <td>{{ $data->product_name }}</td>
                  <td><img src="{{ URL::to($data->image_one) }}" height="70px;" width="80px;"></td>
                  <td>{{ $data->category_name }}</td>
                  <td>{{ $data->brand_name }}</td>
                  <td>{{ $data->product_quantity }}</td>
                  @if($data->status == 1)
                  <td class="badge badge-success mt-2" style="color: white;">Active</td>
                  @else
                  <td class="badge badge-danger mt-2" style="color:white">InActive</td>
                  @endif
                  <td>
                  	<a href="{{ URL::to('edit/product/'.$data->id)}}" class="btn btn-primary btn-sm"title="Edit!"><i class="fa fa-edit"></i></a>
                    <a href="{{URL::to('/delete/product/'.$data->id)}}" class="btn btn-sm btn-danger" id="delete"title="Delete!"><i class="fa fa-trash"></i></a>
                    <!-- <a class="btn btn-primary">Active</a> -->
                    <a href="{{ URL::to('view/product/'.$data->id)}}" class="btn btn-warning btn-sm" title="Show!"><i class="fa fa-eye"></i></a>


                     
                   
                    @if($data->status == 1)
                   <a href="{{URL::to('/inactive/product/'.$data->id)}}" class="btn btn-sm btn-danger"  title="Inactive!"><i class="fa fa-thumbs-down"></i></a>
                  @else
                   <a href="{{URL::to('/Active/product/'.$data->id)}}" class="btn btn-sm btn-info" title="Active!" ><i class="fa fa-thumbs-up"></i></a>
                  @endif

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