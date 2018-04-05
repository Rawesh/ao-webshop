@extends('layouts.app')

@section('content')
<div class="column">
	<div class="col-md-8 col-md-offset-2"></div>
		<h1>Create product</h1>
		<hr>

		{{ Form::open(array('action' => array('ArticleController@createSave'))) }}
			<div class="form-group">
	  			{{ Form::label('product', 'Product:') }}
	  			{{ Form::text('name', null, array('class' => 'form-control')) }}
	  		</div>
	  		<div class="form-group">
	  			{{ Form::label('prijs', 'Prijs:') }}
	  			{!! Form::number('price', null, ['class' => 'form-control','step'=>'0.05']) !!}
	  		</div>
	  		<div class="form-group">
	  			{{ Form::label('beschrijving', 'Beschrijving:') }}
	  			{{ Form::textarea('description', '', 
	  				array('class' => 'form-control', 'step' => '0.50')) }}
	  		</div>
	  		
	  		{{ Form::submit('submit', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}	
	</div>
</div>

@endsection