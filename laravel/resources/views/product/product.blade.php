<x-layout>


    <!-- <div class="vr" id="profiledivider"></div> -->



    <div class="card md-3">
        <div class="row g-0">

            <div class="col-md-6">
                <div class="card-header">
                    <h3> Produkt: {{$product->name}}</h3>
                    @if(session()->has('error'))
                    <div class="alert alert-warning">
                        <strong>Warnung!</strong> {{session()->get('error')}}
                    </div>
                    @endif
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Anzahl: {{$product->stock_quantity}}
                    </li>
                    <li class="list-group-item">
                        Preis pro {{$product->unit_of_measure->description}}: {{$product->price}}
                    </li>
                    <li class="list-group-item">
                        Kategorie: {{$product->sub_category->description}} / {{$product->sub_category->main_category->description}}
                        u </li>
                    <li class="list-group-item">
                        Produkthinweise: {{$product->product_hint}}
                    </li>
                    <li class="list-group-item">
                        Details: {{$product->description}}
                    </li>
                </ul>
                <div class="card-body">
                    <div class="text-center">
                        <div class="btn-group me-2">
                            <a href="{{URL::previous()}}" class="btn btn-dark float-start">Zurück</a>
                        </div>
                        <div class="btn-group me-2">
                            <a href="/cart/add/{{$product->id}}" class="btn btn-success float-end">🛒</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="img-fluid">
                    <img src="{{asset($product->image)}}" class="img-fluid rounded-start">
                </div>
            </div>
        </div>
    </div>
</x-layout>