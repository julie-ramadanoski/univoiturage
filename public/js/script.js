/*----------------------------------------------------------------------------------------------*/
googleObjects = { //Objets google
	map : null,
	directionsService : null,
	directionsDisplay : null,
	geocoder : null,
	startOptions : {zoom: 6, center: {lat: 45, lng: 0}}
};

trajet = {
	test : false,
	start : "",
	end : "",
	fromUniversity : true, 	//Booleen représentant si oui ou non le trajet commence d'un site universitaire
	car : true, 			//Booleen représentant si oui ou non une voiture est utilisée
	highway : true, 		//Booleen représentant si oui ou non le trajet passe par une autoroute
	places : 3, 			//Nombre de place proposées
	description : "", 		//Description du voyage
	cgu : false, 			//Accept CGU
	steps : [],				//Etapes
	lastDistance : new Step("")//Distance dernière étape - arrivée
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
	linkVarToInput(trajet,"start",			_id("startInput"),		updateSteps		);
	linkVarToInput(trajet,"end",			_id("endInput"),		updateSteps		);
	linkVarToInput(trajet,"fromUniversity",	_id("fromUniversity"),	switchFromAndTo	);
	linkVarToInput(trajet,"car",			_id("car"),				function(car){if(!car){_id("places").value = 1;}}	);
	linkVarToInput(trajet,"highway",		_id("highways"),		updateSteps	);
	linkVarToInput(trajet,"places",			_id("places"),			function(){/* nothing */}	);
	linkVarToInput(trajet,"description",	_id("description"),		function(){ /* nothing */}	);
	linkVarToInput(trajet,"cgu",			_id("cgu"),				function(){ /* nothing */}	);

	_id("addStep").addEventListener("click",addStepInput);
	_id("confirmation").addEventListener("click",save);

	/* Ajout d'une étape vide */
	addStepInput();

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
	var from = trajet.start;
	var to = trajet.end;
	if(from != "" && to != ""){
		var options = { //Création des options de recherche de trajet
			origin: from,
			destination: to,
			travelMode: google.maps.TravelMode.DRIVING,
			unitSystem: google.maps.UnitSystem.METRIC,
			region : 'FR',
			avoidHighways : !trajet.highway //péage
		};
		if(trajet.steps.length > 0){
			options.waypoints = [];
			for(var i = 0; i<trajet.steps.length; i++){
				if(trajet.steps[i].point != ""){
					options.waypoints.push({location:trajet.steps[i].point});
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
	/* Création d'un li, avec un input*/
	var ul = _id("stepList");
	var li = _ce("li",ul);
	var input = _ce("input",li);
	input.type="text";
	input.type="steps[]";
	input.className = "stepInput";

	/* création des etapes dans l'objet steps */
	var step = new Step("");
	var indice = trajet.steps.push(step) - 1;
	linkVarToInput(trajet.steps[indice], "point", input, updateSteps);

	/* création du bouton de suppression */
	var button = _ce("button",li);
	button.type="button";
	var text = _ct("x",button);
	Events.addEvent(button,"click",function(event){
		//Suppression du li et des events
		ul.removeChild(li); 
		input = null;
		button = null;
		//suppression des etapes
		trajet.steps.splice(indice,1);
		//Update de la map
		updateSteps();
	});
};

updateSteps = function(){
	updateTrajet(); 																		//On recharge la carte
	var ul = _id("priceList");//On récupère la liste
	var lis = document.getElementsByClassName("priceInput");
	
	ul.innerHTML = ""; 																		//On la vide
	var i = 0; 																				//Début du compteur
	var totalPrice = 0; 																	//Compteur de prix
	if(trajet.steps.length > 0 && !isNull(trajet.steps[0].point)){ 														//Si la première étape est remplie
		for(; i<trajet.steps.length; i++){ 													//Pour chaque étape
			if(i == 0){newStepLine(trajet.start,trajet.steps[0].point,trajet.steps[0].price);}
			else{newStepLine(trajet.steps[i-1].point,trajet.steps[i].point,trajet.steps[i].price);}
			totalPrice += trajet.steps[i].price; 
		}
		newStepLine(trajet.steps[i-1].point,trajet.end,trajet.lastDistance.price);
		var li = _ce("li",ul);
		var text = _ct("----------------------------------",li);
	}
	if(!isNull(trajet.start) && !isNull(trajet.end)){
		totalPrice += trajet.lastDistance.price;
		newStepLine(trajet.start,trajet.end,totalPrice);
	}
}

newStepLine = function(from,to,price,object){	
	var ul = _id("priceList");
	var li = _ce("li",ul);
	var span1 = _ce("span",li);
	var text1 = _ct(from,span1);
	var text = _ct("-->",li)
	var span2 = _ce("span",li);
	var text2 = _ct(to,span2);
	var input = _ce("input",li);
	input.type="number";
	input.className="priceInput";
	input.name="prices[]";
	input.value = price;
	linkVarToInput(object,"price",input,updatePrice);
}

updatePrice = function(){
	
}	

/* Fonction de maj des distances */
updateDistances = function(legs){
	a  = legs;
	var i = 0;
	if(trajet.steps.length > 0 && !isNull(trajet.steps[0].point)){
		for (; i < legs.length-1; i++) { 
			trajet.steps[i].setDistance(legs[i].distance.value/1000); //A convertir en km ou faire une division
			trajet.steps[i].duree = legs[i].duration.value;  //en seconde
		}
	}
	trajet.lastDistance.setDistance(legs[i].distance.value/1000); //A convertir en km ou faire une division*
	trajet.lastDistance.duree = legs[i].duration.value;  //en seconde
	updateSteps();
};

isNull = function(value){
	return (!value || value.trim() == "" || value ==  null);
}

save = function(){
	console.log(trajet);
}


window.addEventListener("load",init);