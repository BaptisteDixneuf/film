<h1> Tous les acteurs </h1>
<p><a href="{{ URL::action("ActeursController@create") }}"> Ajouter un acteur </a></p>

@foreach($acteurs as $acteur)
	<h2>
		<a href="{{ URL::action("ActeursController@view", $acteur->id )}}"> 
		Acteur n° : {{ $acteur->id }}
		</a>
	</h2>
	<p> Nom: {{ $acteur->nom }}</p>
	<p> Prenom: {{ $acteur->prenom }}</p>
	<p> Biographie: {{ $acteur->biographie }}</p>
		<p> Liste des films:
			<ul>
				@foreach($acteur->films as $film)
				<li>{{ $film->titre }}</li>	
				@endforeach
			</ul>
	</p>

@endforeach

<?php echo $acteurs->links(); ?>