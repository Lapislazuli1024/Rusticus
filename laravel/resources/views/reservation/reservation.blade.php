<x-layout>
    <div class="container-background">
        <div class="row">
            <div class="col">
                <h2>Bestellungs übersicht</h2>
            </div>
        </div>
        @foreach($reservationProducts as $reservation)
        <div class="card">
            <div class="card-body">
                <h4>Bestellung</h4>
                <p>Bestelldatum: {{$reservation->updated_at}}</p>
                @foreach($reservation->reservation_has_product()->get() as $product)

                <div class="row border-top border-bottom">
                    <div class="row items-border align-items-center">
                        <div class="col-3"><img class="img-fluid warenkorb-img" src="{{asset($product->product()->first()->image)}}"></div>
                        <div class="col-3">
                            {{$product->product()->first()->name}}
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-light">Kauf Menge: {{$product->amount}} </button>
                        </div>
                        <div class="col-2">&yen; {{$product->product()->first()->price}}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
        <hr>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="button" class="btn btn-dark btn-lg">BACK TO SHOP</button>
        </div>
    </div>
</x-layout>