<p><a href="{{ URL::action("DistributeursController@index")}}"> Revenir en arrière </a></p>

<h1> Distributeur </h1>
	<h2>Distributeur n° : {{ $distributeur->id }}</h2>
	<p> Nom: {{ $distributeur->nom }}</p>
	<p> Liste des films:
			<ul>
				@foreach($distributeur->films as $film)
				<li>{{ $film->titre }}</li>	
				@endforeach
			</ul>
	</p>
	

<p><a href="{{ URL::action("DistributeursController@edit", $distributeur->id) }}"> Editer le distributeur </a></p>
<p><a href="{{ URL::action("DistributeursController@delete", $distributeur->id) }}"> Supprimer le distributeur </a></p>