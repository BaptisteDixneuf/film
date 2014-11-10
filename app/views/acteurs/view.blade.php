<p><a href="{{ URL::action("ActeursController@index")}}"> Revenir en arrière </a></p>

<h1> Acteur </h1>
	<h2>Acteur n° : {{ $acteur->id }}</h2>
	<p> Nom: {{ $acteur->nom }}</p>
	<p> Prenom: {{ $acteur->prenom }}</p>
	<p> Biographie: {{ $acteur->biographie }}</p>

<p><a href="{{ URL::action("ActeursController@edit", $acteur->id) }}"> Editer l'acteur </a></p>
<p><a href="{{ URL::action("ActeursController@delete", $acteur->id) }}"> Supprimer l'acteur </a></p>