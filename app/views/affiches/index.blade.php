<h1> Toutes les Affiches </h1>
<p><a class="btn btn-primary" href="{{ URL::action("AffichesController@create") }}"> Ajouter une affiche </a></p>

<?php echo $affiches->links(); ?>

@foreach($affiches as $affiche)
	<div class="card">
		<h2>
			<a href="{{ URL::action("AffichesController@view", $affiche->id )}}"> 
			Affiche n° : {{ $affiche->id }}
			</a>
		</h2>
		<p> Nom: {{ $affiche->image }}</p>
		<p>
				{{ isset($affiche->image  ) ?  HTML::image('affiches/'.$affiche->image)   : 'Aucune Affiche' }}
		</p>
	</div>

	
@endforeach

<?php echo $affiches->links(); ?>