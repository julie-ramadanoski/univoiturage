<!DOCTYPE html>
<html>
    <head>
    	<!-- Titre de la page -->
        <title>Laravel</title>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <script src="../js/biblio.js"
        <script>
        	save = function(id){
        		var value = this.parentElement.previousSibling.firstChild.value;
        		Ajax._({
        			
        		}) 	
        	}

        	erase = function(id){

        	}
        </script>
    </head>
	<body>
		<table>
			<tr>
				<td>ID</td>
				<td>Nom de la marque</td>
				<td>Enregistrer la ligne</td>
				<td>Supprimer la ligne</td>
			</tr>
			@foreach($marques as $marque)
				<tr>
					<td>{{$marque->idMarq}}</td>
					<td><input type="text" value="{{$marque->nomMarq}}"></td>
					<td><button type="button" onClick="save({{$marque->idMarq}})">SAUVEGARDER</button></td>
					<td><button type="button" onClick="erase({{$marque->idMarq}})">EFFACER</button></td>
				</tr>
			@endforeach
			<tr>
				<td colspan="4">rajouter une ligne</td>
			</tr>
			<tr>
				<td>{{$marque->idMarq +1}}</td>
				<td><input type="text" value=""></td>
				<td><button type="button" onClick="save({{$marque->idMarq}})">SAUVEGARDER</button></td>
				<td><button type="button" onClick="erase({{$marque->idMarq}})">EFFACER</button></td>
			</tr>
		</table>
	</body>
</html>