<x-layout>
    <div class="card">
        <div class="card-header">
            Resultate zu '{{$search}}'
        </div>
        <div class="card-body">
            @foreach($result as $product)

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
                                        Preis pro kg: {{$product->price}}
                                    </div>
                                </div>
                                <div class="col-1 vr"></div>
                                <div class="col">
                                    <img class="img-thumbnail" src="{{asset('pictures/User.png')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
