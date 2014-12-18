<p><a href="{{ URL::action("DistributeursController@index")}}"> Revenir en arrière </a></p>

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

<p><a href="{{ URL::action("DistributeursController@edit", $distributeur->id) }}"> Editer le distributeur </a></p>
<p><a href="{{ URL::action("DistributeursController@delete", $distributeur->id) }}"> Supprimer le distributeur </a></p>