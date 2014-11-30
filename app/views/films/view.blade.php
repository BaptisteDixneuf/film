<p><a href="{{ URL::action("FilmsController@index")}}"> Revenir en arrière </a></p>

<h1> Film </h1>
	<h2>Acteur n° : {{ $film->id }}</h2>
	<p> Nom: {{ $film->titre }}</p>
	<p> Synopsys: {{ $film->synopsys }}</p>
	<p> Avis: {{ $film->avis }}</p>
	<p> Annee de production: {{ $film->annee_prod }}</p>
	<p> Titre Français: {{ $film->titre_francais }}</p>
	<p> Prix: {{ $film->prix }}</p>
	<div>
			<h3>Réalisateur</h3>

				<p> Prénom et Nom du Réalisateur: {{{ isset($film->realisateur->pre_nom_rea ) ? $film->realisateur->pre_nom_rea  : 'Aucun' }}}</p>
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
			<h3>Affiche</h3>
				<p> Image: {{ isset($film->affiche->image  ) ? $film->affiche->image   : 'Aucun' }}</p>
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

<p><a href="{{ URL::action("FilmsController@edit", $film->id) }}"> Editer le film </a></p>
<p><a href="{{ URL::action("FilmsController@delete", $film->id) }}"> Supprimer le film </a></p>