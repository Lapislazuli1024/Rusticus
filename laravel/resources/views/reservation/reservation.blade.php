<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Reservationen</h3>
            </div>
            @if($reservationProducts != null)
            <div class="card-body">
                @foreach($reservationProducts as $reservation)
                <p>Bestelldatum: {{$reservation->updated_at}}</p>
                <h3>Produkte</h3>
                @foreach($reservation->reservation_has_product()->get() as $product)
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
                @endforeach
            </div>
            @endif
        </div>
    </div>
</x-layout>