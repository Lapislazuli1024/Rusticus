<x-layout>
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Register User</h3>
                        <div class="card-body">
                            <form method="POST" action="{{route('register.auth')}}">
                                <div class="row g-2">
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
                                    <input type="text" placeholder="Adress" id="adress" class="form-control" name="adress" required autofocus>
                                           <label for="floatingInput">Adress</label>
                                    @if ($errors->has('adress'))
                                        <span class="text-danger">{{ $errors->first('adress') }}</span>
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
                                    <div id="passwordHelpBlock" class="form-text">
                                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" placeholder="Password Confirmation" class="form-control"id="password_confirmation" name="password_confirmation">
                                    <label for="floatingInput">Password Confirmation</label>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
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
    </main>
</x-layout>
