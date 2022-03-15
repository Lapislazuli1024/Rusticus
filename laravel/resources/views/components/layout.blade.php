<!doctype html>
<html lang="en">
    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout.css')}}" rel="stylesheet">
        <script src="{{asset('js/app.js')}}"></script>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Rusticus</title>
        <nav class="navbar navbar-light navbar-expand-lg mb-5">
            <div class="container">
                <a class="navbar-brand" href="/"><img class="navbar-icon"
                                                      src="{{asset('pictures/Rusticus-Logo.png')}}"/> Rusticus</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="#">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Logout</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </head>
    <body>
        <div class="container content">
            {{ $slot }}
        </div>
    </body>
    <footer class="page-footer font-small blue fixed-bottom">
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            Nalis1000
        </div>
    </footer>
</html>
