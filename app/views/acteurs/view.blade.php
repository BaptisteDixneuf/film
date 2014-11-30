<p><a href="{{ URL::action("ActeursController@index")}}"> Revenir en arrière </a></p>

<h1> Acteur </h1>
	<h2>Acteur n° : {{ $acteur->id }}</h2>
	<p> Prénom et Nom de l'acteur: {{ $acteur->pre_nom_acteur }}</p>	
	<p> Liste des films:
			<ul>
				@foreach($acteur->films as $film)
				<li>{{ $film->titre }}</li>	
				@endforeach
			</ul>
	</p>

<p><a href="{{ URL::action("ActeursController@edit", $acteur->id) }}"> Editer l'acteur </a></p>
<p><a href="{{ URL::action("ActeursController@delete", $acteur->id) }}"> Supprimer l'acteur </a></p>