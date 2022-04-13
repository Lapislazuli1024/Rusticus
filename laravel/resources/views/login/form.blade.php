<x-layout>
    <main class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{route('store.login')}}" class="formStyle needs-validation" novalidate>
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required autofocus>
                                <label for="email">Email</label>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                <label for="password">Password</label>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Einloggen</button>
                            </div>
                        </form>
                        <p>
                            <a href="{{ route('create.register') }}">Ich habe noch keinen Account.</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>