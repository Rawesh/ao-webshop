<!DOCTYPE html>
<html>
<head>
	<title>Webshop</title>
	<meta charset="utf-8">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<nav>
		@foreach($categories as $categorie)
		<ul>
		  <li><header>Categorieën :</header></li>
		  <li><a href="#">Alle</a></li>
		  <li><a href="#">{{ $categorie->name }}</a></li>
		</ul>
		@endforeach
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
				</section>
			@endforeach
			<div>{{ $articles->links() }}</div>
		</center>
	</article>
</body>
</html>