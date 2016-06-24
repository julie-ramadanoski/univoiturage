@extends('recherche') {{-- on etend le layout de base --}}
@section('content')	{{-- on prend place dans la section content --}}

	{{-- on inclut google map avec notre clé --}}
	{{-- <script src="http://maps.google.fr/maps/api/js?key=AIzaSyBwbDVyor_fGiLjXlwAJ9RlDKn9NRDVZag" type="text/javascript"></script> --}}

	{{-- on inclut notre script JS pour gerer google map et les étapes --}}
	<script src="{{ URL::asset('/js/script.js') }}"></script>
	<script src="{{ URL::asset('/js/chosen.jquery.js') }}"></script>
	{{-- <script src="{{ URL::asset('/js/chosen.proto.min.js') }}"></script> --}}

	<h2>Publier votre annonce</h2>
		{{-- form --}}
	<form class="form-horizontal" name="formulaire" id="form" action="{{ url('/trajet/itineraire') }}" method="post" autocomplete="off">
		
		

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
	</form>
@endsection
