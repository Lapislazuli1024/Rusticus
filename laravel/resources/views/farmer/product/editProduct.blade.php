<x-layout>
<main class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Produkt Bearbeiten</h3>
                    <div class="card-body">
                        <div class="tabcontent" id="divCustomerForm">
                            <form method="POST" action="{{ route('store.product.edit') }}" class="formStyle" enctype="multipart/form-data">
                                @csrf
                                <div class="form-floating col mb-3">
                                    <input type="text" class="form-control" name="productname" id="productname" placeholder="Produktname" value="{{ (old('productname') !== null) ? old('productname') : $product->name }}" required autofocus>
                                    <label for="productname">Produktname</label>
                                    @error('productname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="stock_quantity" id="stock_quantity" placeholder="Lagermenge" value="{{ (old('stock_quantity') !== null) ? old('stock_quantity') : $product->stock_quantity }}" required>
                                    <label for="stock_quantity">Menge an Lager</label>
                                    @error('stock_quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Beschreibung" value="{{ (old('description') !== null) ? old('description') : $product->description }}" required></input>
                                    <label for="description">Beschreibung</label>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class=" form-floating mb-3">
                                    <select class="custom-select form-control" id="product_hint" name="product_hint" placeholder="Produkthinweis" value="{{ old('product_hint') }}" required>
                                        <option selected>Choose...</option>
                                        <option value="vegan" {{(old('product_hint') !== null) ? (('vegan' == old('product_hint')) ? "selected" : "") : (($product->product_hint == 'vegan') ? "selected" : "") }}>Vegan</option>
                                        <option value="vegetarian" {{(old('product_hint') !== null) ? (('vegetarian' == old('product_hint')) ? "selected" : "") : (($product->product_hint == 'vegetarian') ? "selected" : "") }}>Vegetarisch</option>
                                        <option value="neither" {{(old('product_hint') !== null) ? (('neither' == old('product_hint')) ? "selected" : "") : (($product->product_hint == 'neither') ? "selected" : "") }}>Weder noch</option>
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
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Preis" value="{{ (old('price') !== null) ? old('price') : $product->price }}" required>
                                    <label for="price">Preis pro Einheit</label>
                                    @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class=" form-floating mb-3">
                                    <select class="custom-select form-control" id="unit_of_measure" name="unit_of_measure" placeholder="Masseinheit" value="{{ old('unit_of_measure') }}" required>
                                        <option selected>Choose...</option>
                                        @foreach($units as $unit)
                                        <option value="{{$unit->id}}" {{ (old('unit_of_measure') !== null) ? (($unit->id == old('unit_of_measure')) ? "selected" : "") : (($unit->id == $product->unit_of_measure->id) ? "selected" : "") }}>{{$unit->description}}</option>
                                        @endforeach
                                    </select>
                                    <label for="unit_of_measure">Masseinheit</label>
                                    @error('unit_of_measure')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class=" form-floating mb-3">
                                    <select class="custom-select form-control" id="sub_category" name="sub_category" placeholder="Hauptkategorie" required>
                                        <option selected>Choose...</option>
                                        @foreach($sub_categories as $category)
                                        <option value="{{$category->id}}" {{ (old('sub_category') !== null) ? (($category->id == old('sub_category')) ? "selected" : "") : (($category->id == $product->sub_category->id) ? "selected" : "") }}>{{$category->description}}</option>
                                        @endforeach
                                    </select>
                                    <label for="sub_category">Uterkategorie</label>
                                    @error('sub_category')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Produkt Hinzufügen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>