<x-layout>
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    Suchfilter
                </div>
                <div class="card-body">
                    <div id='main_categories'>
                        @foreach($main_categories as $main_category)
                            <label for="{{$main_category->description}}">{{$main_category->description}}</label>
                            <input type="checkbox" id="{{$main_category->description}}" onClick=filter()><br>
                        @endforeach
                    </div>

                    <div id="sub_categories">
                        @foreach($sub_categories as $sub_category)
                            <label for="{{$sub_category->description}}">{{$sub_category->description}}</label>
                            <input type="checkbox" name="{{$sub_category->description}}"
                                   id="{{$sub_category->description}}" onClick=filter()><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h3>Resultate zu '{{$search}}'</h3>
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
        </div>
    </div>
    <script src="{{asset('js/search.js')}}"></script>
</x-layout>
