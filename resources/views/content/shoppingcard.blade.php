@extends('layouts.webshop')

@section('webshopContent')
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
		
            </ul>

            <!-- right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
            	<li><a href="{{ route('homepage') }}" class="nav-link">homepage</a></li>
            </ul>
        </div>
    </div>
</nav>

<article>

    @foreach($item as $article)
        <section>
            <h1>{{ $article->name }}</h1>
            <label>
                Prijs: € 
                <input type="number" value="{{ $article->price }}" disabled>
            </label>
            <br>
            <label id="description">Beschrijving:</label>
            <p>{{ $article->description }}</p>
            <a href="{{ url('/shoppingcard/delete/' . $article->id) }}">verwijder</a>
            <hr>
        </section>
    @endforeach

</article>
@endsection
