<x-layout>
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        <div class="card-body">
                            <form method="POST" action="{{route('store.login')}}" class="needs-validation"  novalidate>
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
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
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Signin</button>
                                </div>
                            </form>
                           <p>
                               <a href="{{route('create.register')}}">Ich habe noch keinen Account.</a>
                           </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
