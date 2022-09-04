<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title', 'Welcome to Blog Test')</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">Blog Test</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/">Home</a></li>
                      
                        @if (Route::has('login'))
                      
                            @auth
                            <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link px-lg-3 py-3 py-lg-4">Dashboard</a></li>
                            <li class="nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link px-lg-3 py-3 py-lg-4">Logout</a></li>
                           
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                    </form>
                            @else
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link px-lg-3 py-3 py-lg-4">Log in</a></li>
        
                                @if (Route::has('register'))
                                <li class="nav-item"> <a href="{{ route('register') }}" class="ml-4 nav-link px-lg-3 py-3 py-lg-4">Register</a></li>
                                @endif
                            @endauth
                       
                    @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
     @yield('hero')
  
   
        <!-- Main Content-->
     @yield('content')
  
     <!-- Button trigger modal -->

     
 
     
        <!-- Footer-->
        <header class="border-top" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-12 col-lg-8 col-xl-7 my-5">
                      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Subscribe to our newsletter</button> <br>
                   
                    </div>
                </div>
            </div>
 
        </header>
      
        

 
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Blog  Test {{ Date('Y')}}</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Subscribe to a post category</h5>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <span style="font-size: 14px; margin: 0px 15px" >Be the first to know about a  newly created post based on the category you subscribed to.</span>
                 <form action="{{route('subscribe-to-newsletter')}}" method="POST"> 
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
                  </div>
                </div> 
                <div class="mb-3">
                  <label for="email" class="col-form-label">Email Address:</label>
                  <input type="email" name="email"  required class="form-control" id="email">
                </div>
                
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Subscribe</button>
        </div>
    </form>
      </div>
    </div>
  </div>
        <!-- Button trigger modal -->
    
   <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>
