<x-layout>
    <div class="container-background">
        <h2 class="text-center">Produkte</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($products as $product)
            <div class="col">
                <div class="card h-100">
                    <img class="img-thumbnail" src="{{asset($product->image)}}">
                    <div class="card-header">
                        <h5 class="card-title">{{$product->name}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <p> Menge: {{$product->stock_quantity}}</p>
                            <p> Preis pro {{$product->unit_of_measure->description}}: {{$product->price}}</p>
                        </div>
                        <div class="card text-center">
                            <a href="/product/{{$product->id}}" class="btn btn-success float-end">Mehr</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>