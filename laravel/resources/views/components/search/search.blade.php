<x-layout>
    <div class="container p-5 my-5">

        <!-- <div class="col-3">
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
                </div> -->

        <div class="container-background">
            <div class="container-titel-flex">
                <h2>Resultate zu {{$search}}</h2>
                @can('IsFarmer')
                <div class="container-titel-flex-end">
                    <a href="/product/add" class="btn btn-success btn-lg float-end">Product Hinzufügen</a>
                </div>
                @endcan
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($result as $product)
                @if($product->stock_quantity > 0)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{asset($product->image)}}" class="img-layout">
                        <div class="card-header">
                            <h5 class="card-title">{{$product->name}}</h5>
                            @can('IsProductOwner', $product)
                            <a href="/product/edit/{{$product->id}}" class="btn btn-success float-end">Bearbeiten</a>
                            @endcan
                        </div>
                        <div class="card-body container-flex">
                            <div class="list-group list-group-flush">
                                <p> Menge: {{$product->stock_quantity}}</p>
                                <p> Preis pro {{$product->unit_of_measure->description}}: {{$product->price}}</p>
                            </div>
                            <div>
                                <div class="card text-center">
                                    <a href="/product/show/{{$product->id}}" class="btn btn-success float-end">Mehr</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <script src="{{asset('js/filters.js')}}"></script>
    </div>
</x-layout>