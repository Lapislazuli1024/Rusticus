<x-layout>
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Registrierung</h3>
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-3" id="myTab0" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="customerTab" onclick="selectRegisterForm(event)">
                                        Kunde
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="farmerTab" onclick="selectRegisterForm(event)">
                                        Bauer
                                    </button>
                                </li>
                            </ul>
                            <div class="tabcontent">
                                <div class="tabcontent" id="divCustomerForm" role="tabpanel" aria-labelledby="home-tab0">
                                    <form method="POST" action="{{route('store.register')}}" class="formStyle">
                                        @csrf
                                        <div class="row g-2">
                                            <div class="form-floating col mb-3">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Vorname" required autofocus>
                                                <label for="name">Vorname</label>
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-floating col mb-3">
                                                <input type="text" class="form-control" name="surname" id="surname" placeholder="Nachname" required>
                                                <label for="surname">Nachname</label>
                                                @error('surname')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                            <label for="username">Username</label>
                                            @error('surname')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" placeholder="Email" id="email" class="form-control" name="email" required>
                                            <label for="floatingInput">Email</label>
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                            <label for="floatingInput">Password</label>

                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" placeholder="Password Confirmation" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                            <label for="floatingInput">Password Confirmation</label>
                                            <div id="passwordHelpBlock" class="form-text">
                                                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                            </div>
                                        </div>
                                        <div class="d-grid mx-auto">
                                            <button type="submit" class="btn btn-dark btn-block">Signin</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tabcontent" id="divFarmerForm" role="tabpanel" aria-labelledby="profile-tab0" style="display:none;">

                                    <form method="POST" action="{{route('store.register')}}" class="formStyle">
                                        <div class="row g-2">
                                            @foreach($errors as $error)
                                            <p>{{$error}}</p>
                                            @endforeach
                                            <div class="form-floating col mb-3">
                                                <input type="text" class="form-control" placeholder="First name" name="firstName" id="firstName" required autofocus>
                                                <label for="floatingInput">First name</label>
                                                @if ($errors->has('firstName'))
                                                <span class="text-danger">{{ $errors->first('firstName') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-floating col mb-3">
                                                <input type="text" class="form-control" placeholder="Last name" name="lastName" id="lastName" required autofocus>
                                                <label for="floatingInput">Last name</label>
                                                @if ($errors->has('lastName'))
                                                <span class="text-danger">{{ $errors->first('lastName') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input type="text" placeholder="Username:" id="username" class="form-control" name="username" required autofocus>
                                            <label for="floatingInput">Username</label>
                                            @if ($errors->has('username'))
                                            <span class="text-danger">{{ $errors->first('username') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                                            <label for="floatingInput">Email</label>
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" placeholder="Address" id="address" class="form-control" name="address" required autofocus>
                                            <label for="floatingInput">Adresse</label>
                                            @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                        <div class="row g-2">
                                            <div class="form-floating col mb-3">
                                                <input type="text" placeholder="PLZ" id="plz" class="form-control" name="plz" required autofocus>
                                                <label for="floatingInput">PLZ</label>
                                                @if ($errors->has('plz'))
                                                <span class="text-danger">{{ $errors->first('plz') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-floating col mb-3">
                                                <input type="text" placeholder="Ort" id="ort" class="form-control" name="ort" required autofocus>
                                                <label for="floatingInput">Ort</label>
                                                @if ($errors->has('ort'))
                                                <span class="text-danger">{{ $errors->first('ort') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                            <label for="floatingInput">Password</label>

                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" placeholder="Password Confirmation" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                            <label for="floatingInput">Password Confirmation</label>
                                            <div id="passwordHelpBlock" class="form-text">
                                                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                            </div>
                                        </div>
                                        <div class="d-grid mx-auto">
                                            <button type="submit" class="btn btn-dark btn-block">Signin</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>