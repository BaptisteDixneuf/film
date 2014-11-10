<p><a href="{{ URL::action("RealisateursController@index")}}"> Revenir en arrière </a></p>

<h1> Réalisateur </h1>
	<h2>Réalisateur n° : {{ $realisateur->id }}</h2>
	<p> Nom: {{ $realisateur->nom }}</p>
	<p> Prenom: {{ $realisateur->prenom }}</p>
	<p> Biographie: {{ $realisateur->biographie }}</p>

<p><a href="{{ URL::action("RealisateursController@edit", $realisateur->id) }}"> Editer le réalisateur </a></p>
<p><a href="{{ URL::action("RealisateursController@delete", $realisateur->id) }}"> Supprimer le réalisateur </a></p>