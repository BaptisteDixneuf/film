<h1> Tous les Genres </h1>
<p><a href="{{ URL::action("GenresController@create") }}"> Ajouter un genre </a></p>

@foreach($genres as $genre)
	<h2>
		<a href="{{ URL::action("GenresController@view", $genre->id )}}"> 
		Genre n° : {{ $genre->id }}
		</a>
	</h2>
	<p> Genre: {{ $genre->genre }}</p>
	<p> Liste des films:
			<ul>
				@foreach($genre->films as $film)
				<li>{{ $film->titre }}</li>	
				@endforeach
			</ul>
	</p>

	
@endforeach

<?php echo $genres->links(); ?>