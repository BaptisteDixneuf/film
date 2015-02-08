<p>
	@if (isset($previous) && (!empty($previous ))  )
	<a class="btn btn-warning" href="{{ URL::action("GenresController@view", $previous ) }}">Précédent</a>
	@endif
	@if (isset($next) && (!empty($next ))  )
	<a class="btn btn-warning" href="{{ URL::action("GenresController@view", $next ) }}">Suivant</a>
	@endif

</p>
<h1> Genre </h1>
	<div class="card">
		<h2>			
			{{ $genre->genre }}
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
	

<p><a class="btn btn-success" href="{{ URL::action("GenresController@edit", $genre->id) }}"> Editer le genre </a></p>
<p><a class="btn btn-danger" href="{{ URL::action("GenresController@delete", $genre->id) }}"> Supprimer le genre </a></p>