<x-layout>
    <div class="row">


        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h3>Resultate zu '{{$search}}'</h3>
                </div>
                <div class="card-body" id="class">
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
        </div>
    </div>
    <script src="{{asset('js/filters.js')}}"></script>
</x-layout>
