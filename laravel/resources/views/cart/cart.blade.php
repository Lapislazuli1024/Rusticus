<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Produkte</h3>
            </div>
            <div class="card-body">
                Hello
                @if(isset($productId))
                    {{$productId}}
                @endif
            </div>
        </div>
    </div>
</x-layout>
