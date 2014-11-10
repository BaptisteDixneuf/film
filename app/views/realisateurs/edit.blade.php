{{ Form::model(
	$realisateur,
	array('url' =>
	$realisateur->id? URL::action('RealisateursController@update', $realisateur->id): URL::action('RealisateursController@store')
	))
}}
	<div class="form-group">
    	{{
    		Form::label(
    			'nom',
    			"Nom du réalisateur",
    	 		['class' => 'form-label']
    	 	)
    	}}
    	{{
    		Form::text(
    			'nom',
    			null,
    			['class' => 'form-control']
    		)
    	}}
    	@if($errors->has('nom'))
	    	<p class="help-block">
		    	{{$errors->first('nom')}}
		    </p>
    	@endif
  	</div>

  	<div class="form-group">
    	{{
    		Form::label(
    			'prenom',
    			"Prénom du réalisateur",
    	 		['class' => 'form-label']
    	 	)
    	}}
    	{{
    		Form::text(
    			'prenom',
    			null,
    			['class' => 'form-control']
    		)
    	}}
    	@if($errors->has('prenom'))
	    	<p class="help-block">
		    	{{$errors->first('prenom')}}
		    </p>
    	@endif
  	</div>

  	<div class="form-group">
    	{{
    		Form::label(
    			'biographie',
    			"Biographie du réalisateur",
    	 		['class' => 'form-label']
    	 	)
    	}}
    	{{
    		Form::textarea(
    			'biographie',
    			null,
    			['class' => 'form-control']
    		)
    	}}
    	@if($errors->has('biographie'))
	    	<p class="help-block">
		    	{{$errors->first('biographie')}}
		    </p>
    	@endif
  	</div>

	{{Form::submit()}}
{{Form::close()}}