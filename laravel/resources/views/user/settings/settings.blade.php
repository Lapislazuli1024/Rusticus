<x-layout>
    <main class="container p-5 my-5 container-full">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h3 class="card-header text-center">Einstellungen</h3>
                    <div class="card-body">
                        <div class="container-flex-settings">
                            <div class="nav flex-column nav-pills col-md-3 nav-responsive-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                @can('IsFarmer')
                                <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false">Home</button>
                                @endcan

                                <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</button>
                                <button class="nav-link" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password" aria-selected="false">Password</button>
                                
                                @can('IsFarmer')
                                <button class="nav-link" id="v-pills-addProduct-tab" data-bs-toggle="pill" data-bs-target="#v-pills-addProduct" type="button" role="tab" aria-controls="v-pills-addProduct" aria-selected="false">Add Product</button>
                                @endcan
                            </div>

                            <div class="tab-content col-md-8" id="v-pills-tabContent">

                                <!-- FARMER WEBPAGE CONTENT START -->
                                @can('IsFarmer')
                                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <form method="POST" action="{{ route('store.webpage.edit') }}" class="formStyle" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" class="form-control" name="webpageId" id="webpageId" value="{{ $user->farmer->webpage->id }}" hidden>
                                        <div class="form-floating col mb-3">
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Webpage Titel" value="{{ (old('title') !== null) ? old('title') : $user->farmer->webpage->title }}" required autofocus>
                                            <label for="title">Webpage Title</label>
                                            @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="file" class="custom-file-input form-control" id="webpage_image" name="webpage_image" accept="image/*">
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="description" id="description" placeholder="Beschreibung" value="{{ (old('description') !== null) ? old('description') : $user->farmer->webpage->description }}" required>
                                            <label for="description">Beschreibung der Webseite</label>
                                            @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="webpage_url" id="webpage_url" placeholder="URL Webseite" value="{{ (old('webpage_url') !== null) ? old('webpage_url') : $user->farmer->webpage->webpage_url }}" required>
                                            <label for="webpage_url">URL zur eigenen Webseite</label>
                                            @error('webpage_url')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="d-grid mx-auto">
                                            <button type="submit" class="btn btn-warning btn-block">Werte übernehmen</button>
                                        </div>
                                    </form>
                                </div>
                                @endcan
                                <!-- FARMER WEBPAGE CONTENT START -->

                                <!-- USER PROFILE CONTENT START -->
                                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
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
                                        <div class="form-floating mb-3">
                                            <div class="row g-2">
                                                <div class="form-floating col mb-3">
                                                    <input type="text" class="form-control" id="place" name="place" placeholder="Ort" value="{{ (old('place') !== null) ? old('place') : $user->farmer->address->town->name }}" required>
                                                    <label for="place">Ort</label>
                                                    @error('place')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-floating col mb-3">
                                                    <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="PLZ" value="{{ (old('postalcode') !== null) ? old('postalcode') : $user->farmer->address->town->postal_code }}" required>
                                                    <label for="postalcode">PLZ</label>
                                                    @error('postalcode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-grid mx-auto">
                                            <button type="submit" class="btn btn-warning btn-block">Speichern</button>
                                        </div>
                                    </form>
                                    @endcan
                                </div>
                                <!-- USER PROFILE CONTENT ENDE -->

                                <!-- PASSWORD CONTENT START -->
                                <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
                                    <form method="POST" action="{{ route('storePW.settings') }}" class="formStyle">
                                        @csrf
                                        <div class=" form-floating mb-3">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Passwort" value="" required>
                                            <label for="password">Passwort</label>
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Passwort wiederholen" value="" required>
                                            <label for="password_confirmation">Passwort wiederholen</label>
                                            @if (session()->has('pwd_change'))
                                            <span class="text-danger">{{ session()->get('pwd_change') }}</span>
                                            @endif
                                            <div class="form-text">
                                                Das Passwort muss mind. 6 Zeichen lang sein, sowie Buchstaben und Zahlen beinhalten.
                                            </div>
                                        </div>
                                        <div class="form-text" style="color:transparent">
                                            Das Passwort muss mind. 6 Zeichen lang sein, sowie Buchstaben und Zahlen beinhalten.
                                        </div>
                                        <div class="d-grid mx-auto">
                                            <button type="submit" class="btn btn-warning btn-block">Password speichern!</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- PASSWORD CONTENT END -->

                                <!-- ADD PRODUCT CONTENT START -->
                                @can('IsFarmer')
                                <div class="tab-pane fade" id="v-pills-addProduct" role="tabpanel" aria-labelledby="v-pills-addProduct-tab">
                                    <form method="POST" action="{{ route('store.product') }}" enctype="multipart/form-data" class="formStyle">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="productname" id="productname" placeholder="Produktname" value="{{ old('productname') }}" required autofocus>
                                            <label for="productname">Produktname</label>
                                            @error('productname')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="stock_quantity" id="stock_quantity" placeholder="Lagermenge" value="{{ old('stock_quantity') }}" required>
                                            <label for="stock_quantity">Menge an Lager</label>
                                            @error('stock_quantity')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="description" name="description" placeholder="Beschreibung" value="{{ old('description') }}" required></input>
                                            <label for="description">Beschreibung</label>
                                            @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class=" form-floating mb-3">
                                            <select class="custom-select form-control" id="product_hint" name="product_hint" placeholder="Produkthinweis" value="{{ old('product_hint') }}" required>
                                                <option selected>Choose...</option>
                                                <option value="vegan" {{('vegan' == old('product_hint')) ? "selected" : ""}}>Vegan</option>
                                                <option value="vegetarian" {{('vegetarian' == old('product_hint')) ? "selected" : ""}}>Vegetarisch</option>
                                                <option value="neither" {{('neither' == old('product_hint')) ? "selected" : ""}}>Weder noch</option>
                                            </select>
                                            <label for="product_hint">Produkthinweis</label>
                                            @error('product_hint')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="file" class="custom-file-input form-control" id="product_image" name="product_image" accept="image/*">
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="price" id="price" placeholder="Preis" value="{{ old('price') }}" required>
                                            <label for="price">Preis pro Einheit</label>
                                            @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="custom-select form-control" id="unit_of_measure" name="unit_of_measure" placeholder="Masseinheit" value="{{ old('unit_of_measure') }}" required>
                                                <option selected>Choose...</option>
                                                @foreach($units as $unit)
                                                <option value="{{$unit->id}}" {{($unit->id == old('unit_of_measure')) ? "selected" : ""}}>{{$unit->description}}</option>
                                                @endforeach
                                            </select>
                                            <label for="unit_of_measure">Masseinheit</label>
                                            @error('unit_of_measure')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="custom-select form-control" id="sub_category" name="sub_category" placeholder="Hauptkategorie" required>
                                                <option selected>Choose...</option>
                                                @foreach($sub_categories as $category)
                                                <option value="{{$category->id}}" {{($category->id == old('sub_category')) ? "selected" : ""}}>{{$category->description}}</option>
                                                @endforeach
                                            </select>
                                            <label for="sub_category">Uterkategorie</label>
                                            @error('sub_category')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="d-grid mx-auto">
                                            <button type="submit" class="btn btn-success btn-block">Produkt Hinzufügen</button>
                                        </div>
                                    </form>
                                </div>
                                @endcan
                                <!-- ADD PRODUCT CONTENT END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>