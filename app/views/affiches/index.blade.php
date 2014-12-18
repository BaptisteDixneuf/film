<h1> Tous les Affiches </h1>
<p><a href="{{ URL::action("AffichesController@create") }}"> Ajouter une affiche </a></p>

<?php echo $affiches->links(); ?>

@foreach($affiches as $affiche)
	<h2>
		<a href="{{ URL::action("AffichesController@view", $affiche->id )}}"> 
		Affiche n° : {{ $affiche->id }}
		</a>
	</h2>
	<p> Nom: {{ $affiche->image }}</p>
	<p>
			{{ isset($affiche->image  ) ?  HTML::image('affiches/'.$affiche->image)   : 'Aucune Affiche' }}
	</p>

	
@endforeach

<?php echo $affiches->links(); ?>