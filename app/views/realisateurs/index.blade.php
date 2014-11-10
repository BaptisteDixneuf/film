<h1> Tous les Réalisateurs </h1>
<p><a href="{{ URL::action("RealisateursController@create") }}"> Ajouter un acteur </a></p>

@foreach($realisateurs as $realisateur)
	<h2>
		<a href="{{ URL::action("RealisateursController@view", $realisateur->id )}}"> 
		Réalisateur n° : {{ $realisateur->id }}
		</a>
	</h2>
	<p> Nom: {{ $realisateur->nom }}</p>
	<p> Prenom: {{ $realisateur->prenom }}</p>
	<p> Biographie: {{ $realisateur->biographie }}</p>
@endforeach