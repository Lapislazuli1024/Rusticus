<x-layout>
    <div class="container-full">
        <div class="card md-3">
            <div class="row g-0">

                <div class="col-md-6 container-flex">
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
                                @if($user->farmer->webpage->webpage_url != null)
                                <li class="list-group-item">
                                    Website: <a href="https://{{$user->farmer->webpage->webpage_url}}">{{$user->name}}s Webpage</a>
                                </li>
                                <li class="list-group-item">
                                    Details: {{$user->farmer->webpage->description}}
                                </li>
                                @endif
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
                <div class="col-md-6">
                    <div class="">
                        <img src="{{asset('pictures/User.png')}}" class="img-layout-detail">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>