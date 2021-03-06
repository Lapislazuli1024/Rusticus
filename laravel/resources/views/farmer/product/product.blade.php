<x-layout>


    <!-- <div class="vr" id="profiledivider"></div> -->
    <div class="container p-5 my-5 container-full">
        <div class="card">
            <div class="row g-0">
                @if($product != null)
                <div class="col-lg container-flex">
                    <div class="card-header">
                        <h3> Produkt: {{$product->name}}</h3>
                        @if(session()->has('error'))
                        <div class="alert alert-warning">
                            <strong>Warnung!</strong> {{session()->get('error')}}
                        </div>
                        @endif
                    </div>
                    <div class="card-body container-flex">
                        <div>
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
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="p-1 col">
                                    <div class="d-grid gap-2">
                                        <a href="{{URL::previous()}}" class="btn btn-dark float-start">Zur??ck</a>
                                    </div>
                                </div>
                                <div class="p-1 col">
                                    <div class="d-grid gap-2">
                                        <a href="/cart/add/{{$product->id}}" class="btn btn-success float-end">Warenkorb</a>
                                    </div>
                                </div>
                            </div>
                            @can('IsProductOwner', $product)
                            <div class="row">
                                <div class="p-1 col">
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('create.product.edit', $product->id) }}" class="btn btn-warning float-end">Bearbeiten</a>
                                    </div>
                                </div>
                                <div class="p-1 col">
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('store.product.remove', $product->id) }}" class="btn btn-danger float-end">Entfernen</a>
                                    </div>
                                </div>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="col-lg">
                    <div class="container">
                        <img src="{{asset($product->image)}}" class="img-layout-detail">
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>