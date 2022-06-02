<x-layout>
    <div class="container p-5 my-5">
        <div class="card">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Warenkorb</h2>
                        </div>
                    </div>
                    @foreach($sessionProducts as $product)

                    <hr>
                    <div class="row items-border align-items-center">
                        <div class="col-11">
                            <div class="row items-border align-items-center">
                                <div class="col-lg-6">
                                    <div class="row items-border align-items-center">
                                        <div class="col-md-6 card-responsive">
                                            <img class="img-fluid img-warenkorb" src="{{asset($product->product()->first()->image)}}">
                                        </div>
                                        <div class="col-md-6 card-responsive">
                                            {{$product->product()->first()->name}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row items-border align-items-center">
                                        <div class="col-md-8 card-responsive">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-success" onclick="window.location.href= '/cart/increment/{{$product->product()->first()->id}}'">+</button>
                                                <button type="button" class="btn btn-light"> {{$product->amount}}</button>
                                                <button type="button" class="btn btn-warning" onclick="window.location.href= '/cart/decrement/{{$product->product()->first()->id}}'">-</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 card-responsive">
                                            CHF {{$product->product()->first()->price * $product->amount}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1 card-respnsive-center-button"aria-label="Close" onclick="window.location.href= '/cart/remove/{{$product->product()->first()->id}}'">
                            <button type="button" class="btn-close btn-danger" aria-label="Close" onclick="window.location.href= '/cart/remove/{{$product->product()->first()->id}}'"></button>
                        </div>
                    </div>


                    @endforeach

                    <div class="back-to-shop">
                        <a href="{{ route('products') }}"><span class="text-muted"> &leftarrow; Back to shop</span></a>
                    </div>
                </div>
                <div class="col-md-4 summary container-flex">
                    <div>
                        <h5><b>Summary</b></h5>
                        @if($totalItems != 0)
                        <hr>
                        <div class="row">
                            <div class="col text-left">ITEMS</div>
                            <div class="col text-right">{{$totalItems}}</div>

                        </div>
                        <div class="row">
                            <div class="col">TOTAL PRICE</div>
                            <div class="col text-right">CHF {{$totalPrice}}</div>
                        </div>
                        <hr>
                        @endif
                    </div>
                    <div class="row">
                        <a href="/reservation/checkout" class="btn btn-primary">CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>