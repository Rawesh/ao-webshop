@extends('layouts.webshop')

@section('webshopContent')


	<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
        			   	@foreach($categories as $category)
		  				<li><a href="{{ url('/category/' . $category->id) }}" class="nav-link">{{ $category->name }}</a></li>
		  				@endforeach
                    </ul>

                     <ul class="navbar-nav ml-auto">
                	<li><a href="{{ url('/shoppingcard') }}" class="nav-link">shoppingCart</a></li>
                </ul>
                </div>
            </div>
        </nav>

	<article>
		@if(isset($inventory))
		{{ $inventory }}
		@endif
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
					<p>{{ $article->description }}</p>
					<a href="{{ url('/shoppingcard/add/' . $article->id) }}">add to cart</a>
					<hr>
				</section>
			@endforeach
			<div>{{ $articles->links() }}</div>
		</center>
	</article>
@endsection
