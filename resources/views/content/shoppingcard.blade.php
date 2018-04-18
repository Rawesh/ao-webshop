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
        <form method="POST" action="{{ route('order') }}">
            @csrf
            @foreach($item as $article)
                <h1>{{ $article->name }}</h1>
                <input type="hidden" name="article_id" value="{{ $article->id }}">

                <label>
                Prijs: € 
                <input type="number" class="price" value="{{ $article->price }}" disabled>
                </label>
                <br>

                <p><label>beschrijving</label>: {{ $article->description }}</p>
            
                <label>Aantal</label>
                <input type="number" value="1" name="amount{{$article}}" class='quantity'>
                <br>

                <a href="{{ url('/shoppingcard/delete/' . $article->id) }}">Verwijder product</a>
            @endforeach

            <input type="submit" id="order" value="Bestel">
        </form>

        <hr>
        <button onclick="calculateTotal()">Bereken totaal bedrag</button>

        <label id="totalLabel">totaal  
        <input id="total" placeholder="0"  type="number" name="total" disabled>
        </label>

    </section>
        
</article>
@endsection
