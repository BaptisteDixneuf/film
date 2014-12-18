<p><a href="{{ URL::action("ActeursController@index")}}"> Revenir en arrière </a></p>

<h1> Acteur </h1>
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

<p><a href="{{ URL::action("ActeursController@edit", $acteur->id) }}"> Editer l'acteur </a></p>
<p><a href="{{ URL::action("ActeursController@delete", $acteur->id) }}"> Supprimer l'acteur </a></p>