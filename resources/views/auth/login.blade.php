@extends('layouts.master')
@section('title', 'Add a new post')
@section('hero')
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Login</h1>
                   
                </div>
            </div>
        </div>
    </div>
</header>
@section('content')
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <form action="{{route('login')}}" method="POST"> 
                        <div class="">
                          @csrf
                        
                          <div class="mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" value="{{old('email')}}" name="email"  required class="form-control" id="email">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                          </div>
                          <div class="mb-3">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="password" name="password"  required class="form-control" id="password">
                            @error('password')
                                <span>{{$message}}</span>
                            @enderror
                          </div>
                  </div>
                  <div class="">
                    <button type="submit" class="btn btn-primary">Login</button>
                  </div>
              </form>
                </div>
            </div>
        </div>
       
@endsection