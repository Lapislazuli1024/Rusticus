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
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/expandform.js')}}"></script>

    </body>
    <footer class="page-footer font-small blue fixed-bottom">
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            Nalis1000
        </div>
    </footer>
</html>
