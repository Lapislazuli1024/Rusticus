<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="csrf_token" content="{{csrf_token()}}">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/layout.css')}}" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('js/expandform.js')}}"></script>
  <script src="{{asset('js/AddProduct.js')}}"></script>

  <title>Rusticus</title>

</head>

<body class="d-flex flex-column backgroundPictures">

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><img class="navbar-icon" src="{{asset('pictures/Rusticus-Logo.png')}}"> Rusticus</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item justify-self-center">
            <a class="nav-link" href="{{route('farmers')}}">Bauern</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('products')}}">Produkte</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('create.login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('create.register') }}">Register</a>
          </li>
          @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Benutzer
              <!-- <img class="navbar-icon" src="{{asset('pictures/User.png')}}"> -->
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="{{ route('create.settings') }}">Einstellungen</a></li>
              <li><a class="dropdown-item" href="{{ route('cart') }}">Warenkorb</a></li>
              <li><a class="dropdown-item" href="{{ route('reservation') }}">Reservation</a></li>
              <li><a class="dropdown-item" href="{{ route('destroy.session') }}">Logout</a></li>
              <li><a class="dropdown-item" href="{{ route('create.help') }}">Hilfe</a></li>
            </ul>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <!-- <div class="container p-5 my-5"> -->
    {{ $slot }}
  <!-- </div> -->
</body>



<footer>
  <!-- Footer -->
  <div class="container text-center text-sm-left mt-5">
    <div class="row">
      <div class="col-sm-5 mx-auto mb-4">
        <h6>RUSTICUS</h6>
        <hr class="mb-4 mt-0 d-inline-block mx-auto">
        <div class="container-fluid">
          <img class="img-footer" src="{{asset('pictures/Rusticus-Logo.png')}}">
        </div>
      </div>
      <div class="col-sm-3 mx-auto mb-4">
        <h6>JEDERZEIT INFORMIERT</h6>
        <hr class="mb-4 mt-0 d-inline-block mx-auto">
        <h5 class="mb-2 mt-2">Newsletter abonnieren?</h5>
        <div class="formStyle needs-validation">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
            <label for="email">Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
            <label for="email">Email</label>
          </div>
          <div class="d-grid mx-auto">
            <button type="button" id="signUpNewsletter" class="btn btn-outline-primary btn-rounded waves-effect">Absenden!</button>
          </div>
        </div>
      </div>
      <div class="col-sm-4 mx-auto mb-4">
        <h6>IMPRESSUM</h6>
        <hr class="mb-4 mt-0 d-inline-block mx-auto">
        <p><i class="fas fa-home mr-3"></i>Luzern, Zufallstrasse 4, Schweiz</p>
        <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
        <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
        <p><i class="fas fa-mobile mr-4"></i> + 01 234 567 88 </p>
      </div>
    </div>
  </div>
  <div>
    <div class="mini-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="text-center py-3">© 2022 Copyright:
              <a href="#"> Rusticus.com</a>
            </div>
          </div>
          <div class="col-md-2">
            <div class="text-center py-3">
              <a href="#">Datenschutz</a>
            </div>
          </div>
          <div class="col-md-2">
            <div class="text-center py-3">
              <a href="#">Privacy Statement</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

</html>