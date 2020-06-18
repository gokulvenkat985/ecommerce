@extends('layouts.app')

@section('content')

<div class="contact_form">
  <div class="container">
    <div class="row">
      <div class="col-8 card">
        <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>City</th>
        <th>Country</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>
    </tbody>
  </table>
  </div>
      </div>
      <div class="col-4">
        <div class="card">
          <img src="frontend/images/profile.jpg" width="250px" height="250px" class="card-image-top">
          <div class="card-body">
            <h5 class="card-title text-center">{{ Auth::user()->name  }}</h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">gokul</li>
            <li class="list-group-item">gokul</li>
            <li class="list-group-item">gokul</li>
            <div class="card-body">
<a href="{{ route('logout') }}" class="btn btn-primary">logout</a>

            </div>
          </ul>
        </div>
      </div>
    </div>
  </div>

</div>



@endsection
