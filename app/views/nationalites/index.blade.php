<h1> Tous les Nationalités </h1>
<p><a class="btn btn-primary" href="{{ URL::action("NationalitesController@create") }}"> Ajouter une nationalite </a></p>
<?php echo $nationalites->links(); ?>
@foreach($nationalites as $nationalite)
	<div class="card">
		<h2>
			<a href="{{ URL::action("NationalitesController@view", $nationalite->id )}}"> 
			{{ $nationalite->nationalite }}
			</a>
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

	
@endforeach

<?php echo $nationalites->links(); ?>