<x-layout>
    @foreach($farmers as $farmer)
        <ul class="list-group">
            <li class="list-group-item">
                <div class="card">
                    <div class="card-header">
                        {{$farmer['name']}}     {{$farmer['name']}}
                    </div>
                    <div class="card-body">
                        <div class="container">{{$farmer['name']}}</div>
                        <a href="/bauer/{{$farmer['name']}}" class="btn btn-dark float-end">Mehr</a>
                    </div>
                </div>
            </li>
        </ul>

    @endforeach
</x-layout>
