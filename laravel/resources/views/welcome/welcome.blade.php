<x-layout>
    <div class="container content"></div>
    <div class="container">

    </div>
    <div class="container search">

        <form method="post" action="{{route('search.results')}}" >
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1 class="text-center">Rusticus</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                            <input type="search" autocomplete="off" class="form-control rounded" name="searchinput" id="searchinput" onkeyup="livesearch()" placeholder="Search" list="livesearch" aria-label="Search" aria-describedby="search-addon" />
                            <datalist id="livesearch">
                                <option id="hallo"> Hallo</option>
                            </datalist>
                            <input type="submit" class="btn btn-primary" value="Search">
                        </div>
                    </div>
                </div>
                @csrf
            </div>
        </form>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{asset('js/search.js')}}"></script>

</x-layout>