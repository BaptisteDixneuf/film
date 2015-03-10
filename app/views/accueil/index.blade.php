<h1> APPLICATION FILM </h1>
	<h2>Menu</h2>
	<ul>
		<li><a href="{{ URL::action("RecherchesController@index") }}">Rechercher</a></li>
		<li><a href="{{ URL::action("FilmsController@create") }}">Ajouter un film</a></li>
	</ul>
	<h3 style="text-align:center;">Vous avez {{$count}} films .</h3>
	
	@foreach($films as $film)			
		<a href="{{ URL::action("FilmsController@view", $film->id )}}"> 
			{{ isset($film->affiche->image  ) ?  HTML::image('affiches/'.$film->affiche->image, 'affiche de film',  array('style' => 'max-width:200px;'))  : 'Aucune Affiche' }}
		</a>		
	@endforeach
