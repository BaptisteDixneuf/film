<p>
	@if (isset($previous) && (!empty($previous ))  )
	<a class="btn btn-warning" href="{{ URL::action("NationalitesController@view", $previous ) }}">Précédent</a>
	@endif
	@if (isset($next) && (!empty($next ))  )
	<a class="btn btn-warning" href="{{ URL::action("NationalitesController@view", $next ) }}">Suivant</a>
	@endif

</p>
<h1> Nationalité </h1>
	<div class="card">
		<h2>	 
			{{ $nationalite->nationalite }}			
		</h2>
		
		<p> Liste des films:
				<ul>
					@foreach($nationalite->films as $film)
					<li>
						<a href="{{ URL::action("FilmsController@view", $film->id )}}">
						{{ $film->titre }}
						</a>
					</li>	
					@endforeach
				</ul>
		</p>
	</div>
	

<p><a class="btn btn-success" href="{{ URL::action("NationalitesController@edit", $nationalite->id) }}"> Editer la nationalite </a></p>
<p><a class="btn btn-danger" href="{{ URL::action("NationalitesController@delete", $nationalite->id) }}"> Supprimer la nationalite </a></p>