<p><a href="{{ URL::action("GenresController@index")}}"> Revenir en arrière </a></p>

<h1> Genre </h1>
	<h2>Genre n° : {{ $genre->id }}</h2>
	<p> Nom du Genre: {{ $genre->genre }}</p>
	<p> Liste des films:
			<ul>
				@foreach($genre->films as $film)
				<li>{{ $film->titre }}</li>	
				@endforeach
			</ul>
	</p>
	

<p><a href="{{ URL::action("GenresController@edit", $genre->id) }}"> Editer le genre </a></p>
<p><a href="{{ URL::action("GenresController@delete", $genre->id) }}"> Supprimer le genre </a></p>