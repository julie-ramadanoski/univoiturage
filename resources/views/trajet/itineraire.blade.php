@extends('recherche') {{-- on etend le layout de base --}}
@section('content')	{{-- on prend place dans la section content --}}

	{{-- on inclut google map avec notre clé --}}
	{{-- <script src="http://maps.google.fr/maps/api/js?key=AIzaSyBwbDVyor_fGiLjXlwAJ9RlDKn9NRDVZag" type="text/javascript"></script> --}}

	{{-- on inclut notre script JS pour gerer google map et les étapes --}}
	<script src="{{ URL::asset('/js/script.js') }}"></script>

	<h2>Publier votre annonce</h2>
	<form name="add-travel" id="add-travel-form" action="{{ url('/trajet/itineraire') }}" method="post" autocomplete="off">
		{{-- main adresses container --}}
		<div class="inputs-wrapper row main-adress-wrapper">
			{{-- Start adress --}}
			<div class="input-container xs-12" data-autocomplete="true">
				<label for="startCityInput" class="input-label">Adresse de départ</label>
				<input type="text" name="startCity"   class="input --hidden --city"  data-valid="false">
				<input type="text" name="startPostal" class="input --hidden --postal">
				<input type="text" name="startAdress" class="input --autocomplete" id="startCityInput" placeholder="Ville de départ"> 
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
			</div>
			{{-- End adress --}}
			<div class="input-container xs-12" data-autocomplete="true">
				<label for="endCityInput" class="input-label">Adresse d'arrivée</label>
				<input type="text" name="endCity"   class="input --hidden --city" data-valid="false">
				<input type="text" name="endPostal" class="input --hidden --postal">
				<input type="text" name="endAdress" class="input --autocomplete" id="endCityInput" placeholder="Ville d'arrivée">
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> 
			</div>
		</div>
		{{-- steps container --}}
		<div class="inputs-wrapper row">
			<div class="xs-12">
				<span class="input-label">Villes étapes</span>
				<p class="input-container-desc">
					Ces étapes sont facultatives mais permettent de prendre plus de passagers. <br>
					Trajet limité à 4 étapes.
				</p>
				<div class="input-container step-container" data-autocomplete="true" data-show="true">
					<label for="step1" class="input-label">Etape 1</label>
					<input type="text" name="step1City"   class="input --hidden --city" data-valid="false">
					<input type="text" name="step1Postal" class="input --hidden --postal">
					<input type="text" name="step1Adress" class="input --autocomplete" id="step1">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
					<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
				</div>
				<div class="input-container step-container" data-autocomplete="true" data-show="false">
					<label for="step2" class="input-label">Etape 2</label>
					<input type="text" name="step2City"   class="input --hidden --city" data-valid="false">
					<input type="text" name="step2Postal" class="input --hidden --postal">
					<input type="text" name="step2Adress" class="input --autocomplete" id="step2">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
					<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
				</div>
				<div class="input-container step-container" data-autocomplete="true" data-show="false">
					<label for="step3" class="input-label">Etape 3</label>
					<input type="text" name="step3City"   class="input --hidden --city" data-valid="false">
					<input type="text" name="step3Postal" class="input --hidden --postal">
					<input type="text" name="step3Adress" class="input --autocomplete" id="step3">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
					<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
				</div>
				<div class="input-container step-container" data-autocomplete="true" data-show="false">
					<label for="step4" class="input-label">Etape 4</label>
					<input type="text" name="step4City"   class="input --hidden --city" data-valid="false">
					<input type="text" name="step4Postal" class="input --hidden --postal">
					<input type="text" name="step4Adress" class="input --autocomplete" id="step4">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
					<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
				</div>
				<div class="row add-step__container">
					<button class="btn btn-primary xs-12 sm-4 off-sm-4 add-travel-button" type="button" id="addStepButton" data-show="true">
						Ajouter une étape
					</button>
				</div>
			</div>
		</div>
		{{-- map container --}}
		<div class="inputs-wrapper row radio-wrapper">
			<p class="input-label">Trajet proposé</p>
			<div id="map" style="width: 100%; height: 400px;"></div>
			<div class="input-container xs-12">
				<span class="input-label">Je passe par l'autoroute</span>
				<div class="row radio-container">
					<input type="radio" name="highway" id="yesHighway" value="yes" checked>
					<label for="yesHighway" class="radio-label xs-6">Oui</label>
					<input type="radio" name="highway" id="noHighway" value="no">
					<label for="noHighway" class="radio-label xs-6">Non</label>
				</div>
			</div>
		</div>
		{{-- date container --}}
		<div class="inputs-wrapper">
			<div class="input-container">
				<label for="date" class="input-label">Date et heure de départ (jj/mm/yyyy) </label>
				<div class="row">
					<input type="text" id="date" name="date" class="xs-12 sm-6 text-center" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}" required>
					<span class="xs-1 text-center">à</span>
					<input type="text" name="hour" class="xs-2 text-center" pattern="[0-9]{2}" required>
					<span class="xs-1 text-center">:</span>
					<input type="text" name="minute" class="xs-2 text-center" pattern="[0-9]{2}" required>
				</div>
			</div>
		</div>
		{{-- prices container --}}
		<div class="inputs-wrapper">
			<div class="input-container">
				<p class="input-label">Prix proposés</p>
			</div>
		</div>
		{{-- options container --}}
		<div class="inputs-wrapper radio-wrapper row">
			<div class="input-container xs-12">
				<span class="input-label">Véhicule utilisé</span>
				<div class="row radio-container">
					<input type="radio" name="usedCar" id="no-usedCar" value="-1" checked>
					<label for="no-usedCar" class="radio-label xs-6 sm-3">Non renseigné</label>
				</div>
			</div>
			<div class="input-container xs-12">
				<span class="input-label">Type de véhicule</span>
				<div class="row radio-container">
					<input type="radio" name="vehicle" id="moto" value="moto" checked>
					<label for="moto" class="radio-label xs-6 sm-3">Moto</label>
					<input type="radio" name="vehicle" id="voiture" value="voiture">
					<label for="voiture" class="radio-label xs-6 sm-3">Voiture</label>
				</div>
			</div>
			<div class="input-container xs-12">
				<span class="input-label">Nombre de passagers</span>
				<div class="row radio-container">
					<input type="radio" name="place" id="place1" value="1" checked>
					<label for="place1" class="radio-label xs-2">1</label>
					<input type="radio" name="place" id="place2" value="2">
					<label for="place2" class="radio-label xs-2">2</label>
					<input type="radio" name="place" id="place3" value="3">
					<label for="place3" class="radio-label xs-2">3</label>
					<input type="radio" name="place" id="place4" value="4">
					<label for="place4" class="radio-label xs-2">4</label>
					<input type="radio" name="place" id="place5" value="5">
					<label for="place5" class="radio-label xs-2">5</label>
					<input type="radio" name="place" id="place6" value="6">
					<label for="place6" class="radio-label xs-2">6</label>
				</div>
			</div>
			<div class="input-container xs-12">
				<span class="input-label">Bagages</span>
				<div class="row radio-container">
					<input type="radio" name="luggage" id="no-luggage" value="0" checked>
					<label for="no-luggage" class="radio-label xs-6 sm-3">Aucun bagage</label>
					<input type="radio" name="luggage" id="sm-luggage" value="1">
					<label for="sm-luggage" class="radio-label xs-6 sm-3">Petits bagages</label>
					<input type="radio" name="luggage" id="md-luggage" value="2">
					<label for="md-luggage" class="radio-label xs-6 sm-3">Moyens bagages</label>
					<input type="radio" name="luggage" id="lg-luggage" value="3">
					<label for="lg-luggage" class="radio-label xs-6 sm-3">Grands bagages</label>
				</div>
			</div>
			<div class="input-container xs-12">
				<span class="input-label">Détours accepté</span>
				<div class="row radio-container">
					<input type="radio" name="detour" id="no-detour" value="0" checked>
					<label for="no-detour" class="radio-label xs-3">0 KM</label>
					<input type="radio" name="detour" id="sm-detour" value="1">
					<label for="sm-detour" class="radio-label xs-3">1 KM</label>
					<input type="radio" name="detour" id="md-detour" value="2">
					<label for="md-detour" class="radio-label xs-3">5 KM</label>
					<input type="radio" name="detour" id="lg-detour" value="2">
					<label for="lg-detour" class="radio-label xs-3">10 KM</label>
				</div>
			</div>
			<div class="input-container xs-12">
				<span class="input-label">Retard possible sur l'heure de départ</span>
				<div class="row radio-container">
					<input type="radio" name="late" id="no-late" value="0" checked>
					<label for="no-late" class="radio-label xs-4">0 min</label>
					<input type="radio" name="late" id="sm-late" value="1">
					<label for="sm-late" class="radio-label xs-4">5 min</label>
					<input type="radio" name="late" id="md-late" value="2">
					<label for="md-late" class="radio-label xs-4">10 min</label>
				</div>
			</div>
		</div>
		{{-- cgu container --}}
		<div class="inputs-wrapper row">
			<div class="input-container xs-12">
				<span class="input-label">
					j'ai lu et approuvé <a href="#" class="cgu_link">Conditions Générales d'Utilisation</a>
				</span>
				<div class="row radio-container">
					<input type="checkbox" name="cgu" id="cgu" value="true" required>
					<label for="cgu" class="radio-label xs-12">
						<span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>
						<span class="glyphicon glyphicon-check" aria-hidden="true"></span>
						Lues et approuvées
					</label>
				</div>
			</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<button class="btn btn-primary xs-12 sm-4 off-sm-4 add-travel-button" type="submit">
				Enregistrer le trajet
			</button>
		</div>

		<!--
		<div class="fieldset">
    <legend class="add-path__section__title">Quand allez-vous partir ?</legend>
    <div class="row input-container">
      <label for="date" class="">
        Date de départ (jj/mm/aaaa) :
      </label>
      <div class="row">
      <input type="text" id="date" name="date" class="xs-6 text-center" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}" required>
      <span class="xs-1 text-center">à</span>
      <input type="text" name="hour" class="xs-2 text-center" pattern="[0-9]{2}" required>
      <span class="xs-1 text-center">:</span>
      <input type="text" name="minute" class="xs-2 text-center" pattern="[0-9]{2}" required>
      </div>
    </div>
  </div>

		<div class="fieldset">
		<legend class="add-path__section__title">Je vous dépose ?</legend>
		<div class="row step__container" data-show="true">
		  <div class="step__container__del-button">X</div>
		  <div class="input-container xs-12 sm-6 off-sm-3" data-autocomplete="true">
		    <label for="step1CityInput">la première étape de mon trajet :</label>
		    <input type="text" name="step1City" class="input--city-name" data-valid="false">
		    <input type="text" name="step1CP" class="input--postal-code">
		    <input type="text" class="input--autocomplete" id="step1CityInput" placeholder="Ville-étape n°1" > 
		  </div>
		</div>
		<div class="row step__container" data-show="false">
		  <div class="step__container__del-button">X</div>
		  <div class="input-container xs-12 sm-6 off-sm-3" data-autocomplete="true">
		    <label for="step2CityInput">la deuxième étape de mon trajet :</label>
		    <input type="text" name="step2City" class="input--city-name" data-valid="false">
		    <input type="text" name="step2CP" class="input--postal-code">
		    <input type="text" class="input--autocomplete" id="step2CityInput" placeholder="Ville-étape n°2"> 
		  </div>
		</div>
		<div class="row step__container" data-show="false">
		  <div class="step__container__del-button">X</div>
		  <div class="input-container xs-12 sm-6 off-sm-3" data-autocomplete="true">
		    <label for="step3CityInput">la troisième étape de mon trajet :</label>
		    <input type="text" name="step3City" class="input--city-name" data-valid="false">
		    <input type="text" name="step3CP" class="input--postal-code">
		    <input type="text" class="input--autocomplete" id="step3CityInput" placeholder="Ville-étape n°3"> 
		  </div>
		</div>
		<div class="row step__container" data-show="false">
		  <div class="step__container__del-button">X</div>
		  <div class="input-container xs-12 sm-6 off-sm-3" data-autocomplete="true">
		    <label for="step4CityInput">la quatrième étape de mon trajet :</label>
		    <input type="text" name="step4City" class="input--city-name" data-valid="false">
		    <input type="text" name="step4CP" class="input--postal-code">
		    <input type="text" class="input--autocomplete" id="step4CityInput" placeholder="Ville-étape n°4"> 
		  </div>
		</div>
		<div class="row add-step__container">
		  <button class="btn btn-primary xs-12 off-xs-1 sm-4 off-sm-4" type="button" id="addStepButton">
		    Ajouter une étape
		  </button>
		</div>
		</div>
		<div class="fieldset">
		<legend class="add-path__section__title">Vous allez donc passer par là :</legend>
		<small>Cette carte n'est ici qu'à titre d'informations, vous passez où vous voulez bien sûr.</small>
		<div id="map"></div>
		</div>
		<div class="fieldset">
		<legend class="add-path__section__title">Quand allez-vous partir ?</legend>
		<div class="row input-container">
		  <label for="date" class="">
		    Date de départ (jj/mm/aaaa) :
		  </label>
		  <div class="row">
		  <input type="text" id="date" name="date" class="xs-6 text-center" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}" required>
		  <span class="xs-1 text-center">à</span>
		  <input type="text" name="hour" class="xs-2 text-center" pattern="[0-9]{2}" required>
		  <span class="xs-1 text-center">:</span>
		  <input type="text" name="minute" class="xs-2 text-center" pattern="[0-9]{2}" required>
		  </div>
		</div>
		</div>
		<div class="fieldset">
		<legend class="add-path__section__title">Résumons les distances et les prix, voulez-vous ?</legend>
		<p>Cette partie n'est pas encore opérationelle, mais le sera bientot</p>
		</div>
		<div class="inputs-wrapper row">
		<div class="input-container xs-12">
		  <span class="input-label">Véhicule utilisé</span>
		  <div class="row radio-container">
		    <input type="radio" name="usedCar" id="no-usedCar" value="-1" checked>
		    <label for="no-usedCar" class="radio-label xs-6 sm-3">Non renseigné</label>
		    <input type="radio" name="usedCar" id="usedCar0" value="0">
		    <label for="usedCar0" class="radio-label xs-6 sm-3">Citroën C3</label>
		    <input type="radio" name="usedCar" id="usedCar1" value="1">
		    <label for="usedCar1" class="radio-label xs-6 sm-3">Honda civique</label>
		    <input type="radio" name="usedCar" id="usedCar2" value="2">
		    <label for="usedCar2" class="radio-label xs-6 sm-3">Ferrari</label>
		    <input type="radio" name="usedCar" id="usedCar3" value="3">
		    <label for="usedCar3" class="radio-label xs-6 sm-3">Grand C4 picasso</label>
		  </div>
		</div>
		<div class="input-container xs-12">
		  <span class="input-label">Type de véhicule</span>
		  <div class="row radio-container">
		    <input type="radio" name="vehicle" id="moto" value="moto" checked>
		    <label for="moto" class="radio-label xs-6 sm-3">Moto</label>
		    <input type="radio" name="vehicle" id="voiture" value="voiture">
		    <label for="voiture" class="radio-label xs-6 sm-3">Voiture</label>
		  </div>
		</div>
		<div class="input-container xs-12">
		  <span class="input-label">Nombre de passagers</span>
		  <div class="row radio-container">
		    <input type="radio" name="place" id="place1" value="1" checked>
		    <label for="place1" class="radio-label xs-2">1</label>
		    <input type="radio" name="place" id="place2" value="2">
		    <label for="place2" class="radio-label xs-2">2</label>
		    <input type="radio" name="place" id="place3" value="3">
		    <label for="place3" class="radio-label xs-2">3</label>
		    <input type="radio" name="place" id="place4" value="4">
		    <label for="place4" class="radio-label xs-2">4</label>
		    <input type="radio" name="place" id="place5" value="5">
		    <label for="place5" class="radio-label xs-2">5</label>
		    <input type="radio" name="place" id="place6" value="6">
		    <label for="place6" class="radio-label xs-2">6</label>
		  </div>
		</div>
		<div class="input-container xs-12">
		  <span class="input-label">Bagages</span>
		  <div class="row radio-container">
		    <input type="radio" name="luggage" id="no-luggage" value="0" checked>
		    <label for="no-luggage" class="radio-label xs-6 sm-3">Aucun bagage</label>
		    <input type="radio" name="luggage" id="sm-luggage" value="1">
		    <label for="sm-luggage" class="radio-label xs-6 sm-3">Petits bagages</label>
		    <input type="radio" name="luggage" id="md-luggage" value="2">
		    <label for="md-luggage" class="radio-label xs-6 sm-3">Moyens bagages</label>
		    <input type="radio" name="luggage" id="lg-luggage" value="3">
		    <label for="lg-luggage" class="radio-label xs-6 sm-3">Grands bagages</label>
		  </div>
		</div>
		<div class="input-container xs-12">
		  <span class="input-label">Détours accepté</span>
		  <div class="row radio-container">
		    <input type="radio" name="detour" id="no-detour" value="0" checked>
		    <label for="no-detour" class="radio-label xs-3">0 KM</label>
		    <input type="radio" name="detour" id="sm-detour" value="1">
		    <label for="sm-detour" class="radio-label xs-3">1 KM</label>
		    <input type="radio" name="detour" id="md-detour" value="2">
		    <label for="md-detour" class="radio-label xs-3">5 KM</label>
		    <input type="radio" name="detour" id="lg-detour" value="2">
		    <label for="lg-detour" class="radio-label xs-3">10 KM</label>
		  </div>
		</div>
		<div class="input-container xs-12">
		  <span class="input-label">Retard sur l'heure de départ possible</span>
		  <div class="row radio-container">
		    <input type="radio" name="late" id="no-late" value="0" checked>
		    <label for="no-late" class="radio-label xs-4">0 min</label>
		    <input type="radio" name="late" id="sm-late" value="1">
		    <label for="sm-late" class="radio-label xs-4">5 min</label>
		    <input type="radio" name="late" id="md-late" value="2">
		    <label for="md-late" class="radio-label xs-4">10 min</label>
		  </div>
		</div>
		</div>
		<div class="inputs-wrapper row">
		<div class="input-container xs-12">
		  <span class="input-label">j'ai lu et approuvé
		    <a href="#" class="cgu_link">Conditions Générales d'Utilisation</a>
		  </span>
		  <div class="row radio-container">
		    <input type="checkbox" name="cgu" id="cgu" value="true" required>
		    <label for="cgu" class="radio-label xs-12">Lues et approuvées</label>
		  </div>
		</div>
		</div>
		<div class="fieldset">
		<legend class="add-path__section__title">Validation</legend>
		<label for="cgu">
		  J'ai lu et j'accepte les conditions d'utilisation
		</label>
		<input type="checkbox" name="cgu" required id="cgu">
		<div class="row">
		  <button class="btn btn-primary xs-12 off-xs-1 sm-4 off-sm-4" type="submit" id="addStepButton">
		    Enregistrer le trajet
		  </button>
		</div>
		</div>
		</form>-->

<!-- include google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwbDVyor_fGiLjXlwAJ9RlDKn9NRDVZag&signed_in=true&libraries=places&callback=init" async defer></script>
		
		<!--
		{{-- form part : start point and end point --}}
		<fieldset class="form_part">
			<legend>Lieu de départ et d'arrivée</legend>
			<div class="input_container">
				<label for="start-point">Adresse de départ :</label>
				<input type="text" placeholder="adresse de départ" name="startAdress" class="adress-input" id="start-point">
				<input type="text" placeholder="code postal"       name="startCP"     class="cp-input"   required>
				<input type="text" placeholder="ville de depart"   name="startCity"   class="city-input" required>
				<select id="start" data-placeholder="Choose a country..." class="chosen_select" name="start" style="width:150px;">
					<option value="1">mareuil</option>
					<option value="2">ay</option>
					<option value="3">reims</option>
					<option value="4">paris</option>
				</select>
			</div>

			<div class="input_container">
				<label for="end-point">Adresse d'arrivée :</label>
				<input type="text" placeholder="adresse d'arrivée" name="endAdress" class="adress-input" id="end-point">
				<input type="text" placeholder="code postal"       name="endCP" 	class="cp-input"   required>
				<input type="text" placeholder="ville d'arrivée"   name="endCity" 	class="city-input" required>
			</div>
		</fieldset>

		{{-- form part : steps --}}
		<fieldset class="form_part">
			<legend>Les étapes de votre trajet</legend>
			<div class="steps_container">
				<div class="input_container">
					<label for="step-point-1">Etape :</label>
					<input type="text" placeholder="lieu d'étape" name="stepAdress[]" class="adress-input" id="step-point-1">
					<input type="text" placeholder="code postal"  name="stepCP[]" 	  class="cp-input">
					<input type="text" placeholder="ville étape"  name="stepCity[]"   class="city-input">
				</div>
			</div>
			<div class="add-button_container">
				<button type="button" class="add-button">Ajouter une étape</button>
			</div>
		</fieldset>

		{{-- form part : departure date --}}
		<fieldset class="form_part">
			<legend>Date de départ</legend>
			<div class="input_container input_container-date">
				<input type="date"   placeholder="Date de départ (jj/mm/aaaa)"   name="date"   class="date-input"   required>
				<input type="number" placeholder="Heure de départ"  			 name="hour"   class="number-input" required>
				<input type="number" placeholder="Minute de départ" 			 name="minute" class="number-input" required>
			</div>
		</fieldset>

		{{-- form part : steps price --}}
		<fieldset class="form_part">
			<legend>Participation financière des voyageurs</legend>
			<p>
				Not implemented yet, this travel is free.
			</p>
		</fieldset>

		{{-- form part : details--}}
		<fieldset class="form_part">
			<legend>Détails supplémentaires</legend>
			<p>
				Not implemented yet, we will consider that your travel as no description, accept small luggage, and you don't accept late or detour.
			</p>
		</fieldset>

		{{-- form part : token, hiddens, cgu accepted and submit button --}}
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<label for="cgu">J'accepte les conditions d'utilisation</label>
		<input type="checkbox" required id="cgu">
		<input type="submit" value="Valider ce trajet">
	-->

	</form>
@endsection
