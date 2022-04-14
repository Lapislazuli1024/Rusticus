<x-layout>
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Produkt Registrieren</h3>
                    <div class="card-body">
                        <div class="tabcontent" id="divCustomerForm">
                            <form method="POST" action="{{ route('store.product') }}" class="formStyle">
                                @csrf
                                <div class="form-floating col mb-3">
                                    <input type="text" class="form-control" name="productname" id="productname" placeholder="Produktname" value="{{ old('productname') }}" required autofocus>
                                    <label for="productname">Produktname</label>
                                    @error('productname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" name="stock_quantity" id="stock_quantity" placeholder="Lagermenge" value="{{ old('stock_quantity') }}" required>
                                    <label for="stock_quantity">Menge an Lager</label>
                                    @error('stock_quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Beschreibung" value="{{ old('description') }}" required></textarea>
                                    <label for="description">Beschreibung</label>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class=" form-floating mb-3">
                                    <select class="custom-select form-control" id="product_hint" name="product_hint" placeholder="Produkthinweis" value="{{ old('product_hint') }}" required>
                                        <option selected>Choose...</option>
                                        <option value="vegan">Vegan</option>
                                        <option value="vegetarian">Vegetarisch</option>
                                        <option value="neither">Weder noch</option>
                                    </select>
                                    <label for="product_hint">Produkthinweis</label>
                                    @error('product_hint')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="file" class="custom-file-input form-control" id="product_image" name="product_image">
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" name="price" id="price" placeholder="Preis" value="{{ old('price') }}" required>
                                    <label for="price">Preis pro Einheit</label>
                                    @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class=" form-floating mb-3">
                                    <select class="custom-select form-control" id="unit_of_measure" name="unit_of_measure" placeholder="Masseinheit" value="{{ old('unit_of_measure') }}" required>
                                        <option selected>Choose...</option>
                                        @foreach($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->description}}</option>
                                        @endforeach
                                    </select>
                                    <label for="unit_of_measure">Masseinheit</label>
                                    @error('unit_of_measure')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class=" form-floating mb-3">
                                    <select class="custom-select form-control" id="main_category" name="main_category" placeholder="Hauptkategorie" value="{{ old('main_category') }}" onchange="loadSub_categories(this)" required>
                                        <option selected>Choose...</option>
                                        @foreach($main_categories as $category)
                                        <option value="{{$category->id}}">{{$category->description}}</option>
                                        @endforeach
                                    </select>
                                    <label for="main_category">Hauptkategorie</label>
                                    @error('main_category')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if($sub_categories != null)
                                <div class=" form-floating mb-3">
                                    <select class="custom-select form-control" id="sub_category" name="sub_category" placeholder="Hauptkategorie" value="{{ old('sub_category') }}" required>
                                        <option selected>Choose...</option>
                                        @foreach($sub_categories as $category)
                                        <option value="{{$category->id}}">{{$category->description}}</option>
                                        @endforeach
                                    </select>
                                    <label for="sub_category">Uterkategorie</label>
                                    @error('sub_category')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @endif
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Produkt Registrieren</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>