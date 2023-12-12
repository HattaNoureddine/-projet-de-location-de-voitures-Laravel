<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('guest/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('guest/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('guest/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('guest/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('guest/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ asset('guest/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/style.css') }}">


  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="/">Car<span>Book</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="/services" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="/pricing" class="nav-link">Pricing</a></li>
	          <li class="nav-item"><a href="/cars" class="nav-link">Cars</a></li>
	          <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
                @if(Route::has('login'))
                @auth
                <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
                  <i class="ti-power-off text-primary"></i>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
               </form>
                </a>  
                </li>              
                @else
                   <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    @if (Route::has('register'))
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Registre</a></li>
                    @endif
                @endauth
        @endif
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    @yield('content')

    
    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md">
              <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>book</span></a></h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                  <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
              </div>
            </div>
            <div class="col-md">
              <div class="ftco-footer-widget mb-4 ml-md-5">
                <h2 class="ftco-heading-2">Information</h2>
                <ul class="list-unstyled">
                  <li><a href="#" class="py-2 d-block">About</a></li>
                  <li><a href="#" class="py-2 d-block">Services</a></li>
                  <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
                  <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
                  <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md">
               <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Customer Support</h2>
                <ul class="list-unstyled">
                  <li><a href="#" class="py-2 d-block">FAQ</a></li>
                  <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                  <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
                  <li><a href="#" class="py-2 d-block">How it works</a></li>
                  <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md">
              <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">Have a Questions?</h2>
                  <div class="block-23 mb-3">
                    <ul>
                      <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                      <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                      <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                    </ul>
                  </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
  
              <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
          </div>
        </div>
      </footer>
      
    
  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  
    <script src="{{ asset('guest/js/jquery.min.js') }}"></script>
    <script src="{{ asset('guest/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('guest/js/popper.min.js') }}"></script>
    <script src="{{ asset('guest/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('guest/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('guest/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('guest/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('guest/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('guest/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('guest/js/aos.js') }}"></script>
    <script src="{{ asset('guest/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('guest/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('guest/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('guest/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('guest/js/google-map.js') }}"></script>
    <script src="{{ asset('guest/js/main.js') }}"></script>
      
    </body>
  </html>