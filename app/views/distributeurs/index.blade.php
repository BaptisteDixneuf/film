<h1> Tous les Distributeurs </h1>
<p><a href="{{ URL::action("DistributeursController@create") }}"> Ajouter un distributeur </a></p>

@foreach($distributeurs as $distributeur)
	<h2>
		<a href="{{ URL::action("DistributeursController@view", $distributeur->id )}}"> 
		Distributeur n° : {{ $distributeur->id }}
		</a>
	</h2>
	<p> Nom: {{ $distributeur->nom }}</p>
	<p> Liste des films:
			<ul>
				@foreach($distributeur->films as $film)
				<li>{{ $film->titre }}</li>	
				@endforeach
			</ul>
	</p>
	
@endforeach

<?php echo $distributeurs->links(); ?>