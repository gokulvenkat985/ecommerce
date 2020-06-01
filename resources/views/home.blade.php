@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                           <!--  <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a> -->

                           <!--      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div> -->
                            </li>
                        @endguest
                    </ul>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-9" >
                   <div class="contact_form">
                    <table class="table table-responsive" >
                        <thead>
                            <tr>
                               <td scope="col">#</td>
                               <td scope="col">First</td>
                               <td scope="col">Last</td>
                               <td scope="col">Body</td>           
                           </tr>
                        </thead>
                        <tbody>
                            <tr>
                               <td scope="col">Last</td>           
                               <td scope="col">Last</td>           
                               <td scope="col">Last</td>           
                               <td scope="col">Last</td>           
                                
                            </tr>
                            <tr>
                               <td scope="col">Last</td>           
                               <td scope="col">Last</td>           
                               <td scope="col">Last</td>           
                               <td scope="col">Last</td>           
                                
                            </tr><tr>
                               <td scope="col">Last</td>           
                               <td scope="col">Last</td>           
                               <td scope="col">Last</td>           
                               <td scope="col">Last</td>           
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3">
                <img src="public/frontend/images/profile.jpg" class="rounded" width="120px;" height="120px;">
                <ul>
                  <li><a href="{{ route('change.password') }}">Change password</a></li>
                  <li>df</li>
                  <li><a href="{{ route('logout') }}" class="btn btn-primary">logout</a></li>

                </ul>

            </div>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection
