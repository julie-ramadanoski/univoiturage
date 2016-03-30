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
	linkVarToInput(trajet,	"start",	_id("from"),		updateTrajet	);
	linkVarToInput(trajet,	"end",		_id("to"),			updateTrajet	);
	linkVarToInput(trajet,	"highway",	_id("highway"),	updateTrajet	);

	/* test */
	autocomplete = new AutocompleteVille(_id("from"));

	$("#goDate").datepicker();
	$("#backDate").datepicker();

	_id("addStep").addEventListener("click",addStepInput);

	/* Ajout d'une étape vide */
	addStepInput();
	updateTrajet();

};

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
	else{
		Events.addEvent(input,"keyup",function(event){
			object[property] = input.value;
			callback(input.value);
		});
	}
}

/* Trace le trajet suivant les informations de l'objet trajet */
updateTrajet = function(){
	var from = _id("from").value;
	var to = _id("to").value;
	if(from != "" && to != ""){
		var options = { //Création des options de recherche de trajet
			origin: from,
			destination: to,
			travelMode: google.maps.TravelMode.DRIVING,
			unitSystem: google.maps.UnitSystem.METRIC,
			region : 'FR',
			avoidHighways : !trajet.highway //péage
		};
		var steps = document.getElementsByName("steps[]");
		if(steps.length > 0){
			options.waypoints = [];
			for(var i = 0; i<steps.length; i++){
				if(steps[i].value != ""){
					options.waypoints.push({location:steps[i].value});
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
	stepInput.className="form-control";
	stepInput['aria-describedby']="sizing-addon2";
	stepInput.name = "steps[]";

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
	distanceInput.name="distance[]";

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

	_id("stepZone").appendChild(inputGroup);
};

/* Fonction de maj des distances */
updateDistances = function(legs){
	var distanceInput = document.getElementsByName("distance[]"); //Tous les inputs distances, dans l'ordre du trajet
	var distances = legs; //Toutes les distances, dans l'ordre du trajet

	//récupération de la plus petite distance (normalement égales)
	var length = distanceInput.length;
	if(length > distances.length){
		length = distances.length
	};

	//Pour chaque donnée
	for(var i = 0; i<length; i++){
		distanceInput[i].value = parseInt((distances[i].distance.value)/1000);
	}
};

isNull = function(value){
	return (!value || value.trim() == "" || value ==  null);
}

toggleBackDate = function(value){
	if(value){
		_id("backDiv").style.display = "block";
	}else{
		_id("backDiv").style.display = "none";
	}
}

window.addEventListener("load",init);