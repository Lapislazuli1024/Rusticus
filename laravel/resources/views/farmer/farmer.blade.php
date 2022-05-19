<x-layout>
    <div class="container p-5 my-5 container-full">
        <div class="container-full container-center-detail">
            <div class="card">
                <div class="row g-0">
                    <div class="col-lg container-flex">
                        <div class="card-header">
                            <h3> Name: {{$user->name}} {{$user->surname}}</h3>
                            @if(session()->has('error'))
                            <div class="alert alert-warning">
                                <strong>Warnung!</strong> {{session()->get('error')}}
                            </div>
                            @endif
                        </div>
                        <div class="card-body container-flex">
                            <div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        Name: {{$user->name}} {{$user->surname}}
                                    </li>
                                    <li class="list-group-item">
                                        Adresse: {{$user->farmer->address->street}} {{$user->farmer->address->house_number}}
                                    </li>
                                    <li class="list-group-item">
                                        Details: {{$user->farmer->webpage->description}}
                                    </li>                                    
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="d-grid gap-2">
                                        <a href="{{URL::previous()}}" class="btn btn-dark float-start">Zurück</a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-grid gap-2">
                                        <a href="/products/show/{{$user->id}}" class="btn btn-success float-end">Meine Produkte 🛒</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="container">
                            <img src="{{asset($user->farmer->webpage->image)}}" class="img-layout-detail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>