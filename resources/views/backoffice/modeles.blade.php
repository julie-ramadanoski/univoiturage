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
			@foreach($modeles as $modele)

			<li>
				<form action="{{url('back/modele/edit')}}" method="post">
					<span class="id">
						{{$modele->idMod}}
						<input type="hidden" value="{{$modele->idMod}}" name="idMod">
					</span>
					<span class="modele">
						<input type="text" value="{{$modele->nomMod}}" name="nomMod">
					</span>
					<select name="idMarq">
					@foreach($marques as $marque)
						<option value="{{$marque->idMarq}}"
						@if($marque->idMarq == $modele->idMarq)
							selected
						@endif
						>{{$marque->nomMarq}}</option>
					@endforeach
					</select>
					<span class="save">
						<input type="submit" value="sauvegarder">
					</span>
					<span class="erase"><a href="modele/del/{{$modele->idMod}}">EFFACER</a></span>
				</form>
			</li>
			@endforeach
		</ul>
		<p>Ajouter une entrée :</p>
		<form action="{{url('back/modele/add')}}" method="post">
			<label class="col-md-4 control-label" for="nomMod">Nom du modèle</label>
			<input type="text" name="nomMod">
			<label class="col-md-4 control-label" for="idMarq">Marque associée</label>
			<select name="idMarq">
			@foreach($marques as $marque)
				<option value="{{$marque->idMarq}}">{{$marque->nomMarq}}</option>
			@endforeach
			</select>
			<input type="submit" value="ajouter">
		</form>
	</body>
</html>