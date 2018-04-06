<!DOCTYPE html>
<html>
<head>
	<title>Webshop</title>
	<meta charset="utf-8">
	<!-- css -->
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- font-awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
</head>
<body>
	<nav>
		<ul>
			<li><header>{{ $category }}</header></li>
			<li><a href="{{ route('homepage') }}" id="back"><i class="fas fa-arrow-left"></i></a></li>
		</ul>
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
</body>
</html>