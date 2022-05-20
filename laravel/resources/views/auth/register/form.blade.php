<x-layout>
    <div class="container p-5 my-5 container-full">
        <!-- <div class="row justify-content-center"> -->
        <div class="col-lg-4">
            <div class="card">
                <h3 class="card-header text-center">Registrierung</h3>
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item">
                            <button class="nav-link active" id="customerTab" onclick="selectRegisterForm(event)">Kunde</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="farmerTab" onclick="selectRegisterForm(event)">Bauer</button>
                        </li>
                    </ul>
                    <div class="tabcontent" id="divCustomerForm">
                        <form method="POST" action="{{ route('storeCustomer.register') }}" class="formStyle">
                            @csrf
                            <div class="row g-2">
                                <div class="form-floating col mb-3">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Vorname" value="{{ old('name') }}" required autofocus>
                                    <label for="name">Vorname</label>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating col mb-3">
                                    <input type="text" class="form-control" name="surname" id="surname" placeholder="Nachname" value="{{ old('surname') }}" required>
                                    <label for="surname">Nachname</label>
                                    @error('surname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required>
                                <label for="username">Username</label>
                                @error('surname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                <label for="email">Email</label>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class=" form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Passwort" required>
                                <label for="password">Passwort</label>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Passwort wiederholen" required>
                                <label for="password_confirmation">Passwort wiederholen</label>
                                <div class="form-text">
                                    Das Passwort muss mind. 6 Zeichen lang sein, sowie Buchstaben und Zahlen beinhalten.
                                </div>
                                @if (session()->has('pwd_customer'))
                                <span class="text-danger">{{ session()->get('pwd_customer') }}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Registrieren</button>
                            </div>
                        </form>
                    </div>
                    <div class="tabcontent" id="divFarmerForm" style="display:none;">
                        <form method="POST" action="{{ route('storeFarmer.register') }}" class="formStyle">
                            @csrf
                            <div class="row g-2">
                                <div class="form-floating col mb-3">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Vorname" value="{{ old('name') }}" required autofocus>
                                    <label for="name">Vorname</label>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating col mb-3">
                                    <input type="text" class="form-control" name="surname" id="surname" placeholder="Nachname" value="{{ old('surname') }}" required>
                                    <label for="surname">Nachname</label>
                                    @error('surname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                <label for="email">Email</label>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="street" name="street" placeholder="Strasse" value="{{ old('street') }}" required>
                                <label for="street">Strasse</label>
                                @error('street')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row g-2">
                                <div class="form-floating col mb-3">
                                    <input type="text" class="form-control" id="place" name="place" placeholder="Ort" value="{{ old('place') }}" required>
                                    <label for="place">Ort</label>
                                    @error('place')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating col mb-3">
                                    <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="PLZ" value="{{ old('postalcode') }}" required>
                                    <label for="postalcode">PLZ</label>
                                    @error('postalcode')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class=" form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Passwort" required>
                                <label for="password">Passwort</label>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Passwort wiederholen" required>
                                <label for="password_confirmation">Passwort wiederholen</label>
                                @if (session()->has('pwd_farmer'))
                                <span class="text-danger">{{ session()->get('pwd_farmer') }}</span>
                                @endif
                                <div class="form-text">
                                    Das Passwort muss mind. 6 Zeichen lang sein, sowie Buchstaben und Zahlen beinhalten.
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Registrieren</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</x-layout>