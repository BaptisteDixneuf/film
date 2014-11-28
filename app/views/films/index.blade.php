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

				<p> Nom du Réalisateur: {{{ isset($film->realisateur->nom ) ? $film->realisateur->nom  : 'Aucun' }}}</p>
				<p> Prénom Réalisateur: {{{ isset($film->realisateur->prenom ) ? $film->realisateur->prenom  : 'Aucun' }}}</p>
		</div>

		<div>
			<h3>Distributeur</h3>
				<p> Nom du Distributeur: {{ isset($film->distributeur->nom  ) ? $film->distributeur->nom   : 'Aucun' }}</p>
		</div>

		<div>
			<h3>Genre</h3>
				<p> Nom du Genre: {{ isset($film->genre->genre  ) ? $film->genre->genre   : 'Aucun' }}</p>
		</div>

		<div>
			<h3>Liste des acteurs:</h3>
			<p> 
				<ul>
					@foreach($film->acteurs as $acteur)
					<li>{{ $acteur->nom }} {{ $acteur->prenom }} </li>	
					@endforeach
				</ul>
			</p>
		</div>
@endforeach

<?php echo $films->links(); ?>