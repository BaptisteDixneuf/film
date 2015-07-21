<p>
	@if (isset($previous) && (!empty($previous ))  )
	<a class="btn btn-warning" href="{{ URL::action("RealisateursController@view", $previous ) }}">Précédent</a>
	@endif
	@if (isset($next) && (!empty($next ))  )
	<a class="btn btn-warning" href="{{ URL::action("RealisateursController@view", $next ) }}">Suivant</a>
	@endif

</p>
<div class="card">
	<h2>			
		{{ $realisateur->pre_nom_rea }}
	</h2>
	<p> Liste des films:
		<ul>
			@foreach($realisateur->films as $film)
			<li>
				<a href="{{ URL::action("FilmsController@view", $film->id )}}">
					{{ $film->titre }}
				</a>
			</li>
			@endforeach
		</ul>
	</p>
</div>

<p><a class="btn btn-success" href="{{ URL::action("RealisateursController@edit", $realisateur->id) }}"> Editer le réalisateur </a></p>
<p><a class="btn btn-danger" href="{{ URL::action("RealisateursController@delete", $realisateur->id) }}"> Supprimer le réalisateur </a></p>