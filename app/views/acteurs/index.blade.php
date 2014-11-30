<h1> Tous les acteurs </h1>
<p><a href="{{ URL::action("ActeursController@create") }}"> Ajouter un acteur </a></p>

@foreach($acteurs as $acteur)
	<h2>
		<a href="{{ URL::action("ActeursController@view", $acteur->id )}}"> 
		Acteur n° : {{ $acteur->id }}
		</a>
	</h2>
	<p> Prénom et Nom de l'acteur: {{ $acteur->pre_nom_acteur }}</p>	
		<p> Liste des films:
			<ul>
				@foreach($acteur->films as $film)
				<li>{{ $film->titre }}</li>	
				@endforeach
			</ul>
	</p>

@endforeach

<?php echo $acteurs->links(); ?>