<!DOCTYPE html>
<html>
    <head>
    	<!-- Titre de la page -->
        <title>Laravel</title>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/css/app.css" rel="stylesheet" type="text/css">
        <!-- Chargement des JS globaux -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="http://codeorigin.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> 

        <script src="/js/moment.min.js" ></script>
        <script src="/js/bootstrap-datepicker.js" ></script>
        <script src="../js/biblio.js"></script>
    </head>
	<body>
		<nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">Car à fond</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav" id="proposer">
                        <li><a href="{{ url('/back/marque') }}">Marques</a></li>
                    </ul>
                    <ul class="nav navbar-nav" id="proposer">
                        <li><a href="{{ url('/back/modele') }}">Modeles</a></li>
                    </ul>
                    <ul class="nav navbar-nav" id="proposer">
                        <li><a href="{{ url('/back/site') }}">Sites</a></li>
                    </ul>
                    <ul class="nav navbar-nav" id="proposer">
                        <li><a href="{{ url('/back/universite') }}">Universites</a></li>
                    </ul>
                    <ul class="nav navbar-nav" id="proposer">
                        <li><a href="{{ url('/back/vehicule') }}">Vehicules</a></li>
                    </ul>
                    <ul class="nav navbar-nav" id="proposer">
                        <li><a href="{{ url('/back/ville') }}">Villes</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if(auth()->guest())
                            @if(!Request::is('auth/login'))
                                <li><a href="{{ url('/auth/login') }}">Se connecter</a></li>
                            @endif
                            @if(!Request::is('auth/register'))
                                <li><a href="{{ url('/auth/register') }}">S'enregistrer</a></li>
                            @endif
                            <li><a href="">Comment ça marche?</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/auth/logout') }}">Déconnexion</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
		<div class="col-md-9">
			<table>
				<tr>
				<p>Ajouter une entrée :</p>
				<form action="{{url('back/site/add')}}" method="post">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}">
					<td>0</td>
					<td class="site">
						<input type="text" placeholder="Nom" name="nomSite">
					</td>
					<td class="site">
						<input type="text" placeholder="Adresse 1" name="adr1Site">
					</td>
					<td class="site">
						<input type="text" placeholder="Adresse 2" name="adr2Site">
					</td>
					<td class="site">
						<select name="idUniv">
							@foreach($universites as $universite)
								<option value="{{$universite->idUniv}}">{{$universite->nomUniv}}</option>
							@endforeach
						</select>
					</td>
					<td class="site">
						<input type="text" placeholder="Code INSEE Ville" name="inseeVille">
					</td>
					<td>
						<input type="submit" value="ajouter">
					</td>
				</form>
				</tr>	
				@foreach($sites as $site)
				<tr>
				<form action="{{url('back/site/edit')}}" method="post">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}">
					<td class="id">
						{{$site->idSite}}
						<input type="hidden" value="{{$site->idSite}}" name="idSite">
					</td>
					<td class="site">
						<input type="text" value="{{$site->nomSite}}" name="nomSite">
					</td>
					<td class="site">
						<input type="text" value="{{$site->adr1Site}}" name="adr1Site">
					</td>
					<td class="site">
						<input type="text" value="{{$site->adr2Site}}" name="adr2Site">
					</td>
					<td class="site">
						<select name="idUniv">
							@foreach($universites as $universite)
								<option value="{{$universite->idUniv}}"
								@if($universite->idUniv == $site->idUniv)
									selected
								@endif
								>{{$universite->nomUniv}}</option>
							@endforeach
						</select>
					</td>
					<td class="site">
						<input type="text" value="{{$site->inseeVille}}" name="inseeVille">
					</td>
					<td class="save">
						<input type="submit" value="sauvegarder">
					</td>
					<td class="erase"><a href="site/del/{{$site->idSite}}">EFFACER</a></td>
				</form>
				</tr>
				@endforeach
			</table>
		</div>
	</body>
</html>