@extends('layouts.webshop')

@section('webshopContent')
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
	             @if(sizeof($item) > 0)
                  <a href="{{ url('/shoppingcard/deleteAll/') }}">Verwijder alles</a>
                @endif
            </ul>

            <!-- right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
            	<li><a href="{{ route('homepage') }}" class="nav-link">homepage</a></li>
            </ul>
        </div>
    </div>
</nav>

<article>
   
        <section>
            @foreach($item as $article)

                <h1>{{ $article->name }}</h1>
                <label>
                    Prijs: € 
                    <input type="number" class="price" value="{{ $article->price }}" disabled>
                </label>
                <br>
                <label id="description">Beschrijving:</label>
                <p>{{ $article->description }}</p>
                <label>
                    Aantal 
                    <input type="number" value="1" name="quantity" class='quantity'>
                </label>
                <br>
                <br>
                <a href="{{ url('/shoppingcard/delete/' . $article->id) }}">Verwijder product</a>
                <hr>
            @endforeach

            <button onclick="calculateTotal()">Bereken totaal bedrag</button>

            <label id="totalLabel">totaal  
            <input id="total" placeholder="0"  type="number" name="total" disabled>
            </label>

            <hr>

            <button id="order"> <a href="{{ url('/shoppingcard/delete/' . $article->id) }}">Bestel</a></button>

        </section>
        
</article>
@endsection
