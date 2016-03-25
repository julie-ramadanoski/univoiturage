@extends('index')

@section('content')	<script src="http://maps.google.fr/maps/api/js?key=AIzaSyBwbDVyor_fGiLjXlwAJ9RlDKn9NRDVZag" type="text/javascript"></script>
	<script src="../js/script.js"></script>
	<script>
		
	</script>
	<div class="container-fluid">
		<h2>Publier votre annonce</h2>
		<div class="row" id="r_timeline">
			<div class="col-xs-12 col-sm-6 col-md-3" id="c_timeline">
				<div class="timeline">1</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6">
				<form class="form-horizontal" name="formulaire" id="form" action="addDetails" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label class="radio-inline">
							<input type="radio" name="fromUniv" id="fromUniversity" value="on" checked="checked"> De l'université
						</label>
						<label class="radio-inline">
							<input type="radio" name="fromUniv" id="toUniversity" value="off"> Vers l'université
						</label>
						<label class="radio-inline">
							<input type="radio" name="car" id="car" value="on" checked="checked"> Voiture
						</label>
						<label class="radio-inline">
							<input type="radio" name="car" id="moto" value="of"> Moto
						</label>
					</div>
					<h3> Votre itinéraire </h3>
					<div class="form-group">
						<label for="from" class="col-sm-2 control-label">Point de départ</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="from" placeholder="Point de départ" name="from">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-3 col-sm-offset-4 col-md-offset-4">
							<button type="button" class="btn btn-default btn-block" id="switch">
								<span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
							</button>
						</div>
					</div>
					<div class="form-group">
						<label for="to" class="col-sm-2 control-label">Point d'arrivée</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="to" placeholder="Point d'arrivée" name="to">
							
						</div>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" value="on" name="highway" id="highway">
							Trajet empruntant l'autoroute
						</label>
					</div>
					<h4>Villes étapes</h4>
					<p>Augmentez vos chances d'avoir des passagers</p>
					<div id="stepZone">
						
					</div>
					<input type="hidden" name="distance[]">
					<button type="button" id="addStep" class="btn btn-default">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
						Ajouter une etape
					</button>
					<h3>Date et horraire</h3>
					<div class="form-group">
						<label class="col-xs-12 col-sm-6 col-md-3 col-sm-offset-6 col-md-offset-9">
							<input type="checkbox" value="on" name="round-trip" id="round-trip" checked="checked">
							Trajet Aller-Retour
						</label>
					</div>
					<div class="form-group">
						<label class="col-md-2" for="goDate">
							Date de départ
						</label>
						<input type="date" name="goDate" id="goDate" class="col-md-4">
						<div class="col-md-2"></div>
						<select class="col-md-1" name="goHour" id="goHour">
							<option value="1">01</option>
						</select>
						<div class="col-md-1">h</div>
						<select class="col-md-1" name="goMinute" id="goMinute">
							<option value="0">00</option>
						</select>
					</div>
					<div class="form-group" id="backDiv">
						<label class="col-md-2" for="backDate">
							Date d'arrivée
						</label>
						<input type="date" name="backDate" id="backDate" class="col-md-4">
						<div class="col-md-2"></div>
						<select class="col-md-1" name="backHour" id="backHour">
							<option value="1">01</option>
						</select>
						<div class="col-md-1">h</div>
						<select class="col-md-1" name="backMinute" id="backMinute">
							<option value="0">00</option>
						</select>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-3 col-sm-offset-4 col-md-offset-4">
							<button type="submit" class="btn btn-primary btn-block" id="switch">
								Continuer
							</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6">
				<div id="map" style="width:400px;height:400px"></div>
			</div>
		</div>
	</div>
@endsection