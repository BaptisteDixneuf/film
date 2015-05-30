<h1> Résultats de recherche </h1>
<p><a  class="btn btn-primary" href="{{ URL::action("RecherchesController@index") }}"> Effectuer une nouvelle recherche </a></p>
@if(count($data)!= 0 )	
	@foreach($data as $d)	
		<li><a href="{{ URL::action($base_chemin,  $d->id)  }}">{{$d->value}}</a></li>	
	@endforeach
@else
	<p>Aucun Résultat<p>
@endif