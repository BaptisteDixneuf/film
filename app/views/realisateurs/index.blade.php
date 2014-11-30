<h1> Tous les Réalisateurs </h1>
<p><a href="{{ URL::action("RealisateursController@create") }}"> Ajouter un réalisateur </a></p>

@foreach($realisateurs as $realisateur)
	
	<h2>
		<a href="{{ URL::action("RealisateursController@view", $realisateur->id )}}"> 
		Réalisateur n° : {{ $realisateur->id }}
		</a>
	</h2>
	<p> Prénom et Nom: {{ $realisateur->pre_nom_rea }}</p>


	<p> Liste des films:
			<ul>
				@foreach($realisateur->films as $film)
				<li>{{ $film->titre }}</li>	
				@endforeach
			</ul>
	</p>
@endforeach

<?php echo $realisateurs->links(); ?>