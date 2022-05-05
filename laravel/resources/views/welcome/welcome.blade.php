<x-layout>


    <div class="container-full search">

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
                            <input type="search" autocomplete="off" class="form-control rounded" name="searchinput" id="searchinput" onkeyup="livesearch()" placeholder="Search" list="livesearch" aria-label="Search" aria-describedby="search-addon" autofocus />
                            <datalist id="livesearch">
                                <option id="hallo"> Hallo</option>
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
    </div>
    <script src="{{asset('js/search.js')}}"></script>

</x-layout>