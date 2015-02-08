<h1> Tous les acteurs </h1>
<p><a class="btn btn-primary" href="{{ URL::action("ActeursController@create") }}"> Ajouter un acteur </a></p>

<?php echo $acteurs->links(); ?>
@foreach($acteurs as $acteur)
	<div class="card">
		<h2>
			<a href="{{ URL::action("ActeursController@view", $acteur->id )}}"> 
			{{ $acteur->pre_nom_acteur }}
			</a>
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

@endforeach

<?php echo $acteurs->links(); ?>