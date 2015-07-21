<p>
	@if (isset($previous) && (!empty($previous ))  )
	<a class="btn btn-warning" href="{{ URL::action("ActeursController@view", $previous ) }}">Précédent</a>
	@endif
	@if (isset($next) && (!empty($next ))  )
	<a class="btn btn-warning" href="{{ URL::action("ActeursController@view", $next ) }}">Suivant</a>
	@endif

</p>
<h1> Acteur </h1>
	<div class="card">
		<h2>		
			{{ $acteur->pre_nom_acteur }}			
		</h2>
		
			<p> Liste des films:
				<ul>
					@foreach($acteur->films as $film)
					<li>
						<a href="{{ URL::action("FilmsController@view", $film->id )}}">
						{{ $film->titre }}
						</a>
					</li>		
					@endforeach
				</ul>
		</p>
	</div>

<p><a class="btn btn-success" href="{{ URL::action("ActeursController@edit", $acteur->id) }}"> Editer l'acteur </a></p>
<p><a class="btn btn-danger" href="{{ URL::action("ActeursController@delete", $acteur->id) }}"> Supprimer l'acteur </a></p>