@extends('index')

@section('content')
	<script src="/js/step.class.js"></script>
	<script src="http://maps.google.fr/maps/api/js?key=AIzaSyBwbDVyor_fGiLjXlwAJ9RlDKn9NRDVZag" type="text/javascript"></script>
	<script src="/js/script.js"></script>
	<script>
	
	</script>
	<h2>Publier une annonce</h2>
	<div id="timeline"></div>
	<div class="row">
		<div class="col s12 m6 l6">
			<div class="card-panel green lighten-3 z-depth-0">
				<input type="radio" name="startPoint" value="from" id="fromUniversity">
				<label for="fromUniversity" class="black-text">Au départ de l'université</label>
				<input type="radio" name="startPoint" value="to" id="toUniversity">
				<label for="toUniversity" class="black-text">Vers l'université</label>
				<input type="radio" name="vehicule" value="car" id="car">
				<label for="car" class="black-text">Voiture</label>
				<input type="radio" name="vehicule" value="moto" id="moto">
				<label for="moto" class="black-text">Moto</label>
			</div>
			<div>
				<div class="card-panel green lighten-3 z-depth-0 white-text center-align">
					Itinéraire
				</div>
				<div class="row" >
					<div class="green lighten-5 z-depth-0 col s10 offset-s1">
						<div class="input-field">
				        	<i class="material-icons prefix">flag</i>
				        	<input id="startInput" name="startInput" type="text" class="validate">
				        	<label for="startInput">Point de départ</label>
				        </div>
				        <div class="input-field">
				        	<i class="material-icons prefix">flag</i>
				        	<input id="endInput" name="endInput" type="text" class="validate">
				        	<label for="endInput">Point d'arrivée</label>
				        </div>					
				        <input type="checkbox" name="highways" id="highways">
						<label for="highways">Trajet empruntant l'autoroute</label>
						<p>Villes étapes :</p>
						<p>Augmentez vos chances d'avoir des passagers</p>
						<ul id="stepList"></ul>
						
						<button type="button" id="addStep">+ Ajouter une ville étape</button>
					</div>
				</div>
			</div>
			<div>
				<div class="card-panel green lighten-3 z-depth-0 white-text center-align">
					Date et horaire
				</div>
				<div class="row">
					<div class="green lighten-5 z-depth-0 col s10 offset-s1">
						<div class="row">
							<div class="input-field col s5 offset-s6" id="ligneGoAndBack">
								<input type="checkbox" name="goAndBack" id="goAndBack">
								<label for="goAndBack">Trajet aller-retour</label>
							</div>
						</div>
						<div class="row valign-wrapper">
							<div class="input-field col s7 valign">
								<input type="date" class="datepicker" value="Date aller">   
							</div>
							<div class="input-field col s2 valign right-align">
								<select id="goDateHour" name="goDateHour">
									<option value="1">01</option>
									<option value="2">02</option>
									<option value="3">03</option>
									<option value="4">04</option>
									<option value="5">05</option>
									<option value="6">06</option>
									<option value="7">07</option>
									<option value="8">08</option>
									<option value="9">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
								</select>
							</div>							
							<span class="col s1">:</span>
							<div class="input-field col s2 valign right-align">
								<select id="goDateMinute" name="goDateMinute">
									<option value="0">00</option>
									<option value="5">05</option>
									<option value="10">10</option>
									<option value="15">15</option>
									<option value="20">20</option>
									<option value="25">25</option>
									<option value="30">30</option>
									<option value="35">35</option>
									<option value="40">40</option>
									<option value="45">45</option>
									<option value="50">50</option>
									<option value="55">55</option>
								</select>
							</div>
						</div>
					</div>
				</div>
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
		<div class="col s12 m6 l6">
			<h2>Votre itinéraire</h2>
			<div id="map" style="width:400px;height:400px;"></div>
		</div>
	</div>
@endsection