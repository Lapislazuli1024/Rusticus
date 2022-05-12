<x-layout>
    <main class="container p-5 my-5 container-full">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">

                    <h3 class="card-header text-center">Registrierung</h3>

                    <ul style="border: 2px solid black">
                        <li><a href="{{ route('create.settings') }}">Profil</a></li>

                        @can('IsFarmer')
                        <li><a href="{{ route('create.webpage.edit') }}">Webseite</a></li>
                        <li><a href="{{ route('farmersProducts', 1 ) }}">Produkte</a></li>
                        @endcan
                    </ul>

                    <div class="card-body">

                        @can('IsCustomer')
                        <form method="POST" action="{{ route('storeCustomer.settings') }}" class="formStyle">
                            @csrf
                            <div class="row g-2">
                                <div class="form-floating col mb-3">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Vorname" value="{{ (old('name') !== null) ? old('name') : $user->name }}" required autofocus>
                                    <label for="name">Vorname</label>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating col mb-3">
                                    <input type="text" class="form-control" name="surname" id="surname" placeholder="Nachname" value="{{ (old('surname') !== null) ? old('surname') : $user->surname }}" required>
                                    <label for="surname">Nachname</label>
                                    @error('surname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ (old('username') !== null) ? old('username') : $user->customer->username  }}" required>
                                <label for="username">Username</label>
                                @error('surname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ (old('email') !== null) ? old('email') : $user->email }}" required>
                                <label for="email">Email</label>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Registrieren</button>
                            </div>
                        </form>
                        @endcan

                        @can('IsFarmer')
                        <form method="POST" action="{{ route('storeFarmer.settings') }}" class="formStyle">
                            @csrf
                            <div class="row g-2">
                                <div class="form-floating col mb-3">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Vorname" value="{{ (old('name') !== null) ? old('name') : $user->name }}" required autofocus>
                                    <label for="name">Vorname</label>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating col mb-3">
                                    <input type="text" class="form-control" name="surname" id="surname" placeholder="Nachname" value="{{ (old('surname') !== null) ? old('surname') : $user->surname }}" required>
                                    <label for="surname">Nachname</label>
                                    @error('surname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ (old('email') !== null) ? old('email') : $user->email }}" required>
                                <label for="email">Email</label>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="street" name="street" placeholder="Strasse" value="{{ (old('street') !== null) ? old('street') : $user->farmer->address->street }}" required>
                                <label for="street">Strasse</label>
                                @error('street')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row g-2">
                                <div class="form-floating col mb-3">
                                    <input type="text" class="form-control" id="place" name="place" placeholder="Ort" value="{{ (old('place') !== null) ? old('place') : $user->farmer->address->town->name }}" required>
                                    <label for="place">Ort</label>
                                    @error('place')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating col mb-3">
                                    <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="PLZ" value="{{ (old('place') !== null) ? old('place') : $user->farmer->address->town->postal_code }}" required>
                                    <label for="postalcode">PLZ</label>
                                    @error('postalcode')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Registrieren</button>
                            </div>
                        </form>
                        @endcan


                        <form method="POST" action="{{ route('storePW.settings') }}" class="formStyle">
                            @csrf
                            <div class=" form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Passwort" value="********" required>
                                <label for="password">Passwort</label>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Passwort wiederholen" value="********" required>
                                <label for="password_confirmation">Passwort wiederholen</label>
                                @if (session()->has('pwd_farmer'))
                                <span class="text-danger">{{ session()->get('pwd_farmer') }}</span>
                                @endif
                                <div class="form-text">
                                    Das Passwort muss mind. 6 Zeichen lang sein, sowie Buchstaben und Zahlen beinhalten.
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Password speichern!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>