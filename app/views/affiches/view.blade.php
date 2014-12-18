<p><a href="{{ URL::action("AffichesController@index")}}"> Revenir en arrière </a></p>

<h1> Affiche </h1>
	<h2>
		<a href="{{ URL::action("AffichesController@view", $affiche->id )}}"> 
		Affiche n° : {{ $affiche->id }}
		</a>
	</h2>
	<p> Nom: {{ $affiche->image }}</p>
	<p>
			{{ isset($affiche->image  ) ?  HTML::image('affiches/'.$affiche->image)   : 'Aucune Affiche' }}
	</p>
	

<p><a href="{{ URL::action("AffichesController@edit", $affiche->id) }}"> Editer l'affiche </a></p>
<p><a href="{{ URL::action("AffichesController@delete", $affiche->id) }}"> Supprimer l'affiche </a></p>