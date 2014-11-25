<h1> Tous les films </h1>
<p><a href="{{ URL::action("FilmsController@create") }}"> Ajouter un film </a></p>

@foreach($films as $film)
	
	<h2>
		<a href="{{ URL::action("FilmsController@view", $film->id )}}"> 
		Film n° : {{ $film->id }}
		</a>
	</h2>
	<p> Nom: {{ $film->titre }}</p>
	<p> Synopsys: {{ $film->synopsys }}</p>
	<p> Avis: {{ $film->avis }}</p>
	<p> Annee de production: {{ $film->annee_prod }}</p>
	<p> Titre Français: {{ $film->titre_francais }}</p>
	<p> Prix: {{ $film->prix }}</p>
	<div>
			<h3>Réalisateur</h3>
		<p> Nom du Réalisateur:{{ $film->realisateur->nom }}</p>
		<p> Prénom Réalisateur:{{ $film->realisateur->prenom  }}</p>
	</div>
	<div>
			<h3>Distributeur</h3>
		<p> Nom du Distributeur:{{ $film->distributeur->nom }}</p>
	
	</div>
	<div>
			<h3>Acteurs</h3>
		<p> Liste des acteurs:
			<ul>
				@foreach($film->acteurs as $acteur)
				<li>{{ $acteur->nom }} {{ $acteur->prenom }} </li>	
				@endforeach
			</ul>
	</p>

	</div>
@endforeach

<?php echo $films->links(); ?>