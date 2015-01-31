<p><a href="{{ URL::action("NationalitesController@index")}}"> Revenir en arrière </a></p>

<h1> Nationalité </h1>
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
	

<p><a href="{{ URL::action("NationalitesController@edit", $nationalite->id) }}"> Editer la nationalite </a></p>
<p><a href="{{ URL::action("NationalitesController@delete", $nationalite->id) }}"> Supprimer la nationalite </a></p>