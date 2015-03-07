<h1> Résultats de recherche </h1>
@if(!empty($data->items))	
	@foreach($data as $d)	
		<li><a href="{{ URL::action($base_chemin,  $d->id)  }}">{{$d->value}}</a></li>	
	@endforeach
@else
	Aucun Résultat
@endif