<x-layout>
    <div class="container p-5 my-5">
        <div class="container-background">
            <h2 class="text-center">Produkte</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($products as $product)
                @if($product->stock_quantity <= 0) <div class="col no-quantity">
                    @else
                    <div class="col">
                        @endif
                        <div class="card h-100">
                            <img src="{{asset($product->image)}}" class="img-layout">
                            <div class="card-header">
                                <h5 class="card-title">{{$product->name}}</h5>
                                @can('isProductOwner')
                                <a href="/product/edit/{{$product->id}}" class="btn btn-success float-end"> ✏ </a>
                                @endcan
                            </div>
                            <div class="card-body container-flex">
                                <div class="list-group list-group-flush">
                                    <p> Menge: {{$product->stock_quantity}}</p>
                                    <p> Preis pro {{$product->unit_of_measure->description}}: {{$product->price}}</p>
                                </div>
                                <div>
                                    <div class="card text-center">
                                        <a href="/product/show/{{$product->id}}" class="btn btn-success float-end">Mehr</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
</x-layout>