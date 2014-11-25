<p><a href="{{ URL::action("AffichesController@index")}}"> Revenir en arrière </a></p>

<h1> Affiche </h1>
	<h2>Affiche n° : {{ $affiche->id }}</h2>
	<p> Image: {{ $affiche->nom }}</p>
	

<p><a href="{{ URL::action("AffichesController@edit", $affiche->id) }}"> Editer l'affiche </a></p>
<p><a href="{{ URL::action("AffichesController@delete", $affiche->id) }}"> Supprimer l'affiche </a></p>