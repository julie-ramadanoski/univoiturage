@extends('recherche')

@section('content')
	<script src="http://maps.google.fr/maps/api/js?key=AIzaSyBwbDVyor_fGiLjXlwAJ9RlDKn9NRDVZag" type="text/javascript"></script>
	<script src="../js/script2.js"></script>
	<script>
	</script>
	<div class="container-fluid">
		<h2>Publier votre annonce</h2>
		<div class="row" id="r_timeline">
			<div class="col-xs-12 col-sm-6 col-md-3" id="c_timeline">
				<div class="timeline">1-2</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6">
				<form class="form-horizontal" name="formulaire" id="form" action="addTrajet" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<h3> Participation </h3>
					<div id="stepsZone">
						@if(count($ligneSteps) > 0)
							@for($i=0;$i<count($ligneSteps);$i++)
								<div class="ligneStep">
									{{$ligneSteps[$i]["from"]}} -> {{$ligneSteps[$i]["to"]}}
									<input type="number" value="{{$ligneSteps[$i]['price']}}" name="price[]" min="0" max="{{$ligneSteps[$i]['price']}}">
								</div>
							@endfor
						@endif
						<hr>
						<div class="ligneStep">
							{{$ligneSteps[0]["from"]}} -> {{$ligneSteps[count($ligneSteps)-1]["to"]}}
							<input type="number" value="{{$tmp[0]}}" name="totalPrice" min="0" max="{{$tmp[0]}}">
						</div>
					</div>
					{{--*/
						$nbPlaces = 1;
						$max = 1;
						if($data["car"]=="car"){
							$nbPlaces = 3;
							$max = 8;
						}
					/*--}}
					<h3>Nombre de places proposées : <input type="number" name="availablePlaces" min="1" value="{{$nbPlaces}}" max="{{$max}}"></h3>
					<h3>Détails du voyage</h3>
					<textarea name="description"></textarea>
					<input type="submit" value="Continuer">
				</form>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6">
				<div id="map" style="width:400px;height:400px"></div>
			</div>
		</div>
	</div>
@endsection