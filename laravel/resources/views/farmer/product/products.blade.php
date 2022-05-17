<x-layout>
    <div class="container p-5 my-5">
        <div class="container-background">
            <div class="container-titel-flex">
                <h2>Produkte</h2>
                @can('IsFarmer')
                <div class="container-titel-flex-end">
                    <a href="/product/add" class="btn btn-success btn-lg float-end">Product Hinzufügen</a>
                </div>
                @endcan
            </div>


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
                            </div>
                            <div class="card-body container-flex">
                                <div class="list-group list-group-flush">
                                    <p> Menge: {{$product->stock_quantity}}</p>
                                    <p> Preis pro {{$product->unit_of_measure->description}}: {{$product->price}}</p>
                                </div>
                                <div>
                                    <div class="p-1 row">
                                        <a href="/product/show/{{$product->id}}" class="btn btn-success float-end">Mehr</a>
                                    </div>
                                    @can('IsProductOwner', $product)
                                    <div class="p-1 row">
                                        <a href="/product/edit/{{$product->id}}" class="btn btn-warning float-end">Bearbeiten</a>
                                    </div>
                                    @endcan

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</x-layout>