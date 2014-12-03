<h1> Résultats de recherche </h1>

@foreach($data as $d)

	<li><a href="{{ URL::action($base_chemin,  $d->id)  }}">{{$d->value}}</a></li>
	
@endforeach