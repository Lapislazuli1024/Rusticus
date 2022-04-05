<!doctype html>
<html lang="en">
    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout.css')}}" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf_token" content="{{csrf_token()}}">
        <title>Rusticus</title>

        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><img class="navbar-icon" src="{{asset('pictures/Rusticus-Logo.png')}}"> Rusticus</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                                {{--@guest--}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                                {{--else--}}
                            <li class="nav-item justify-self-center">
                                <a class="nav-link" href="{{route('farmers')}}">Bauern</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('products')}}">Produkte</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Logout</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Benutzer
                                <!-- <img class="navbar-icon" src="{{asset('pictures/User.png')}}"> -->
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Einstellungen</a></li>
                                    <li><a class="dropdown-item" href="#">Logout</a></li>
                                    <li><a class="dropdown-item" href="#">Hilfe</a></li>
                                </ul>
                                </li>
                         {{--   @endguest--}}
                    </ul>
                </div>
            </div>
        </nav>
    </head>
    <body>
        <div class="container p-5 my-5">
            {{ $slot }}
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/expandform.js')}}"></script>

    </body>
    <!-- <video class="myVideo" autoplay muted loop id="myVideo">
        <source src="{{asset('/pictures/windmull-mountan.mp4')}}" type="video/mp4">
    </video> -->
<footer class="footer--light">
  <div class="footer-big">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-12">
          <img  class="pictures" src="{{asset('pictures/Rusticus-Logo.png')}}">
        </div>
        <div class="col-md-3 col-sm-4">
              <h4>Popular Category</h4>
              <ul>
                <li>
                  <a href="#">Wordpress</a>
                </li>
                <li>
                  <a href="#">Plugins</a>
                </li>
              </ul>
        </div>
        <div class="col-md-3 col-sm-4">
              <h4>Our Company</h4>
              <ul>
                <li>
                  <a href="#">About Us</a>
                </li>
                <li>
                  <a href="#">How It Works</a>
                </li>
              </ul>
        </div>
        <div class="col-md-3 col-sm-4">
              <h4>Help Support</h4>
              <ul>
                <li>
                  <a href="#">Support Forum</a>
                </li>
                <li>
                  <a href="#">Terms &amp; Conditions</a>
                </li>
              </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="mini-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-text">
            <p>© 2022
              <a href="#">Rusticus</a>. All rights reserved. Created by
              <a href="#">Rusticus</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
</html>
