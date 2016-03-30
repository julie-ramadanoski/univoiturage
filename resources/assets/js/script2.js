googleObjects = { //Objets google
	map : null,
	directionsService : null,
	directionsDisplay : null,
	geocoder : null,
	startOptions : {zoom: 6, center: {lat: 45, lng: 0}}
};

fauxObj = {
	propertyF : null
}

init = function(){
	/* Création des objets google map */
	googleObjects.map 				= new google.maps.Map(document.getElementById('map'),googleObjects.startOptions);
	googleObjects.directionsService = new google.maps.DirectionsService;
	googleObjects.directionsDisplay = new google.maps.DirectionsRenderer({map: googleObjects.map});
	googleObjects.geocoder 			= new google.maps.Geocoder();

	/* Evenement de changement de trajet sur la carte */
	googleObjects.directionsDisplay.addListener('directions_changed', function() {
		updateDistances(googleObjects.directionsDisplay.getDirections().routes[0].legs);
	});

	if(trajet.from != "" && trajet.to != ""){
		var options = { //Création des options de recherche de trajet
			origin: trajet.from,
			destination: trajet.to,
			travelMode: google.maps.TravelMode.DRIVING,
			unitSystem: google.maps.UnitSystem.METRIC,
			region : 'FR',
			avoidHighways : !trajet.highway //péage
		};
		var steps = trajet.steps;
		if(steps.length > 0){
			options.waypoints = [];
			for(var i = 0; i<steps.length; i++){
				if(steps[i] != ""){
					options.waypoints.push({location:steps[i]});
				}
			}
		}
		googleObjects.directionsService.route(options, function(response, status) {
			if (status === google.maps.DirectionsStatus.OK) {
				googleObjects.directionsDisplay.setDirections(response);
			} else {
				console.log("Une erreur s'est produite :" + status);
			}
		});
	}

	var priceInputs = _n("price[]");
	for(var i =0; i<priceInputs.length; i++){
		linkVarToInput(fauxObj,"propertyF",priceInputs[i],changePrice);
	}
}

updateDistances = function(legs){
	var distances = legs; //Toutes les distances, dans l'ordre du trajet
	var distanceG = 0;
	var dureeG = 0;
	var co2 = 0;
	for(var i = 0; i<distances.length; i++){
		distanceG += distances[i].distance.value;
		dureeG += distances[i].duration.value;
	}
	distanceG /= 1000;
	_ct(distanceG + " km",_id("distance"));
	var time = getTimeFormat(dureeG);
	var t = time[0]+" h "+time[1];
	id("inputDuree").value="t";
	_ct(t+" m",_id("duree"));
	c02 = 8 * 2.662 * distanceG;
	_ct(Math.floor(c02)/1000 + "kg de CO2", _id("co"));
};

getTimeFormat = function(seconds){
	var time = [];
	var hours = seconds/3600;
	time[0] = Math.floor(hours);
	time[1] = Math.floor((hours - time[0]) * 60);
	return time;
}

/* Lie un input et un propriété d'un objet */
linkVarToInput = function(object,property,input,callback){
	if( input.type == "checkbox"){
		Events.addEvent(input,"change",function(event){
			console.log(input.checked);
			object[property] = input.checked;
			callback(input.checked);
		});
	}
	else if(input.type == "radio"){
		var radios = _n(input.name);
		console.log(radios);
		for(var i = 0; i<radios.length;  i++){
			Events.addEvent(radios[i],"change",function(event){
				console.log(this);
				if(this == input){
					object[property] = input.checked;
				}
				else{
					object[property] = !input.checked;
				}
				callback(input.checked);				
			});
		}
	}
	else if(input.type == "number"){
		Events.addEvent(input,"change",function(event){
			object[property] = input.value;
			callback(input.value);
		});
	}
	else{
		Events.addEvent(input,"keyup",function(event){
			object[property] = input.value;
			callback(input.value);
		});
	}
}

changePrice = function(){
	console.log("coucou");
	var priceInputs = _n("price[]");
	var prix = 0;
	for(var i =0; i<priceInputs.length; i++){
		prix += parseInt(priceInputs[i].value);
	}
	_n('totalPrice')[0].value = prix;
}

window.addEventListener("load",init);