<h1 style="text-align:center;"> APPLICATION FILM </h1>
	<h2 style="text-align:center;">Menu</h2>
	<div style="text-align:center;" >
		<a class="btn btn-primary" href="{{ URL::action("RecherchesController@index") }}">Rechercher</a>
		<a class="btn btn-primary" href="{{ URL::action("FilmsController@create") }}">Ajouter un film</a>
	</div>
		
	
	<h3 style="text-align:center;">Vous avez {{$count}} films.</h3>
	
	@foreach($films as $film)			
		<a href="{{ URL::action("FilmsController@view", $film->id )}}"> 
			{{ isset($film->affiche->image  ) ?  HTML::image('affiches/'.$film->affiche->image, 'affiche de film',  array('style' => 'max-width:200px;'))  : 'Aucune Affiche' }}
		</a>		
	@endforeach
