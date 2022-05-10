<x-layout>
    <div class="container-background">
        <h2 class="text-center">Bauern</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($farmers as $farmer)
            <div class="">
                <div class="card h-100">
                    <img src="{{asset($farmer->webpage->image)}}" class="img-layout">
                    <div class="card-header">
                        <h5 class="card-title">{{$farmer->user->name}} {{$farmer->user->surname}}</h5>
                    </div>
                    <div class="card-body container-flex">
                        <div class="list-group list-group-flush">
                            {{$farmer->webpage->description}}
                        </div>
                        <div>
                            <div class="card text-center">
                                <a href="/farmer/{{$farmer->user_id}}" class="btn btn-dark">Mehr</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>