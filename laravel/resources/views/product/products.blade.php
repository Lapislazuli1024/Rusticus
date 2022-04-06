<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Produkte</h3>
            </div>
            <div class="card-body">
                @foreach($products as $product)
                    <div class="card">
                        <div class="card-header">
                            <h5>{{$product->name}}</h5>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="list-group-item">
                                            Menge: {{$product->stock_quantity}}
                                        </div>
                                        <div class="list-group-item">
                                            Preis pro {{$product->unit_of_measure->description}}: {{$product->price}}
                                        </div>
                                    </div>
                                    <div class="col-1 vr"></div>
                                    <div class="col">
                                        <img class="img-thumbnail"src="{{asset($product->image)}}">
                                    </div>
                                    
                                </div>
                            </div>
                            <a href="/product/{{$product->id}}" class="btn btn-dark float-end">Mehr</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
