/*----------------------------------------------------------------------------------------------*/
googleObjects = { //Objets google
	map : null,
	directionsService : null,
	directionsDisplay : null,
	geocoder : null,
	startOptions : {zoom: 6, center: {lat: 45, lng: 0}}
};

trajet = {
	start : "",
	end : "",
	roundTrip : false,
	highway : false 		//Booleen représentant si oui ou non le trajet passe par une autoroute
};

/* fonction d'initialisation, lancée au chargement de la page */
init = function(event){
	/* Création des objets google map */
	googleObjects.map 				= new google.maps.Map(document.getElementById('map'),googleObjects.startOptions);
	googleObjects.directionsService = new google.maps.DirectionsService;
	googleObjects.directionsDisplay = new google.maps.DirectionsRenderer({map: googleObjects.map});
	googleObjects.geocoder 			= new google.maps.Geocoder();

	/* Evenement de changement de trajet sur la carte */
	googleObjects.directionsDisplay.addListener('directions_changed', function() {
		updateDistances(googleObjects.directionsDisplay.getDirections().routes[0].legs);
	});

	/* Création des écouteurs */
	callbackWhenInputChange(_id("from"),updateTrajet);
	callbackWhenInputChange(_id("to"),updateTrajet);
	callbackWhenInputChange(_id("highway"),updateTrajet);

	/* creation des datepicker */
	$("#goDate").datepicker();

	/* ecouteur sur l'ajout d'un etape */
	_id("add-step").addEventListener("click",addStepInput);

	/* Ajout d'une étape vide */
	addStepInput();
	updateTrajet();
};

/* fonction qui apelle un callback quand l'input en parametre subit un changement */
/* le callback reçoit pour parametre l'état de l'input */
callbackWhenInputChange = function(input, callback){
	if( input.type == "checkbox"){Events.addEvent(input,"change",function(event){callback(input.checked);});}
	else if(input.type == "radio"){
		var radios = _n(input.name);
		for(var i = 0; i<radios.length;  i++){
			Events.addEvent(radios[i],"change",function(event){callback(input.checked);});
		}
	}
	else{Events.addEvent(input,"keyup",function(event){callback(input.value);});}
}

/* Trace le trajet suivant les informations de l'objet trajet */
updateTrajet = function(){
	// get from and to cities
	var from = _id("from").value;
	var to = _id("to").value;

	// if the two fields are not empty
	if(from != "" && to != ""){
		var options = { //Création des options de recherche de trajet
			origin: from,
			destination: to,
			travelMode: google.maps.TravelMode.DRIVING,
			unitSystem: google.maps.UnitSystem.METRIC,
			region : 'FR',
			avoidHighways : !trajet.highway //péage
		};

		//get all the created steps
		var steps = document.getElementsByClassName("inputStep");

		//if we have some steps to work with
		if(steps.length > 0){
			//create the waypoint array in google option object
			options.waypoints = [];

			//fill it with steps's value
			for(var i = 0; i<steps.length; i++){
				if(steps[i].value != ""){
					options.waypoints.push({location:steps[i].value});
				}
			}
		}

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
};

/* Echange les inputs de départs et d'arrivée, surtout leurs autocomplétion */
switchFromAndTo = function(){
	//TODO
};

/* Fonction d'ajout d'un input d'étape */
addStepInput = function(){
	var inputGroup = _ce("div");
	inputGroup.className = "input-group";

	var inputGroupAddon = _ce("span",inputGroup);
	inputGroupAddon.className="input-group-addon";
	inputGroupAddon.id="sizing-addon2";

	var glyphicon = _ce("span",inputGroupAddon);
	glyphicon.className="glyphicon glyphicon-flag";
	glyphicon['aria-hidden'] = "true";

	var stepInput = _ce("input",inputGroup);
	stepInput.type="text";
	stepInput.className="form-control inputStep";
	stepInput['aria-describedby']="sizing-addon2";
	stepInput.name = "villes[]";

	var buttonGroup = _ce("div",inputGroup);
	buttonGroup.className = "input-group-btn";

	var btnDelete = _ce("button", buttonGroup);
	btnDelete.type="button";
	btnDelete.className="btn btn-default";

	var spanDelete = _ce("span", btnDelete);
	spanDelete.className="glyphicon glyphicon-remove";
	spanDelete['aria-hidden'] = "true";

	var btnTop = _ce("button", buttonGroup);
	btnTop.type="button";
	btnTop.className="btn btn-default";

	var spanTop = _ce("span", btnTop);
	spanTop.className="glyphicon glyphicon-arrow-up";
	spanTop['aria-hidden'] = "true";

	var btnBot = _ce("button", buttonGroup);
	btnBot.type="button";
	btnBot.className="btn btn-default";

	var spanBot = _ce("span", btnBot);
	spanBot.className="glyphicon glyphicon-arrow-down";
	spanBot['aria-hidden'] = "true";

	var distanceInput = _ce("input",inputGroup);
	distanceInput.type="hidden";
	distanceInput.name="distances[]";

	var dureeInput = _ce("input",inputGroup);
	dureeInput.type="hidden";
	dureeInput.name="durees[]";

	var priceInput = _ce("input",inputGroup);
	priceInput.type="hidden";
	priceInput.name="prices[]";

	Events.addEvent(btnDelete,"click",function(event){
		var inputGroup = this.parentElement.parentElement;
		var inputZone = inputGroup.parentElement;
		inputZone.removeChild(inputGroup);
		updateTrajet();
	});

	Events.addEvent(btnTop,"click",function(event){
		var inputGroup = this.parentElement.parentElement;
		var siblingTop = inputGroup.previousSibling;
		if(!siblingTop){return false;}
		var inputZone = inputGroup.parentElement;
		inputZone.insertBefore(inputGroup,siblingTop);
		updateTrajet();
	});

	Events.addEvent(btnBot,"click",function(event){
		var inputGroup = this.parentElement.parentElement;
		var siblingBot = inputGroup.nextSibling;
		if(!siblingBot){return false;}
		var inputZone = inputGroup.parentElement;
		inputZone.insertBefore(siblingBot,inputGroup);
		updateTrajet();
	});

	Events.addEvent(stepInput,"keyup",updateTrajet);

	_id("steps").appendChild(inputGroup);
};

/* Fonction de maj des distances */
/* trggered when google update the map */
updateDistances = function(legs){
	var distanceInputs = document.getElementsByName("distances[]"); //Tous les inputs distances, dans l'ordre du trajet
	var dureeInputs = document.getElementsByName("durees[]"); 
	var priceInputs = document.getElementsByName("prices[]");
	var textInputs = document.getElementsByName("villes[]");

	var distances = legs; //Toutes les distances, dans l'ordre du trajet
	var totalDistance = 0;
	var totalDuree = 0;

	//Pour chaque donnée
	for(var i = 0; i<distances.length; i++){
		/* pick the +1 input because the first is for the from input, and doesn't have to have value */
		if(textInputs[i+1].value.length > 0){
			distanceInputs[i+1].value = parseInt((distances[i].distance.value)/1000);
			dureeInputs[i+1].value 	= parseInt((distances[i].duration.value));
			priceInputs[i+1].value 	= parseInt((distances[i].distance.value)/1000*0.04);
		}

		totalDistance += distances[i].distance.value;
		totalDuree += distances[i].duration.value;
	}

	console.log(distances);

	_n('totalDistance')[0].value = totalDistance; //display values in hidden input, for the next page
	_n('totalDuree')[0].value = totalDuree;
};
window.addEventListener("load",init);