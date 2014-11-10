<p><a href="{{ URL::action("FilmsController@index")}}"> Revenir en arrière </a></p>

<h1> Film </h1>
	<h2>Acteur n° : {{ $film->id }}</h2>
	<p> Nom: {{ $film->titre }}</p>
	<p> Synopsys: {{ $film->synopsys }}</p>
	<p> Avis: {{ $film->avis }}</p>
	<p> Annee de production: {{ $film->annee_prod }}</p>
	<p> Titre Français: {{ $film->titre_francais }}</p>
	<p> Prix: {{ $film->prix }}</p>
	<p> Nom du Réalisateur:{{ $film->realisateur->nom }}</p>
	<p> Prénom Réalisateur:{{ $film->realisateur->prenom  }}</p>

<p><a href="{{ URL::action("FilmsController@edit", $film->id) }}"> Editer le film </a></p>
<p><a href="{{ URL::action("FilmsController@delete", $film->id) }}"> Supprimer le film </a></p>