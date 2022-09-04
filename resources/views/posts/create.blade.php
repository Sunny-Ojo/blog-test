@extends('layouts.master')
@section('title', 'Add a new post')
@section('hero')
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Add a new Post</h1>
                    <span class="subheading"><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Add new Category?</button></span>
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
                    @if (Session::has('success'))
                    <span class="text-success">{{Session::get('success')}}</span>
                @endif
                    <form action="{{route('posts.store')}}" method="POST"> 
                        <div class="">
                          @csrf
                         <div class="mb-3">
                            <div class="form-group">
                            <label for="message-text" class="col-form-label">Post Category:</label>
                              <select class="form-control" required name="category_id" id="category_id">
                                  <option value="">Select a category</option>
                               @foreach ($postCategories as $item)
                                   <option value={{$item->id}}>{{$item->name}}</option>
                               @endforeach
                              </select>
                              @error('category_id')
                              <span>{{$message}}</span>
                          @enderror
                            </div>
                          </div> 
                          <div class="mb-3">
                            <label for="title" class="col-form-label">Post title:</label>
                            <input type="text" name="title"  required class="form-control" id="title">
                            @error('title')
                            <span>{{$message}}</span>
                        @enderror
                          </div>
                          <div class="mb-3">
                            <label for="description" class="col-form-label">Description:</label>
                            <textarea name="description"  class="form-control" id="description" cols="30" rows="10"></textarea>
                            @error('description')
                                <span>{{$message}}</span>
                            @enderror
                          </div>
                  </div>
                  <div class="ms-3">
                    <button type="submit" class="btn btn-primary">Create Post</button>
                  </div>
              </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Subscribe to a post category</h5>
        
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form action="{{route('category.store')}}" method="POST"> 
                      <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" name="name"  required class="form-control" id="name">
                              @error('name')
                              <span>{{$message}}</span>
                          @enderror
                            </div>
                          </div> 
                      
                   
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Create  Category</button>
                </div>
            </form>
              </div>
            </div>
          </div>
@endsection