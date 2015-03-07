{{ Form::model(
	$affiche,
	array('url' =>
	$affiche->id? URL::action('AffichesController@update', $affiche->id): URL::action('AffichesController@store'),
    'files' => true
	))
}}
@if($errors->has())
   @foreach ($errors->all() as $error)
      <div class="btn btn-danger" >{{ $error }}</div>
  @endforeach
@endif  

<div class="form-group">
    <label for="oldimage" class="form-label">Image Actuelle:</label>
    <div>
        {{ isset($affiche->image  ) ?  HTML::image('affiches/'.$affiche->image)   : 'Aucune Affiche' }}
    </div>
</div>



	<div class="form-group">
    	{{
    		Form::label(
    			'image',
    			"Image :",
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

  	
	{{Form::submit('Enregistrer', ['class' => 'btn btn-primary'])}}
{{Form::close()}}