<p><a href="{{ URL::action("RealisateursController@index")}}"> Revenir en arrière </a></p>

<h1> Réalisateur </h1>
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

<p><a href="{{ URL::action("RealisateursController@edit", $realisateur->id) }}"> Editer le réalisateur </a></p>
<p><a href="{{ URL::action("RealisateursController@delete", $realisateur->id) }}"> Supprimer le réalisateur </a></p>