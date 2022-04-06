<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Reservationen</h3>
            </div>
            <div class="card-body">
                @if($reservationProducts != null)
                @foreach($reservationProducts as $product)
                <div class="card">
                    <div class="card-header">
                        <h5>{{$product->product()->first()->name}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="list-group-item">
                                        Menge: {{$product->amount}}
                                    </div>
                                    <div class="list-group-item">
                                        Preis pro kg: {{$product->product()->first()->price}}
                                    </div>
                                </div>
                                <div class="col-1 vr"></div>
                                <div class="col">
                                    <img width="15%" class="img-thumbnail" src="{{asset($product->product()->first()->image)}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</x-layout>