<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3> Bauer:</h3>
            </div>
            <div class="card-body">
                <div clas="container">
                    <div class="row">
                        <div class="col-sm">
                        <ul class="list-group">
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
                            @endif
                        </ul>
                            <div url="card-text list-group-item" id="profiledetails">
                                Details: {{$user->farmer->webpage->description}}
                            </div>
                        </div>
                        <div class="vr" id="profiledivider"></div>
                        <div class="col  float-end">
                            <img class="img-thumbnail"src="{{asset('pictures/User.png')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
