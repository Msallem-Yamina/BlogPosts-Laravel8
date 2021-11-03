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
            <li><a href="#"><i class="fa fa-envelope"></i>BlogPosts@gmail.com</a></li>
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
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#posts">Posts</a></li>
              <li class="scroll-to-section"><a href="#">Services</a></li>
              <li class="scroll-to-section"><a href="#">Projects</a></li>
             
              {{-- auth ya3ni si user cncté sinn l3aks --}}
              @auth
              <li class="scroll-to-section"><a href="/home">Dashboard</a></li>
              @else
              <li class="scroll-to-section"><a href="{{ route('login') }}">Login</a></li>
              <li class="scroll-to-section"><a href="{{ route('register') }}">Register</a></li> 
               @endauth
              <li class="scroll-to-section"><div class="border-first-button"><a href="{{route('addpost')}}">Add Post</a></div></li> 
              
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
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h6>Blogposts Agency</h6>
                    <h2>Share your posts with us</h2>
                    <p>With our plateform you can share your writting to public or you can keep it for later... Thank you.</p>
                  </div>
                  <div class="col-lg-12">
                    <div class="border-first-button scroll-to-section">
                      <a href="{{ route('register')}}">Register</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/slider-dec-v3.png" width="300" height="400">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="posts" class="our-posts section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h6>Our Posts</h6>
                    <h4>See Our Recent <em>Posts</em></h4>
                    <div class="line-dec"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="row">
            <div class="col-lg-12">
                <div class="loop owl-carousel">
                    @foreach ($posts as $post)
                    <div class="item">
                        <a href="{{ route ('showPost',['id'=> $post->id ])}}">
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{ asset('uploads') }}/{{$post->image}}" width="200" height="200">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $post->title }}</h4>
                                    <span>{{ $post->user->name }}</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

     <!-- Start Footer-->
     <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright © 2022 BlogPosts . All Rights Reserved. 
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