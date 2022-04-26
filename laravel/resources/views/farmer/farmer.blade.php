<x-layout>
    <div class="card md-3">
        <div class="row g-0">

            <div class="col-md-6">
                <div class="card-header">
                    <h3> Name: {{$user->name}} {{$user->surname}}</h3>
                    @if(session()->has('error'))
                    <div class="alert alert-warning">
                        <strong>Warnung!</strong> {{session()->get('error')}}
                    </div>
                    @endif
                </div>
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
                <div class="card-body">
                    <div class="text-center">

                        <div class="btn-group me-2">
                            <a href="{{URL::previous()}}" class="btn btn-dark float-start">Zurück</a>
                        </div>
                        <div class="btn-group me-2">
                            <a href="#" class="btn btn-success float-end">Meine Produkte 🛒</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img-fluid">
                    <img class="img-fluid rounded start" src="{{asset('pictures/User.png')}}">
                </div>
            </div>
        </div>
    </div>
</x-layout>