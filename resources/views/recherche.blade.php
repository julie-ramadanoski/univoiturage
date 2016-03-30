<!DOCTYPE html>
<html>
    <head>
        <title>Carafond</title>        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8"> 
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/css/app.css" rel="stylesheet" type="text/css">
        <link href="/css/datepicker.css" rel="stylesheet" type="text/css">
        <link href="/css/ui-autocomplete.css" rel="stylesheet" type="text/css">

        <script src="{{ URL::asset('assets/js/biblio.js') }}"></script>
        <script src="{{ URL::asset('assets/js/step.class.js') }}"></script>
        <script src="http://maps.google.fr/maps/api/js?key=AIzaSyBwbDVyor_fGiLjXlwAJ9RlDKn9NRDVZag" type="text/javascript"></script>
        <script src="{{ URL::asset('assets/js/script.js') }}"></script>
                
                <!-- Chargement des css globaux -->
        

        <!-- Chargement des JS globaux -->
        <script src="/js/biblio.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="http://codeorigin.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> 

        <script src="/js/moment.min.js" ></script>
        <script src="/js/bootstrap-datepicker.js" ></script>
      
    </head>
    </head>
    <body>  
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Nav</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ URL::asset('images/carafond.png') }}" alt="caràfond" style="width: 42%;"/></a>

                </div>
                <div class="collapse navbar-collapse" id="navbar">
                       <ul class="nav navbar-nav" id="rechercher">
                        <li><a href="{{ url('/') }}">Rechercher un trajet</a></li>
                    </ul>
                       <ul class="nav navbar-nav" id="proposer">
                        <li><a href="{{ url('/trajet/add') }}">Proposer un trajet</a></li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if(auth()->guest())
                            @if(!Request::is('auth/login'))
                                <li><a href="{{ url('/auth/login') }}">Se connecter</a></li>
                            @endif
                            @if(!Request::is('auth/register'))
                                <li><a href="{{ url('/auth/register') }}">S'enregistrer</a></li>
                            @endif
                            <li><a href="{{ url('/commentcamarche') }}">Comment ça marche?</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/profil') }}">Profil</a></li>
                                    <li><a href="{{ url('/auth/logout') }}">Déconnexion</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        
        @yield('content')
        
    <div id="footer">
    <div class="container">
        <div class="row">
            <br>
              <div class="col-md-4">
                <center>
                  <img src="http://oi60.tinypic.com/w8lycl.jpg" class="img-circle" alt="the-brains">
                  <br>
                  <h4 class="footertext">Mentions légales</h4>
                  <p class="footertext">Conditions d'utilisation<br>
                </center>
              </div>
              <div class="col-md-4">
                <center>
                  <img src="http://oi60.tinypic.com/2z7enpc.jpg" class="img-circle" alt="...">
                  <br>
                  <h4><a class="footertexta" href="{{ url('/auth/register') }}">S'enregistrer</a></h4>
                    <h4><a class="footertexta" href="{{ url('/auth/login') }}">Se connecter</a><br></h4>
                </center>
              </div>
              <div class="col-md-4">
                <center>
                  <img src="http://oi61.tinypic.com/307n6ux.jpg" class="img-circle" alt="...">
                  <br>
                  <h4 class="footertext">Université</h4>
                  <p class="footertext">Toutes les universités en partenariat avec nous.<br>
                </center>
              </div>
            </div>
            <div class="row">
            <p><center><a href="#" id="carafond">Caràfond</a> <p class="footertext">Copyright 2016</p></center></p>
        </div>
    </div>
</div>     

        <!-- Latest compiled and minified JavaScript -->
        
     
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();

                $('input:text').bind({

                });
                $("#villedepart").autocomplete({
                    minLength: 1,
                    autoFocus: true,
                    source:'{{ URL('/autocompleteVille') }}',
                    select: $("#universite").value
                 });
                $("#villearrivee").autocomplete({
                    minLength: 1,
                    autoFocus: true,
                    source:'{{ URL('/autocompleteVille') }}',
                    select: $("#universite").value
                 });
                $("#universite").autocomplete({
                    minLength: 1,
                    autoFocus: true,
                    source:'{{ URL('/autocompleteUniv') }}'
                 });

                $.ajax({
                    url: '{{ URL('/autocompleteSite') }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $.map(data, function (value, key) {                                     
                            var first;
                            for (var i in value) {
                                if (value.hasOwnProperty(i) && typeof(i) !== 'function') {
                                    first = value[i];
                                    break;
                                }
                            }
                            $("#site").append('<option value=' + i + '>' + first + '</option>'); 
                            
                        });
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            });
        </script>
    </body>
</html>