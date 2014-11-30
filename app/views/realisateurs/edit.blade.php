{{ Form::model(
	$realisateur,
	array('url' =>
	$realisateur->id? URL::action('RealisateursController@update', $realisateur->id): URL::action('RealisateursController@store')
	))
}}
	  	<div class="form-group">
    	{{
    		Form::label(
    			'pre_nom_rea',
    			"Prenom et Nom du réalisateur",
    	 		['class' => 'form-label']
    	 	)
    	}}
    	{{
    		Form::textarea(
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

	{{Form::submit()}}
{{Form::close()}}