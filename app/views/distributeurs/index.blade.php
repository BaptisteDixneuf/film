<h1> Tous les Distributeurs </h1>
<p><a class="btn btn-primary" href="{{ URL::action("DistributeursController@create") }}"> Ajouter un distributeur </a></p>
<?php echo $distributeurs->links(); ?>
@foreach($distributeurs as $distributeur)
	<div class="card">
		<h2>
			<a href="{{ URL::action("DistributeursController@view", $distributeur->id )}}"> 
			{{ $distributeur->nom }}
			</a>
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
@endforeach

<?php echo $distributeurs->links(); ?>