<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>FILM</title>
  
    {{ HTML::style('css/bootstrap.min.css')}}
    {{ HTML::style('css/starter-template.css')}}
    {{ HTML::style('css/token-input.css')}}
    {{ HTML::style('css/design.css')}}
    {{ HTML::style('modal/reveal.css')}}

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
    {{ HTML::script('js/jquery-1.6.min.js')}} 
    {{ HTML::script('modal/jquery.reveal.js')}} 
    
    
  
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::to('/')}}">Accueil</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ URL::action("FilmsController@index")}}">Film</a></li>
            <li><a href="{{ URL::action("RealisateursController@index")}}">Réalisateur</a></li>
            <li><a href="{{ URL::action("DistributeursController@index")}}">Distributeur</a></li>
            <li><a href="{{ URL::action("GenresController@index")}}">Genre</a></li>
            <li><a href="{{ URL::action("AffichesController@index")}}">Affiche</a></li>            
            <li><a href="{{ URL::action("ActeursController@index")}}">Acteur</a></li>
            <li><a href="{{ URL::action("NationalitesController@index")}}">Nationalité</a></li>
            
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container main">   
      @if(Session::has('success'))
        <div class="alert alert-success">
          {{ Session::get('success')}}
        </div>
      @endif
      @if(Session::has('error'))
        <div class="alert alert-danger">
          {{ Session::get('error')}}
        </div>
      @endif

      @yield('content', $content)
    </div><!-- /.container -->


    
    


  </body>
</html>
