<script type="text/javascript">

    function envoyerRealisateur(){
        param = $("#pre_nom_rea").val();
        listparam="pre_nom_rea="+ param;
        $.post( 
            "{{ URL::action('RealisateursController@add')}}",
            listparam,
            function(data) { 
                console.log(data);              
                if(data=="Non Valide"){
                    $(".info").append( document.createTextNode( " Le nom et prénom du réalisateur n'est pas valide (min: 4 caractères)" ) );
                }else{
                    $('#modal-realisateur').trigger('reveal:close');
                    var o = new Option(data.pre_nom_rea, data.id);
                    /// jquerify the DOM object 'o' so we can use the html method
                    $(o).html(data.pre_nom_rea);
                    $("#realisateur_id").append(o);
                    $("#realisateur_id").val(data.id);
                }
            }

        );
    };

    function envoyerDistributeur(){
        param = $("#nom").val();
        listparam="nom="+ param;
        $.post( 
            "{{ URL::action('DistributeursController@add')}}",
            listparam,
            function(data) { 
                console.log(data);              
                if(data=="Non Valide"){
                    $(".info").append( document.createTextNode("Le nom du distributeur n'est pas valide (min: 4 caractères)" ));
                }else{
                    $('#modal-distributeur').trigger('reveal:close');
                    var o = new Option(data.nom, data.id);
                    /// jquerify the DOM object 'o' so we can use the html method
                    $(o).html(data.nom);
                    $("#distributeur_id").append(o);
                    $("#distributeur_id").val(data.id);
                }
            }

        );
    };

    function envoyerGenre(){
        param = $("#genre").val();
        listparam="genre="+ param;
        $.post( 
            "{{ URL::action('GenresController@add')}}",
            listparam,
            function(data) { 
                console.log(data);              
                if(data=="Non Valide"){
                    $(".info").append( document.createTextNode("Le nom du genre n'est pas valide (min: 4 caractères)" ));
                }else{
                    $('#modal-genre').trigger('reveal:close');
                    var o = new Option(data.nom, data.id);
                    /// jquerify the DOM object 'o' so we can use the html method
                    $(o).html(data.genre);
                    $("#genre_id").append(o);
                    $("#genre_id").val(data.id);
                }
            }

        );
    };


    function envoyerActeur(){
        param = $("#pre_nom_acteur").val();
        listparam="pre_nom_acteur="+ param;
        $.post( 
            "{{ URL::action('ActeursController@add')}}",
            listparam,
            function(data) { 
                console.log(data);              
                if(data=="Non Valide"){
                    $(".info").append( document.createTextNode("Le nom du genre n'est pas valide (min: 4 caractères)" ));
                }else{
                    $('#modal-acteur').trigger('reveal:close');                    
                }
            }

        );
    };


</script>

{{ Form::model(
	$film,
	array('url' =>
	$film->id? URL::action('FilmsController@update', $film->id): URL::action('FilmsController@store'),
    'files' => true
	))
}}


	<div class="form-group">
    	{{
    		Form::label(
    			'nom',
    			"Titre du film",
    	 		['class' => 'form-label']
    	 	)
    	}}
    	{{
    		Form::text(
    			'titre',
    			null,
    			['class' => 'form-control']
    		)
    	}}
    	@if($errors->has('titre'))
	    	<p class="help-block">
		    	{{$errors->first('titre')}}
		    </p>
    	@endif
  	</div>

   	<div class="form-group">
    	{{
    		Form::label(
    			'synopsys',
    			"Synopsys du film",
    	 		['class' => 'form-label']
    	 	)
    	}}
    	{{
    		Form::textarea(
    			'synopsys',
    			null,
    			['class' => 'form-control']
    		)
    	}}
    	@if($errors->has('synopsys'))
	    	<p class="help-block">
		    	{{$errors->first('synopsys')}}
		    </p>
    	@endif
  	</div>

    <div class="form-group">
        {{
            Form::label(
                'avis',
                "Avis sur le film",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::textarea(
                'avis',
                null,
                ['class' => 'form-control']
            )
        }}
        @if($errors->has('avis'))
            <p class="help-block">
                {{$errors->first('avis')}}
            </p>
        @endif
    </div>

    <div class="form-group">
        {{
            Form::label(
                'annee_prod',
                "Année de production",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::text(
                'annee_prod',
                null,
                ['class' => 'form-control']
            )
        }}
        @if($errors->has('annee_prod'))
            <p class="help-block">
                {{$errors->first('annee_prod')}}
            </p>
        @endif
    </div>

    <div class="form-group">
        {{
            Form::label(
                'titre_francais',
                "Titre Français",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::text(
                'titre_francais',
                null,
                ['class' => 'form-control']
            )
        }}
        @if($errors->has('titre_francais'))
            <p class="help-block">
                {{$errors->first('titre_francais')}}
            </p>
        @endif
    </div>

    <div class="form-group">
        {{
            Form::label(
                'prix',
                "Prix ",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::text(
                'prix',
                null,
                ['class' => 'form-control']
            )
        }}
        @if($errors->has('prix'))
            <p class="help-block">
                {{$errors->first('prix')}}
            </p>
        @endif
    </div>

    <div class="form-group">
        {{
            Form::label(
                'image',
                "Image",
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

    <div class="form-group">
        {{
            Form::label(
                'realisateur_id',
                "Réalisateur",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::select(
                'realisateur_id',
                Realisateur::orderBy('pre_nom_rea')->lists('pre_nom_rea', 'id')
            )
        }}
        @if($errors->has('realisateur_id'))
            <p class="help-block">
                {{$errors->first('realisateur_id')}}
            </p>
        @endif 
        
    </div>

            <a href="#" class="big-link" data-reveal-id="modal-realisateur">
                Ajouter un réalisateur
            </a> 
            <div id="modal-realisateur" class="reveal-modal">

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
                        <div id="bouttonsRealisateurs">
                            <input type='button' value='Ajouter' onclick='envoyerRealisateur()' />
                        </div>
                        <div class="info">
                            
                        </div>
                </div>           
                
                <a class="close-reveal-modal">&#215;</a>
            </div>  

    <div class="form-group">
        {{
            Form::label(
                'distributeur_id',
                "Distributeur",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::select(
                'distributeur_id',
                Distributeur::orderBy('nom')->lists('nom', 'id')
            )
        }}
        @if($errors->has('distributeur_id'))
            <p class="help-block">
                {{$errors->first('distributeur_id')}}
            </p>
        @endif
    </div>

            <a href="#" class="big-link" data-reveal-id="modal-distributeur">
                Ajouter un distributeur
            </a> 
            <div id="modal-distributeur" class="reveal-modal">

                <div class="form-group">
                    {{
                        Form::label(
                            'nom',
                            "Nom du distributeur",
                            ['class' => 'form-label']
                        )
                    }}
                    {{
                        Form::textarea(
                            'nom',
                            null,
                            ['class' => 'form-control']
                        )
                    }}
                        <div id="bouttonsDistributeurs">
                            <input type='button' value='Ajouter' onclick='envoyerDistributeur()' />
                        </div>
                        <div class="info">
                            
                        </div>
                </div>           
                
                <a class="close-reveal-modal">&#215;</a>
            </div>

    <div class="form-group">
        {{
            Form::label(
                'genre_id',
                "Genre:",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::select(
                'genre_id',
                Genre::orderBy('genre')->lists('genre', 'id')
            )
        }}
        @if($errors->has('distributeur_id'))
            <p class="help-block">
                {{$errors->first('distributeur_id')}}
            </p>
        @endif
    </div>
            <a href="#" class="big-link" data-reveal-id="modal-genre">
                Ajouter un genre
            </a> 
            <div id="modal-genre" class="reveal-modal">

                <div class="form-group">
                    {{
                        Form::label(
                            'genre',
                            "Genre : ",
                            ['class' => 'form-label']
                        )
                    }}
                    {{
                        Form::textarea(
                            'genre',
                            null,
                            ['class' => 'form-control']
                        )
                    }}
                        <div id="bouttonsGenres">
                            <input type='button' value='Ajouter' onclick='envoyerGenre()' />
                        </div>
                        <div class="info">
                            
                        </div>
                </div>           
                
                <a class="close-reveal-modal">&#215;</a>
            </div>


    
        <?php 
        $liste_acteurs=Array();
        $i=0;
        foreach ($film->acteurs as $acteur) {
            $liste_acteurs[$i]['id']=$acteur->id;
            $liste_acteurs[$i]["name"]=$acteur->pre_nom_acteur;
            $i++;
        }
        
        ?>
        
    <div class="form-group">
        <label for="acteurs" class="form-label">Acteurs</label>
        <input class="form-control" name="acteurs" id="acteurs" type="text" value="">
    </div>
            <a href="#" class="big-link" data-reveal-id="modal-acteur">
                Ajouter un acteur
            </a> 
            <div id="modal-acteur" class="reveal-modal">

                <div class="form-group">
                    {{
                        Form::label(
                            'pre_nom_acteur',
                            "Prénom et Nom de l'acteur : ",
                            ['class' => 'form-label']
                        )
                    }}
                    {{
                        Form::textarea(
                            'pre_nom_acteur',
                            null,
                            ['class' => 'form-control']
                        )
                    }}
                        <div id="bouttonsActeurs">
                            <input type='button' value='Ajouter' onclick='envoyerActeur()' />
                        </div>
                        <div class="info">
                            
                        </div>
                </div>           
                
                <a class="close-reveal-modal">&#215;</a>
            </div>



        


	{{Form::submit()}}
{{Form::close()}}


{{ HTML::script('js/jquery.tokeninput.js')}}

<script type="text/javascript">
    $(document).ready(function() {
        $("#acteurs").tokenInput("http://local.dev/projetFilmApp/film/public/acteurs/search", {
            prePopulate: <?php echo json_encode($liste_acteurs); ?>
        });

    });
</script>


