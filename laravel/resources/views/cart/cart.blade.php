<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Warenkorb</h3>
            </div>
            <div class="card-body">
                @foreach($sessionProducts as $product)
                <div class="card">
                    <div class="card-header">
                        <h5>{{$product->product()->first()->name}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img width="100%" class="" src="{{asset($product->product()->first()->image)}}">
                                </div>
                                <div class="col-sm-10">
                                    <div class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <button onclick="window.location.href= '/cart/increment/{{$product->product()->first()->id}}'">+</button>
                                            </div>
                                            <div class="col-sm-4">
                                                Menge:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" value="{{$product->amount}}" name="ProductAmount" disabled>
                                            </div>
                                            <div class="col-sm-1">
                                                <button onclick="window.location.href= '/cart/decrement/{{$product->product()->first()->id}}'">-</button>
                                            </div>
                                            <div class="col-sm-2">
                                                <button onclick="window.location.href= '/cart/remove/{{$product->product()->first()->id}}'">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        Preis pro kg: {{$product->product()->first()->price}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <a href="/reservation/checkout">Checkout</a>
            </div>
        </div>
    </div>
</x-layout>