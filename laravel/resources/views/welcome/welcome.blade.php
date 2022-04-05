<x-layout >
    <div class="container content"></div>
    <div class="container">

    </div>
        <div class="container search">
            <h1 class="title">Rusticus</h1>
            <form method="post" action="{{route('search.results')}}">
                @csrf
                <div class="input-group">
                    <input type="search" autocomplete="off" class="form-control rounded" name="searchinput" id="searchinput" onkeyup="livesearch()" placeholder="Search" list="livesearch" aria-label="Search"
                           aria-describedby="search-addon"/>
                    <datalist id="livesearch">
                        <option id="hallo"> Hallo</option>
                    </datalist>
                    <input type="submit" class="btn btn-primary" value="Search" >
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{asset('js/search.js')}}"></script>

</x-layout>
