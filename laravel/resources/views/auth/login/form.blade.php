<x-layout>
    <div class="container p-5 my-5 container-full">
        <main class="container-full">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('store.login') }}" class="formStyle needs-validation" novalidate>
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" required autofocus>
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Einloggen</button>
                                </div>

                                @if (session()->has('login_error'))
                                <span class="text-danger">{{ session()->get('login_error') }}</span>
                                @endif
                            </form>
                            <p>
                                <a href="{{ route('create.register') }}">Ich habe noch keinen Account.</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-layout>