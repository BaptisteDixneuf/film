<p>
	@if (isset($previous) && (!empty($previous ))  )
	<a class="btn btn-warning" href="{{ URL::action("DistributeursController@view", $previous ) }}">Précédent</a>
	@endif
	@if (isset($next) && (!empty($next ))  )
	<a class="btn btn-warning" href="{{ URL::action("DistributeursController@view", $next ) }}">Suivant</a>
	@endif

</p>
<div class="card">
		<h2>			
			{{ $distributeur->nom }}
		</h2>
		
		<p> Liste des films:
				<ul>
					@foreach($distributeur->films as $film)
					<li>
						<a href="{{ URL::action("FilmsController@view", $film->id )}}">
						{{ $film->titre }}
						</a>
					</li>	
					@endforeach
				</ul>
		</p>
	</div>	

<p><a class="btn btn-success" href="{{ URL::action("DistributeursController@edit", $distributeur->id) }}"> Editer le distributeur </a></p>
<p><a class="btn btn-danger" href="{{ URL::action("DistributeursController@delete", $distributeur->id) }}"> Supprimer le distributeur </a></p>