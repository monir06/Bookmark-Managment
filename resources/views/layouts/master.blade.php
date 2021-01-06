<!DOCTYPE html>
<html lang="en">
<head>

     <title>Bookmark Management</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css') }}">
     <link rel="stylesheet" href="{{ asset('/assets/css/aos.css') }}">
     <link rel="stylesheet" href="{{ asset('/assets/css/owl.carousel.min.css') }}">
     <link rel="stylesheet" href="{{ asset('/assets/css/owl.theme.default.min.css') }}">
     

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ asset('/assets/css/styles.css') }}">

</head>
<body>

     <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
              <i class="fa fa-bookmark"></i>
              Bookmark Management
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link smoothScroll">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link smoothScroll">Registration</a>
                    </li>
                    @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    <li class="nav-item">
                        <a href="#" class="nav-link contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


     <!-- HERO -->
     <section class="hero hero-bg d-flex justify-content-center align-items-center">
               <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
                              <div class="hero-text">

                                   <h1 class="text-white" data-aos="fade-up">We are ready for managing your bookmarks</h1>

                                   <a href="{{ route('home') }}" class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="100">Lets Start!</a>

                              </div>
                        </div>

                        <div class="col-lg-6 col-12">
                          <div class="hero-image" data-aos="fade-up" data-aos-delay="300">

                            <img src="{{ asset('/assets/images/people-bookmark.png') }}" class="img-fluid" alt="working girl">
                          </div>
                        </div>

                    </div>
               </div>
     </section>



     <!-- PROJECT DETAIL -->
     <section class="project-detail section-padding">
          <div class="container">
               <div class="row">

                  <div class="col-lg-6 col-md-6 col-12 mb-5">

                      <img src="{{ asset('/assets/images/project/project-detail/personal-website.png') }}" class="img-fluid" alt="personal website" data-aos="fade-up">
                    </div>

                    <div class="col-lg-5 col-md-6 mr-lg-auto mt-lg-5 col-12" data-aos="fade-up" data-aos-delay="200">

                      <h2>Features:</h2>

                      <ul class="list-detail">
                        <li><span>Display all your bookmarks</span></li>
                        <li><span>Add bookmark with metadata(like title,url,note)</span></li>
                        <li><span>Modify bookmark</span></li>
                        <li><span>Delete Bookmark</span></li>
                      </ul>
                    </div>
               </div>

              <div class="col-lg-9 mx-auto col-12" data-aos="fade-up">
                <div class="client-info mt-lg-5 py-lg-5">
                    <h3>Developed by:</h3>

                    <div class="d-flex align-items-center mt-3">
                      <img src="{{ asset('/assets/images/project/project-detail/male-avatar.png') }}" class="img-fluid" alt="male avatar">

                      <a href="https://www.facebook.com/m.john006">Monir John Rakib</a>
                    </div>
                </div>
              </div>
          </div>
     </section>

     <!-- SCRIPTS -->
     <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
     <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('/assets/js/aos.js') }}"></script>
     <script src="{{ asset('/assets/js/custom.js') }}"></script>

</body>
</html>