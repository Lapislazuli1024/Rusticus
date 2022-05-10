<x-layout>

    <div class="container-full welcome-blade-style">

        <form method="post" action="{{ route('search.main.results' )}}">
            @csrf
            <div class="container-mid">
                <div class="row">
                    <div class="col">
                        <h1 class="text-center">Rusticus</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group  input-group-lg">
                            <input type="search" autocomplete="off" class="form-control rounded" name="searchinput" id="searchinput" onkeyup="livesearch()" placeholder="Search" list="livesearch" autofocus />
                            <datalist id="livesearch">
                            </datalist>
                            <input type="submit" class="btn btn-primary" value="Search">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="text-center welcome-side">Suchen Sie nach Bauern, Produkten oder Ortschaften.</h3>
                    </div>
                </div>
            </div>
        </form>
        <div class="toast-style">
            @if (session('acc_created'))
            <div class="toast show bg-white">
                <div class="d-flex">
                    <div class="toast-body">
                        <span>{{ session()->get('acc_created') }}</span>
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            @endif
        </div>

    </div>


    <script src="{{asset('js/search.js')}}"></script>

</x-layout>