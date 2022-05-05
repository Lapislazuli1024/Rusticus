<x-layout>
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    Suchfilter
                </div>
                <div class="card-body">
                    <div id='main_categories'>
                        <form onsubmit="filter(this.value)" id="categories" method="POST">
                            @csrf
                            <ul class="list-group">
                                @foreach($main_categories as $main_category)
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-secondary mainfilter" data-bs-target="#main{{$main_category->id}}" data-bs-toggle="collapse">
                                        <label for="{{$main_category->id}}">{{$main_category->description}}</label>
                                        <input type="checkbox" name="main{{$main_category->id}}" value="{{$main_category->description}}" onclick='sum(), all(this.name)'>
                                    </button>
                                    <div id="main{{$main_category->id}}" class="collapse">
                                        <ul class="list-group">
                                            @foreach($main_category->sub_category as $sub_category)
                                            <li class="list-group-item subfilter">
                                                <label for="sub{{$sub_category->id}}">{{$sub_category->description}}</label>
                                                <input type="checkbox" name="sub{{$sub_category->id}}" value="{{$main_category->description}}" onclick=sum()>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <input type="submit" id='submit' value="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
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