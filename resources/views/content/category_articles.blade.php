@extends('layouts.webshop')

@section('webshopContent')

	<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                	<li><a href="{{ route('homepage') }}" class="nav-link">Alle artikelen</a></li>
                </ul>

                <ul class="navbar-nav ml-auto">
                	<li><a href="{{ url('/shoppingcard') }}" class="nav-link">shoppingCart</a>
                </ul>
            </div>
        </div>
    </nav>

	<article>
		<center>
			@foreach($articles as $article)
				<section>
					<h1>{{ $article->name }}</h1>

					<label>
						Prijs: € 
						<input type="number" value="{{ $article->price }}" disabled>
					</label>
					<br>
					<label id="description">Beschrijving:</label>
					<p id="p_description">{{ $article->description }}</p>
					<a href="#" id="card"><i class="fas fa-cart-plus"></i></a>
					<hr>
				</section>
			@endforeach
			<div>{{ $articles->links() }}</div>
		</center>
	</article>
@endsection
