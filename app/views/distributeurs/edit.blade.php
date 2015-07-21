{{ Form::model(
	$distributeur,
	array('url' =>
	$distributeur->id? URL::action('DistributeursController@update', $distributeur->id): URL::action('DistributeursController@store')
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
    			'nom',
    			"Nom du distributeur (*) : ",
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
  	
	{{Form::submit('Enregistrer', ['class' => 'btn btn-primary'])}}
{{Form::close()}}