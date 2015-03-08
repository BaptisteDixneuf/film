<h1> Résultats de recherche </h1>
@if(count($data)!= 0 )	
	@foreach($data as $d)	
		<li><a href="{{ URL::action($base_chemin,  $d->id)  }}">{{$d->value}}</a></li>	
	@endforeach
@else
	Aucun Résultat
@endif