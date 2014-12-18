{{ Form::model(
	$affiche,
	array('url' =>
	$affiche->id? URL::action('AffichesController@update', $affiche->id): URL::action('AffichesController@store'),
    'files' => true
	))
}}
	<div class="form-group">
    	{{
    		Form::label(
    			'image',
    			"Image:",
    	 		['class' => 'form-label']
    	 	)
    	}}
    	{{
    		Form::file(
    			'image',
    			null,
    			['class' => 'form-control']
    		)
    	}}
    	@if($errors->has('image'))
	    	<p class="help-block">
		    	{{$errors->first('image')}}
		    </p>
    	@endif
  	</div>

  	
	{{Form::submit()}}
{{Form::close()}}