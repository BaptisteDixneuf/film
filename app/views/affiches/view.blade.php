<p>
	@if (isset($previous) && (!empty($previous ))  )
	<a class="btn btn-warning" href="{{ URL::action("AffichesController@view", $previous ) }}">Précédent</a>
	@endif
	@if (isset($next) && (!empty($next ))  )
	<a class="btn btn-warning" href="{{ URL::action("AffichesController@view", $next ) }}">Suivant</a>
	@endif

</p>
<h1> Affiche </h1>
	<div class="card">
		<h2>
			Affiche n° : {{ $affiche->id }}
		</h2>
		<p> Nom: {{ $affiche->image }}</p>
		<p>
			{{ isset($affiche->image  ) ?  HTML::image('affiches/'.$affiche->image)   : 'Aucune Affiche' }}
		</p>
	</div>
	

<p><a class="btn btn-success" href="{{ URL::action("AffichesController@edit", $affiche->id) }}"> Editer l'affiche </a></p>
<p><a class="btn btn-danger" href="{{ URL::action("AffichesController@delete", $affiche->id) }}"> Supprimer l'affiche </a></p>