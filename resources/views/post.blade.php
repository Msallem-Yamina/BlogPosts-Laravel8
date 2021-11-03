<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
        <title>BlogPosts</title>
    
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

         <!-- font-awesome -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/templatemo-digimedia-v3.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
       
      </head>
    <body >
                  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Pre-header Starts -->
  <div class="pre-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8 col-7">
          <ul class="info">
            <li><a href="#"><i class="fa fa-envelope"></i>posts@gmail.com</a></li>
            <li><a href="#"><i class="fa fa-phone"></i>010-020-0340</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-sm-4 col-5">
          <ul class="social-media">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-behance"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Pre-header End -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="/" class="logo">
                <h1 class="p-4">Blog<span style="color:rgb(3, 3, 78)">P</span>osts</h1>
              
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="/">Home</a></li>
              <li class="scroll-to-section"><a href="/AllPosts" class="active">Post</a></li>
              <li class="scroll-to-section"><a href="#services">Services</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Projects</a></li>
             

              @auth
              <li class="scroll-to-section"><a href="/home">Dashboard</a></li>
              @else
              <li class="scroll-to-section"><a href="{{ route('login') }}">Login</a></li>
              <li class="scroll-to-section"><a href="{{ route('register') }}">Register</a></li> 
               @endauth
              <li class="scroll-to-section"><div class="border-first-button"><a href="#contact">Add Post</a></div></li> 
              
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

    <div class="container">
        <div class="container mt-5 p-5">
            <div class="p-5" >
                <h2 class="text-center mb-2">{{ $post->title }}</h2>
                <img src="{{ asset('uploads')}}/{{ $post->image }}" alt="" class="img-fluid">
                <p>
                    {{ $post->description }}
                </p>
                <span class="badge bg-danger">{{ $post->category }}</span>
                <hr />
                <form action="{{ route('AddComment')}}" method="POST">
                    @csrf
                    <input type="text" name="content" class="form-control">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <hr />
                    <button type="submit" class="btn btn-primary"> Commenter </button>
                </form>
            </div>
            <hr />
            <div >
                <h3><i class="fa fa-comments" aria-hidden="true"></i> Comments </h3>
                      <hr />
                @foreach ($post->comments as $comment)

                    <h4 style="color:rgb(89, 123, 236);">{{ $comment->user->name }}</h4>
                    <ul class="container mt-2" style="display:flex;">
                       <li  style="margin-right:auto;">
                        {{ $comment->content }}
                       </li>

                       <li>
                        {{ $comment->created_at->format('D-m-Y H:i:s') }}
                       </li>
                    </ul>
                <hr />
                @endforeach
            </div>          
</div>
    </div>

     <!-- Start Footer-->
     <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright © 2022 , BlogPosts. All Rights Reserved. 
          </div>
        </div>
      </div>
    </footer>
    
    </body>


      <!-- Scripts -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/animation.js') }}"></script>
  <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>


</html>