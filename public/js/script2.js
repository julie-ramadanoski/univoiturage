init = function(){
	var priceInputs = _n("price[]");
	for(var i =0; i<priceInputs.length; i++){
		callbackWhenInputChange(priceInputs[i],changePrice);
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