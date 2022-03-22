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
                            <h5>{{$product['product']}}</h5>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="list-group-item">
                                            Menge:
                                        </div>
                                        <div class="list-group-item">
                                            Preis pro kg:
                                        </div>
                                    </div>
                                    <div class="col-1 vr"></div>
                                    <div class="col">
                                        <img class="img-thumbnail"src="{{asset('pictures/User.png')}}">
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
