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
			@foreach($marques as $marque)
			<li>
				<form action="{{url('back/marque/edit')}}" method="post">
					<span class="id">
						{{$marque->idMarq}}
						<input type="hidden" value="{{$marque->idMarq}}" name="idMarq">
					</span>
					<span class="marque">
						<input type="text" value="{{$marque->nomMarq}}" name="nomMarq">
					</span>
					<span class="save">
						<input type="submit" value="sauvegarder">
					</span>
					<span class="erase"><a href="marque/del/{{$marque->idMarq}}">EFFACER</a></span>
				</form>
			</li>
			@endforeach
		</ul>
		<p>Ajouter une entrée :</p>
		<form action="{{url('back/marque/add')}}" method="post">
			<input type="text" name="nomMarq">
			<input type="submit" value="ajouter">
		</form>
	</body>
</html>