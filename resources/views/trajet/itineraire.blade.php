@extends('recherche') {{-- on etend le layout de base --}}
@section('content')	{{-- on prend place dans la section content --}}

	{{-- on inclut google map avec notre clé --}}
	<script src="http://maps.google.fr/maps/api/js?key=AIzaSyBwbDVyor_fGiLjXlwAJ9RlDKn9NRDVZag" type="text/javascript"></script>

	{{-- on inclut notre script JS pour gerer google map et les étapes --}}
	<script src="{{ URL::asset('/js/script.js') }}"></script>

	<h2>Publier votre annonce</h2>

	{{-- todo later : timeline --}}

	<div class="row">

		{{-- form --}}
		<div class="col-xs-12 col-sm-12 col-md-6 container-form-itineraire">
			<form class="form-horizontal" name="formulaire" id="form" action="{{ url('/trajet/itineraire') }}" method="post" autocomplete="off">
				
				{{-- token d'authentification --}}
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				{{-- import the fromAndHow section --}}
				@include('trajet.trajet_parts.fromAndHow')
				
				<h3> Votre itinéraire </h3>
				
				{{-- import the itineraire section, and add the etape section in it --}}
				@include('trajet.trajet_parts.itineraire')
				
				<h3>Date et horraire</h3>

				{{-- import the date section --}}
				@include('trajet.trajet_parts.date')

				{{-- data for the database and the next page --}}
				<input type="hidden" name="totalDistance">
				<input type="hidden" name="totalDuree">
				<input type="hidden" name="totalPrice">
						
				<input type="submit" value="Envoyer et Continuer">
			</form>
		</div>

		{{-- map --}}
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div id="map" style="width:400px;height:400px"></div>
		</div>
	</div>
@endsection
