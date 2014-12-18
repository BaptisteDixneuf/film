<h1> Tous les Genres </h1>
<p><a href="{{ URL::action("GenresController@create") }}"> Ajouter un genre </a></p>
<?php echo $genres->links(); ?>
@foreach($genres as $genre)
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

	
@endforeach

<?php echo $genres->links(); ?>