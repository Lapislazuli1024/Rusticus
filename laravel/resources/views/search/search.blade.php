<x-layout>
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h3>Resultate zu '{{$search}}'</h3>
                </div>
                <div class="card-body" id="class">
                    @foreach($result as $product)
                    @if($product->stock_quantity >= 0)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{asset($product->image)}}" class="img-layout">
                            <div class="card-header">
                                <h5 class="card-title">{{$product->name}}</h5>
                                @can('IsProductOwner', $product)
                                <a href="/product/edit/{{$product->id}}" class="btn btn-success float-end">Bearbeiten</a>
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
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/filters.js')}}"></script>
</x-layout>