<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3> Produkt: {{$product->name}}</h3>
                @if(session()->has('error'))
                <div class="alert alert-warning">
                    <strong>Warnung!</strong> {{session()->get('error')}}
                </div>
                @endif
            </div>
            <div class="card-body">
                <div clas="container">
                    <div class="row">
                        <div class="col-sm">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Anzahl: {{$product->stock_quantity}}
                                </li>
                                <li class="list-group-item">
                                    Preis pro {{$product->unit_of_measure->description}}: {{$product->price}}
                                </li>
                                <li class="list-group-item">
                                    Kategorie: {{$product->sub_category->description}} / {{$product->sub_category->main_category->description}}
                                </li>
                                <li class="list-group-item">
                                    Produkthinweise: {{$product->product_hint}}
                                </li>
                            </ul>
                            <div class="card-text list-group-item" id="profiledetails">
                                Details: {{$product->description}}
                            </div>
                        </div>
                        <div class="vr" id="profiledivider"></div>
                        <div class="col  float-end">
                            <img class="img-thumbnail" src="{{asset($product->image)}}">
                        </div>
                    </div>
                </div>
                <a href="/products" class="btn btn-dark float-start">Zurück</a>
                <a href="/cart/add/{{$product->id}}" class="btn btn-dark float-end">🛒</a>
            </div>
        </div>
    </div>

</x-layout>