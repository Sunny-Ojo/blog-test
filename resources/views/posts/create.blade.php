@extends('layouts.master')
@section('title', 'Add a new post')
@section('hero')
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Add a new Post</h1>
                    <span class="subheading"><button>Add new Category?</button></span>
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
                    <form action="{{route('posts.store')}}" method="POST"> 
                        <div class="modal-body">
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
@endsection