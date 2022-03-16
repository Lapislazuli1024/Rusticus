<x-layout>
    </head>
    <div class="container content"></div>
    <div class="container">

    </div>
        <div class="container search">
            <h1>Rusticus</h1>
            <form method="post" action="#">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                           aria-describedby="search-addon"/>
                    <input type="submit" class="btn btn-primary" value="Search" >
                    <p>
                               <a href="{{route('products')}}">Produkte anzeigen!</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-layout>
