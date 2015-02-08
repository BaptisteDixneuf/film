<p>
	@if (isset($previous) && (!empty($previous ))  )
	<a class="btn btn-warning" href="{{ URL::action("FilmsController@view", $previous ) }}">Précédent</a>
	@endif
	@if (isset($next) && (!empty($next ))  )
	<a class="btn btn-warning" href="{{ URL::action("FilmsController@view", $next ) }}">Suivant</a>
	@endif

</p>
<div class="card">
	<h2>		
		{{ $film->titre }}		
	</h2>
	<p>
		{{ isset($film->affiche->image  ) ?  HTML::image('affiches/'.$film->affiche->image)   : 'Aucune Affiche' }}
	</p>

	<p>
		<strong>Synopsys:</strong>
		{{ $film->synopsys }}
	</p>
	<p>
		<strong> Avis: </strong>
		{{ $film->avis }}
	</p>
	<p>
		<strong> Annee de production: </strong>
		{{ $film->annee_prod }}
	</p>
	<p>
		<strong> Titre Français: </strong>
		{{ $film->titre_francais }}
	</p>
	<p>
		<strong> Prix: </strong>			
		@if (isset($film->prix ) && (!empty($film->prix))  )
		{{$film->prix}}
		@else
		Aucun Prix
		@endif
	</p>
	<p>  
		<strong> Réalisateur: </strong>
		@if (isset($film->realisateur->pre_nom_rea ) && (!empty($film->realisateur->pre_nom_rea))  )
		<a href="{{ URL::action("RealisateursController@view", $film->realisateur->id )}}"> 
			{{$film->realisateur->pre_nom_rea}}
		</a>
		@else
		Aucun Réalisateur
		@endif

	</p>
	<p> 
		<strong> Distributeur: </strong>			
		@if (isset($film->distributeur->nom ) && (!empty($film->distributeur->nom))  )
		<a href="{{ URL::action("DistributeursController@view", $film->distributeur->id )}}"> 
			{{$film->distributeur->nom}}
		</a>
		@else
		Aucun Distributeur
		@endif
	</p>
	<p> 
		<strong> Nom du Genre: </strong>  

		@if (isset($film->genre->genre  ) && (!empty($film->genre->genre ))  )
		<a href="{{ URL::action("GenresController@view", $film->genre->id )}}"> 
			{{$film->genre->genre }}
		</a>
		@else
		Aucun Genre
		@endif
	</p>
	<p> 
		<strong> Nationalite: </strong>  

		@if (isset($film->nationalite->nationalite  ) && (!empty($film->nationalite->nationalite ))  )
		<a href="{{ URL::action("NationalitesController@view", $film->nationalite->id )}}"> 
			{{$film->nationalite->nationalite }}
		</a>
		@else
		Aucun Genre
		@endif
	</p>
	<p>
		<strong> Liste des acteurs:</strong> 
		<p> 
			<ul>
				@foreach($film->acteurs as $acteur)
				<li>
					<a href="{{ URL::action("ActeursController@view", $acteur->id )}}">
						{{ $acteur->pre_nom_acteur }}
					</a>
				</li>	
				@endforeach
			</ul>
		</p>
	</p>

</div>
<p><a class="btn btn-success" href="{{ URL::action("FilmsController@edit", $film->id) }}"> Editer le film </a></p>