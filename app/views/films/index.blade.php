<h1> Tous les films </h1>
<p><a href="{{ URL::action("FilmsController@create") }}"> Ajouter un film </a></p>

<?php echo $films->links(); ?>

@foreach($films as $film)
	<div class="card">
		<h2>
			<a href="{{ URL::action("FilmsController@view", $film->id )}}"> 
			{{ $film->titre }}
			</a>
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
			{{ $film->prix }}
		</p>
		<p>  
			<strong> Réalisateur: </strong> 
			{{{ isset($film->realisateur->pre_nom_rea ) ? $film->realisateur->pre_nom_rea  : 'Aucun' }}}
		</p>
		<p> 
			<strong> Distributeur: </strong> 
			{{ isset($film->distributeur->nom  ) ? $film->distributeur->nom   : 'Aucun' }}
		</p>
		<p> 
			<strong> Nom du Genre: </strong>  
			{{ isset($film->genre->genre  ) ? $film->genre->genre   : 'Aucun' }}
		</p>
		<p>
			<strong> Liste des acteurs:</strong> 
			<p> 
				<ul>
					@foreach($film->acteurs as $acteur)
					<li>{{ $acteur->pre_nom_acteur }}</li>	
					@endforeach
				</ul>
			</p>
		</p>
			
	</div>
@endforeach

<?php echo $films->links(); ?>