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
                                Name:
                            </li>
                            <li class="list-group-item">
                                Adresse:
                            </li>
                            <li class="list-group-item">
                                Betriebsart:
                            </li>
                            <li class="list-group-item">
                                Website:
                            </li>
                        </ul>
                            <div class="card-text list-group-item" id="profiledetails">
                                Details:
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


</x-layout>
