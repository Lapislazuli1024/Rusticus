<x-layout>
    @foreach($farmers as $farmer)
        <ul class="list-group">
            <li class="list-group-item">
                <div class="card">
                    <div class="card-header">
                        {{$farmer->user->name}}     {{$farmer->user->surname}}
                    </div>
                    <div class="card-body">
                        <div class="container">{{$farmer->webpage->description}}</div>
                        <a href="/farmer/{{$farmer->user_id}}" class="btn btn-dark float-end">Mehr</a>
                    </div>
                </div>
            </li>
        </ul>

    @endforeach
</x-layout>
