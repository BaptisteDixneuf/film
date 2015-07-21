{{ Form::model(
	$realisateur,
	array('url' =>
	$realisateur->id? URL::action('RealisateursController@update', $realisateur->id): URL::action('RealisateursController@store')
	))
}}

@if($errors->has())
   @foreach ($errors->all() as $error)
      <div class="btn btn-danger" >{{ $error }}</div>
  @endforeach
@endif    
	  	<div class="form-group">
    	{{
    		Form::label(
    			'pre_nom_rea',
    			"Prénom et Nom du réalisateur (*) : ",
    	 		['class' => 'form-label']
    	 	)
    	}}
    	{{
    		Form::text(
    			'pre_nom_rea',
    			null,
    			['class' => 'form-control']
    		)
    	}}
    	@if($errors->has('pre_nom_rea'))
	    	<p class="help-block">
		    	{{$errors->first('pre_nom_rea')}}
		    </p>
    	@endif
  	</div>

	{{Form::submit('Enregistrer', ['class' => 'btn btn-primary'])}}
{{Form::close()}}