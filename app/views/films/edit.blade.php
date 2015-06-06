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

    function envoyerNationalite(){
        param = $("#nationalite").val();
        listparam="nationalite="+ param;
        $.post( 
            "{{ URL::action('NationalitesController@add')}}",
            listparam,
            function(data) { 
                console.log(data);              
                if(data=="Non Valide"){
                    $(".info").append( document.createTextNode("Le nom de la nationalité n'est pas valide (min: 4 caractères)" ));
                }else{
                    $('#modal-nationalite').trigger('reveal:close'); 
                    var o = new Option(data.nom, data.id);
                    /// jquerify the DOM object 'o' so we can use the html method
                    $(o).html(data.nationalite);
                    $("#nationalite_id").append(o);
                    $("#nationalite_id").val(data.id);                   
                }
            }

        );
    };


</script>



<?php 
//Pré-remplissage des champs de recherche

$liste_acteurs=array();
$liste_realisateurs=array();

if($film->id){

    $i=0;
    foreach ($film->acteurs as $acteur) {
        $liste_acteurs[$i]['id']=$acteur->id;
        $liste_acteurs[$i]["name"]=$acteur->pre_nom_acteur;
        $i++;
    }
    $liste_realisateurs['0']['id']=$film->realisateur->id;
    $liste_realisateurs['0']["name"]=$film->realisateur->pre_nom_rea; 
}





?>

{{ Form::model(
    $film,
    array('url' =>
    $film->id? URL::action('FilmsController@update', $film->id): URL::action('FilmsController@store'),
    'files' => true
    ))
}}


@if($errors->has())
   @foreach ($errors->all() as $error)
      <div class="btn btn-danger" >{{ $error }}</div>
  @endforeach
@endif


    <!-- Titre du film -->
    <div class="form-group">
        {{
            Form::label(
                'nom',
                "Titre du film (*) : ",
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

    <!-- Synopsys du film -->
    <div class="form-group">
        {{
            Form::label(
                'synopsys',
                "Synopsys du film (*) : ",
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

    <!-- Avis sur le film -->
    <div class="form-group">
        {{
            Form::label(
                'avis',
                "Avis sur le film (*) : ",
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

    <!-- Année de production -->
    <div class="form-group">
        {{
            Form::label(
                'annee_prod',
                "Année de production (*) : ",
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

    <!-- Titre Français -->
    <div class="form-group">
        {{
            Form::label(
                'titre_francais',
                "Titre Français : ",
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

    <!-- Prix -->
    <div class="form-group">
        {{
            Form::label(
                'prix',
                "Prix :  ",
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

    <!-- Image -->
    <div class="form-group">
        {{
            Form::label(
                'image',
                "Image ( Laisser vide lors d'une modification) :  ",
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
        @if($errors->has('affiche_id'))
            <p class="help-block">
                {{$errors->first('affiche_id')}}
            </p>
        @endif
    </div>

    <!-- Réalisateur -->
    <div class="form-group">
        <label for="realisateur_id" class="form-label">Realisateur (Taper un terme de recherche): </label>
        <p> <a href="#" class="big-link" data-reveal-id="modal-realisateur">Créer un nouveau réalisateur</a> </p> 
        <input class="form-control" name="realisateur_id" id="realisateur_id" type="text" value="">

        @if($errors->has('realisateur_id'))
            <p class="help-block">
                {{$errors->first('realisateur_id')}}
            </p>
        @endif

       
            <div id="modal-realisateur" class="reveal-modal">

                <div class="form-group">
                    {{
                        Form::label(
                            'pre_nom_rea',
                            "Prénom et Nom du réalisateur : ",
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
    </div>              

    <!-- Distributeur -->
    <div class="form-group">
        {{
            Form::label(
                'distributeur_id',
                "Distributeur : ",
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

        <a href="#" class="big-link" data-reveal-id="modal-distributeur">
                Ajouter un nouveau distributeur
            </a> 
            <div id="modal-distributeur" class="reveal-modal">

                <div class="form-group">
                    {{
                        Form::label(
                            'nom',
                            "Nom du distributeur : ",
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
    </div>
            
    <!-- Genre -->
    <div class="form-group">
        {{
            Form::label(
                'genre_id',
                "Genre : ",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::select(
                'genre_id',
                Genre::orderBy('genre')->lists('genre', 'id')
            )
        }}

        @if($errors->has('genre_id'))
            <p class="help-block">
                {{$errors->first('genre_id')}}
            </p>
        @endif

        <a href="#" class="big-link" data-reveal-id="modal-genre">
                Ajouter un nouveau genre
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
    </div>            

    <!-- Nationalité -->
    <div class="form-group">
        {{
            Form::label(
                'nationalite_id',
                "Nationalité :",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::select(
                'nationalite_id',
                Nationalite::orderBy('nationalite')->lists('nationalite', 'id')
            )
        }}

        @if($errors->has('nationalite_id'))
            <p class="help-block">
                {{$errors->first('nationalite_id')}}
            </p>
        @endif
        
        <a href="#" class="big-link" data-reveal-id="modal-nationalite">
                Ajouter une nouvelle nationalité
            </a> 
            <div id="modal-nationalite" class="reveal-modal">

                <div class="form-group">
                    {{
                        Form::label(
                            'nationalite',
                            "Nationalité : ",
                            ['class' => 'form-label']
                        )
                    }}
                    {{
                        Form::textarea(
                            'nationalite',
                            null,
                            ['class' => 'form-control']
                        )
                    }}
                        <div id="bouttonsNationalites">
                            <input type='button' value='Ajouter' onclick='envoyerNationalite()' />
                        </div>
                        <div class="info">
                            
                        </div>
                </div>           
                
                <a class="close-reveal-modal">&#215;</a>
            </div>
    </div>                
        

    <!-- acteur -->    
    <div class="form-group">
        <label for="acteurs" class="form-label">Acteurs (Taper un terme de recherche) : </label>
        <input class="form-control" name="acteurs" id="acteurs" type="text" value="">
        <a href="#" class="big-link" data-reveal-id="modal-acteur">
                Ajouter un nouveau acteur
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
    </div>   

    {{Form::submit('Enregistrer', ['class' => 'btn btn-primary'])}}
{{Form::close()}}


{{ HTML::script('js/jquery.tokeninput.js')}}

<script type="text/javascript">
    $(document).ready(function() {
        $("#acteurs").tokenInput("{{ URL::action('ActeursController@search')}}", {
            prePopulate: <?php echo json_encode($liste_acteurs); ?>
        });
        $("#realisateur_id").tokenInput("{{ URL::action('RealisateursController@search')}}", {
            prePopulate: <?php echo json_encode($liste_realisateurs); ?>,
            tokenLimit : 1,
            propertyToSearch: "name",
            tokenFormatter: function(item) { return "<li><p id='"+ item.id +"'>"+ item.name + "</option></li>" }
        });

    });
</script>

