<!DOCTYPE html>
<html>
    <head>
    	<!-- Titre de la page -->
        <title>Laravel</title>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <script src="../js/biblio.js"></script>
        <script>
        	save = function(id){
        		var value = this.parentElement.previousSibling.firstChild.value;
        		Ajax._({
        			
        		}) 	
        	}
        </script>
        <style>
        	
        </style>
    </head>
	<body>
		<ul id="liste">		
			@foreach($vehicules as $vehicule)

			<li>
				<form action="{{url('back/vehicule/edit')}}" method="post">
					<span class="id">
						{{$vehicule->idVeh}}
						<input type="hidden" value="{{$vehicule->idVeh}}" name="idVeh">
					</span>
					<span class="vehicule">
						<input type="text" value="{{$vehicule->photoVeh}}" name="photoVeh">
					</span>
					<span class="vehicule">
						<input type="text" value="{{$vehicule->confVeh}}" name="confVeh">
					</span>
					<span class="vehicule">
						<input type="text" value="{{$vehicule->nbPlaceVeh}}" name="nbPlaceVeh">
					</span>
					<span class="vehicule">
						<input type="text" value="{{$vehicule->couleurVeh}}" name="couleurVeh">
					</span>
					<span class="vehicule">
						<select name="defautVeh">
							<option value="1" 
							@if($vehicule->defautVeh == 1)
								selected
							@endif
							>Par defaut</option>
							<option value="0"
							@if($vehicule->defautVeh == 0)
								selected
							@endif
							>Pas par defaut</option>
						</select>
					</span>
					<span class="vehicule">
						<input type="text" value="{{$vehicule->idMemb}}" name="idMemb">
					</span>
					<span class="vehicule">
						<select name="idMod">
							@foreach($modeles as $modele)
								<option value="{{$modele->idMod}}"
								@if($vehicule->idMod == $modele->idMod)
									selected
								@endif
								>{{$modele->nomMod}}</option>
							@endforeach
						</select>
					</span>
						<select name="idType">
							@foreach($types as $type)
								<option value="{{$type->idType}}"
								@if($vehicule->idType == $type->idType)
									selected
								@endif
								>{{$type->libType}}</option>
							@endforeach
						</select>
					<span class="save">
						<input type="submit" value="sauvegarder">
					</span>
					<span class="erase"><a href="vehicule/del/{{$vehicule->idVeh}}">EFFACER</a></span>
				</form>
			</li>
			@endforeach
		</ul>
		<p>Ajouter une entrée :</p>
		<form action="{{url('back/vehicule/add')}}" method="post">
			<span class="id">
						<input type="hidden" placeholder="" name="idVeh">
					</span>
					<span class="vehicule">
						<input type="text" placeholder="photo" name="photoVeh">
					</span>
					<span class="vehicule">
						<input type="text" placeholder="confort (1 à 5)" name="confVeh">
					</span>
					<span class="vehicule">
						<input type="text" placeholder="nombre de place" name="nbPlaceVeh">
					</span>
					<span class="vehicule">
						<input type="text" placeholder="couleur" name="couleurVeh">
					</span>
					<span class="vehicule">
						<select name="defautVeh">
							<option value="1">Par defaut</option>
							<option value="0">Pas par defaut</option>
						</select>
					</span>
					<span class="vehicule">
						<input type="text" placeholder="id du membre" name="idMemb">
					</span>
					<span class="vehicule">
						<select name="idMod">
							@foreach($modeles as $modele)
								<option value="{{$modele->idMod}}">{{$modele->nomMod}}</option>
							@endforeach
						</select>
					</span>
						<select name="idType">
							@foreach($types as $type)
								<option value="{{$type->idType}}">{{$type->libType}}</option>
							@endforeach
						</select>
			<input type="submit" value="ajouter">
		</form>
	</body>
</html>