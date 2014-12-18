<h1> Tous les Réalisateurs </h1>
<p><a href="{{ URL::action("RealisateursController@create") }}"> Ajouter un réalisateur </a></p>
<?php echo $realisateurs->links(); ?>
@foreach($realisateurs as $realisateur)
	<div class="card">
		<h2>
			<a href="{{ URL::action("RealisateursController@view", $realisateur->id )}}"> 
			{{ $realisateur->pre_nom_rea }}
			</a>
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
@endforeach

<?php echo $realisateurs->links(); ?>