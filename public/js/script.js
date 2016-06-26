/*----------------------------------------------------------------------------------------------*/
googleObjects = { //Objets google
	map : null,
	directionsService : null,
	directionsDisplay : null,
	geocoder : null,
	startOptions : {zoom: 6, center: {lat: 44.9391495, lng: 4.1430941}}
};

highway = false;

/* Object which takes care of autocomplete */
function Autocompleter(container) {
	this.container         = container;
	this.autocompleteInput = container.querySelectorAll('.input.--autocomplete')[0];
	this.cityNameInput     = container.querySelectorAll('.input.--city')[0];
	this.postalCodeInput   = container.querySelectorAll('.input.--postal')[0];
	this.autocomplete      = new google.maps.places.Autocomplete(this.autocompleteInput, {componentRestrictions: {country: 'fr'}});

	this.autocompleteInput.addEventListener('keyDown', this.emptyContainer.bond(this));

	this.fillInput = function(){
		var place = this.autocomplete.getPlace();
		// Input for the city's name
		var city = false;
		var c = place.address_components.length;
		for(var i=0; i<c; i++){
			if(place.address_components[i].types.length >= 1 && (
				place.address_components[i].types[0] == "locality" || 
				place.address_components[i].types[1] == "locality" )
			){
				city = place.address_components[i].short_name;
			}
		}
		this.cityNameInput.value=city;
		this.cityNameInput.dataset.valid = true;

		//Input for the city's postal code
		var cp = false;
		var k = place.address_components.length;
		for(var i=0; i<k; i++){
			if(place.address_components[i].types.length >= 1 && 
				place.address_components[i].types[0] == "postal_code"){
				cp = place.address_components[i].short_name;
			}
		}
		this.postalCodeInput.value = cp;

		displayPath();
	};

	this.emptyContainer = function(){
		this.cityNameInput.value="";
		this.postalCodeInput.value="";
		displayPath();
	}

	google.maps.event.addListener(this.autocomplete, 'place_changed', this.fillInput.bind(this));
}

function createAutocomplete() {
	//get all the autocomplete-able input
	var input_containers = document.querySelectorAll('[data-autocomplete=\'true\']');
	var c = input_containers.length;
	var autocompleters = [];
	for(var i = 0; i < c; i++){
		autocompleters.push(new Autocompleter(input_containers[i]));
	}
}

function createAddStep(){
	var addStepButton = document.getElementById('addStepButton');
	addStepButton.addEventListener('click', function(event){
	  var stepsInputs = document.getElementsByClassName('step-container');
	  var l = stepsInputs.length;
	  for(var i = 0; i < l; i++){
	    if(stepsInputs[i].dataset.show == "false"){
	      stepsInputs[i].dataset.show = true;
	      if( i == l-1 ){
	        this.dataset.show = "false";
	      }
	      break;
	    }
	  }
	});

	var delStepButtons = document.getElementsByClassName("step__container__del-button");
	var k = delStepButtons.length;
	for(var j = 0; j < k; j++){
	  delStepButtons[j].addEventListener('click', function(){
	    var parent = this.parentElement;
	    parent.dataset.show = "false";
	    var inputs = parent.getElementsByTagName('input');
	    var c = inputs.length;
	    for(var m = 0; m < c; m++){
	      inputs[m].value = "";
	      if(inputs[m].dataset.valid){
	        inputs[m].dataset.valid = "false";
	      }
	    }
	    addStepButton.dataset.show = "true";
	  })
	}
}



//use the map and the inputs to display the path on the map
function displayPath(){
	var startAdress = document.getElementsByName('startAdress')[0].value;

	var endAdress = document.getElementsByName('endAdress')[0].value;

	if(startAdress != "" && endAdress != ""){

		var options = { //Création des options de recherche de trajet
			origin: startAdress,
			destination: endAdress,
			travelMode: google.maps.TravelMode.DRIVING,
			unitSystem: google.maps.UnitSystem.METRIC,
			region : 'FR',
			waypoints: setupWaypoints(),
			avoidHighways : highway
		};

		//ask google for create the way
		googleObjects.directionsService.route(options, function(response, status) {
			if (status === google.maps.DirectionsStatus.OK) {
				//if he can create a way, set it and display it.
				googleObjects.directionsDisplay.setDirections(response);
			} else {
				console.log("Une erreur s'est produite :" + status);
			}
		});
	}
}

//create a, array of steps, ready to be used by google
function setupWaypoints(){
	var waypoints = [];
	var slugs = ['step1', 'step2', 'step3', 'step4'];
	var c = slugs.length;
	for(var i = 0; i<c; i++){
		var city =  document.getElementsByName(slugs[i]+'City')[0].value;
		if(city == ""){
			break;
		} else {
			var adress = document.getElementsByName(slugs[i]+'Adress')[0].value;
			if(adress != ""){
				waypoints.push({location:adress});
			}
		}
	}
	return waypoints;			
}

/* Fonction de maj des distances */
/* trggered when google updates the map */
updateDistances = function(legs){
	return;
	var distanceInputs 	= document.getElementsByName("dists[]");
	var dureeInputs 	= document.getElementsByName("durations[]"); 
	var priceInputs 	= document.getElementsByName("prices[]");

	var distances = legs; //Toutes les distances, dans l'ordre du trajet
	var totalDistance = 0;
	var totalDuree = 0;
	var totalPrice = 0;

	var c = distances.length;
	//Pour chaque donnée

	distanceInputs[0].value = 0;
	dureeInputs[0].value 	= 0;
	priceInputs[0].value 	= 0;

	for(var i = 0; i<c; i++){
		/* pick the +1 input because the first is for the from input, and doesn't have to have value */
		if(textInputs[i+1].value.length > 0){
			distanceInputs[i+1].value = parseInt((distances[i].distance.value)/1000);
			dureeInputs[i+1].value 	= parseInt((distances[i].duration.value));
			priceInputs[i+1].value 	= parseInt((distances[i].distance.value)/1000*0.04);
		}

		totalDistance += parseInt(distances[i].distance.value);
		totalDuree += parseInt(distances[i].duration.value);
		totalPrice += parseInt(distances[i].distance.value/1000*0.04);
	}

	console.log(distances);

	_n('totalDistance')[0].value = totalDistance; //display values in hidden input, for the next page
	_n('totalDuree')[0].value = totalDuree;
	_n('totalPrice')[0].value = totalPrice;
};

function createHighwayWatcher(){
	document.querySelector('[for="yesHighway"]').addEventListener('click',function(event){
		highway = false;
		displayPath();
	});
	document.querySelector('[for="noHighway"]').addEventListener('click',function(event){
		highway = true;
		displayPath();
	});
}

/* called when google map API is loaded*/
init = function(event){
	// create all the autocomplete systems
	createAutocomplete();
	// create the step system
	createAddStep();
	// create highway watcher
	createHighwayWatcher();

	/* Creating Google's objects */
	googleObjects.map 				= new google.maps.Map(document.getElementById('map'),googleObjects.startOptions);
	googleObjects.directionsService = new google.maps.DirectionsService;
	googleObjects.directionsDisplay = new google.maps.DirectionsRenderer({map: googleObjects.map});
	googleObjects.geocoder 			= new google.maps.Geocoder();

	/* Trigger updateDistances when the map display a new path */
	googleObjects.directionsDisplay.addListener('directions_changed', function() {
		updateDistances(googleObjects.directionsDisplay.getDirections().routes[0].legs);
	});
};