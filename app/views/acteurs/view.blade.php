<p><a href="{{ URL::action("ActeursController@index")}}"> Revenir en arrière </a></p>

<h1> Acteur </h1>
	<h2>Acteur n° : {{ $acteur->id }}</h2>
	<p> Nom: {{ $acteur->nom }}</p>
	<p> Prenom: {{ $acteur->prenom }}</p>
	<p> Biographie: {{ $acteur->biographie }}</p>
