@extends('layouts.master')

@section('hero')
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>@yield('header-title', 'Blog Test')</h1>
                    <span class="subheading">@yield('header-subtitle',  'Simple Blog  subscription test')</span>
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
                    <!-- Post preview-->
                    @forelse($posts as $post)
                    <div class="post-preview">
                        <a href="{{route('posts.show',$post->id)}}">
                            <h2 class="post-title">{{$post->title}}</h2>
                            <h3 class="post-subtitle">{{substr($post->description, 0, 30)}}...</h3>
                        </a>
                        <p class="post-meta">
                            Posted by 
                            <a href="#!">{{$post->user->name}}</a>
                            - {{$post->created_at->diffForHumans()}}
                            <br><span class="text-success" style="font-family: initial">Category:{{$post->category->name}}</span>
                        </p>
                       
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                  
                    @empty
                    No Posts
                    @endforelse
                     <!-- Pager-->
                    <div class="d-flex justify-content-between mb-4">{{$posts->links()}}</div>
                </div>
            </div>
        </div>
@endsection