<p><a href="{{ URL::action("GenresController@index")}}"> Revenir en arrière </a></p>

<h1> Genre </h1>
	<div class="card">
		<h2>
			<a href="{{ URL::action("GenresController@view", $genre->id )}}"> 
			{{ $genre->genre }}
			</a>
		</h2>
		
		<p> Liste des films:
				<ul>
					@foreach($genre->films as $film)
					<li>
						<a href="{{ URL::action("FilmsController@view", $film->id )}}">
						{{ $film->titre }}
						</a>
					</li>	
					@endforeach
				</ul>
		</p>
	</div>
	

<p><a href="{{ URL::action("GenresController@edit", $genre->id) }}"> Editer le genre </a></p>
<p><a href="{{ URL::action("GenresController@delete", $genre->id) }}"> Supprimer le genre </a></p>