<!DOCTYPE>
<html lang='fr'>
	<head>
		<meta charset="UTF-8">
		<title>Ajout d'un trajet</title>

		<!--<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}"> URL::asset permet de donner le chemin à partir de laravel/public -->
		
		<script src="{{ URL::asset('assets/js/biblio.js') }}"></script>
		<script src="{{ URL::asset('assets/js/step.class.js') }}"></script>
		<script src="http://maps.google.fr/maps/api/js?key=AIzaSyBwbDVyor_fGiLjXlwAJ9RlDKn9NRDVZag" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/js/script.js') }}"></script>
	</head>
	<body>
		<h1>Publier une annonce</h1>
		
		<div id="timeline">

		</div>
		<div id="leftPanel">
			<div class="zone" id="details">
				<h2>Détails</h2>
				<ul>
					<li>
						<label for="fromUniversity">Au départ de l'université :</label>
						<input type="radio" name="startPoint" value="from" id="fromUniversity" checked>
					</li>
					<li>
						<label for="toUniversity">Vers l'université :</label>
						<input type="radio" name="startPoint" value="to" id="toUniversity">
					</li>
					<li>
						<label for="car">Voiture :</label>
						<input type="radio" name="vehicule" value="car" id="car" checked>
					</li>
					<li>
						<label for="moto">Moto :</label>
						<input type="radio" name="vehicule" value="moto" id="moto">
					</li>
				</ul>
			</div>
			<div class="zone" id="route">
				<h2>Itinéraire</h2>
				<label for="startInput">Point de départ</label>
				<input type="text" name="startInput" id="startInput" value="">
				<label for="endInput">Point d'arrivée</label>
				<input type="text" name="endInput" id="endInput" value="">
				<input type="checkbox" name="highways" id="highways">
				<label for="highways">Trajet empruntant l'autoroute</label>
				<h3>Villes étapes</h3>
				<p>Augmentez vos chances d'avoir des passagers en ajoutant des villes étapes</p>
				<ul id="stepList">
					<!--<li><input type="text" name="steps[]" class="stepInput"></li>-->
				</ul>
				
				<button type="button" id="addStep">+ Ajouter une ville étape</button>
			</div>
			<div class="zone" id="date">
				<h2>
					Date et horaire
					<input type="checkbox" name="goAndBack" id="goAndBack">
					<label for="goAndBack">Trajet aller-retour</label>
				</h2>
				<label for="goDate">Date aller :</label>
				<input type="date" name="goDate" id="goDate">
				<select id="goDateHour" name="goDateHour"></select>
				h
				<select id="goDateMinute" name="goDateMinute"></select>
				<label for="backDate">Date retour :</label>
				<input type="date" name="backDate" id="backDate">
				<select id="backDateHour" name="backDateHour"></select>
				h
				<select id="backDateMinute" name="backDateMinute"></select>
			</div>
			<div class="zone" id="price">
				<h2>Participation demandée par passager</h2>
				<ul id="priceList">
					
				</ul>
			</div>
			<div class="zone" id="place">
				<label for="places">Nombre de places proposées</label>
				<input type="number" name="place" id="places" value="3">
			</div>
			<div class="zone" id="other">
				<h2>Détails de voyage</h2>
				<p>Veuillez ajouter plus de détails sur votre trajet. Cela vous évitera beaucoup de questions de vos passagers.</p>
				<textarea name="description" id="description"></textarea>
				<p>Votre téléphone et email son renseignés dans votre profil, ne les ajoutez pas ici : (<a href="#">voir les rêgles</a>)</p>
			</div>
			<div class="zone" id="cguZone">
				<input type="checkbox" name="cgu" id="cgu">
				<label for="cgu">J'ai lu et j'accepte les CGU</label>
			</div>
			<div class="buttons" id="continuation">
				<button type="button" id="continuation">Continuer</button>
			</div>
			<div class="buttons" id="confirmation">
				<button type="button" id="back">retour</button>
				<button type="button" id="confirmation">Continuer et publier</button>
			</div>
		</div>
		<div id="rightPanel">
			<h2>Votre itinéraire</h2>
			<div id="map" style="width:400px;height:400px;"></div>
		</div>
	</body>
</html>