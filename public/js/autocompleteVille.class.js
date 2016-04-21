var AutocompleteVille = Class.create({
	init : function(input){
		this.input = input; 				//L'input dans lequel on fait nos recherche
		this.parent = input.parentElement;	//Le parent de l'input
		this.ul = _ce("ul",this.parent);	//La liste des resultats

		this.records = [];		//Les resultats de la recherche
		this.xhr  = {};			//l'objet de la requette
		this.posCursor = 0;		//l'element susceptible d'etre selectionné de la liste

		/* On genere toutes les données de la liste de résultat */
		this.ul.id = "list"+generateKey(); //TODO : generer un nombre aléatoire (cf : generateKey, biblio.js)
		this.ul.className = "hidden";

		/* On genere les écouteurs sur le champ de recherche */
		Events.addEvent(this.input,"keydown",this.keyup);
		Events.addEvent(this.input,"blur",this.blur);
		Events.addEvent(this.input,"focus",this.focus);
	},
	keyup : function(event){
		autocomplete.focus();
		switch(event.keyCode){
			case 13 : autocomplete.enter(event);break;
			case 38 : autocomplete.up(event);break;
			case 40 : autocomplete.down(event);break;
			default : if(autocomplete.input.value.length>1){
						autocomplete.search();
					}else{
						autocomplete.blur();
						try{autocomplete.xhr.abort();}
						catch(err){}
					}break;
		}
	},
	search : function(){
		try{autocomplete.xhr.abort();}
		catch(err){}
		autocomplete.loading();
		var value = autocomplete.input.value.replace(" ","+");
		autocomplete.xhr = ajax._({
			url : "http://datanova.legroupe.laposte.fr/api/records/1.0/search/?dataset=laposte_hexasmal&q="+value+"&lang=FR&facet=code_commune_insee&facet=nom_de_la_commune&facet=code_postal",
			complete : autocomplete.complete,
			error : autocomplete.error,
			cache : ""
		});
	},
	complete : function(data){
		try{
			autocomplete.records = JSON.parse(data.responseText).records;
			autocomplete.createList();
		}
		catch(e){}
	},
	createList : function(){
		autocomplete.emptyList(); //on vide la liste
		if(autocomplete.records.length < 1){
			var li = _ce("li",autocomplete.ul);
			var tn = _ct("Aucun resultat trouvé", li);
		}
		else{
			for(var i = 0; i<autocomplete.records.length; i++){
				var li = _ce("li",autocomplete.ul);
				var tn = _ct(autocomplete.records[i]['fields']['libell_d_acheminement']+" ("+autocomplete.records[i]['fields']['code_postal']+")",li);
				if(i == autocomplete.posCursor){li.className = "active";}
			}
		}
	},
	emptyList : function(){
		var lis = autocomplete.ul.childNodes;
		for(var i = 0; i<lis.length;){
			autocomplete.ul.removeChild(lis[i]);
		}
		autocomplete.posCursor = 0;
	},
	blur : function(event){
		autocomplete.ul.className = "hidden";
	},
	focus : function(event){
		autocomplete.ul.className = "visible";
	},
	enter : function(e){
		if(!e) var e = window.event;

			e.cancelBubble = true;
			e.returnValue = false;

			if (e.stopPropagation) {
				e.stopPropagation();
				e.preventDefault();
			}
		autocomplete.setData();
	},
	up : function(event){
		if(autocomplete.posCursor>0){
    		autocomplete.posCursor --;
    	}
    	else{
    		autocomplete.posCursor = autocomplete.ul.childNodes.length -1;
    	}
    	autocomplete.setActiveLi();
	},
	down : function(event){
		if(autocomplete.posCursor < autocomplete.ul.childNodes.length - 1){
    		autocomplete.posCursor ++;
    	}
    	else{
    		autocomplete.posCursor = 0;
    	}
    	autocomplete.setActiveLi();
	},
	setActiveLi : function(){
		var lis = autocomplete.ul.childNodes;
		for(var i = 0; i<lis.length; i++){
			lis[i].className = "";
			if(i == autocomplete.posCursor){
				lis[i].className = "active";
			}
		}
	},
	setData : function(){
		var children = autocomplete.parent.childNodes;
		var record = autocomplete.records[autocomplete.posCursor];
		autocomplete.input.value = record['fields']['libell_d_acheminement']+" ("+record['fields']['code_postal']+")"
		for(var i = 0; i<children.length; i++){
			if(children[i].name=="insees[]"){children[i].value = record['fields']['code_commune_insee'];}
			if(children[i].name=="villes[]"){children[i].value = record['fields']['libell_d_acheminement'];}
		}
		autocomplete.blur();
	},
	loading : function(){
		autocomplete.emptyList();
		var li = _ce("li",autocomplete.ul);
		var tn = _ct("En attente des resultats ...", li);
	}
	/*
	start : function(e){
		var cvalue = this.el.value;
		if(cvalue.length > 1 && cvalue != this.value){
			this.value = cvalue;
			this.recherche(this.value);
		}
		else{ //fleches, entrée
			var keynum;
		    if(window.event) { // IE                    
		      keynum = e.keyCode;
		    } else if(e.which){ // Netscape/Firefox/Opera                   
		      keynum = e.which;
		    }
		    if(keynum == 13){ //enter
		    	this.setData(this.records[this.posCursor]);
		    }
		    if(keynum == 38){ //up
		    	if(this.posCursor>0){
		    		this.posCursor --;
		    	}
		    	else{
		    		this.posCursor = this.lis.length-1;
		    	}
		    	this.hoverLi(this.lis[this.posCursor]);
		    }
		    if(keynum == 40){ //down
		    	if(this.posCursor<this.lis.length-1){
		    		this.posCursor ++;
		    	}
		    	else{
		    		this.posCursor = 0;
		    	}
		    	this.hoverLi(this.lis[this.posCursor]);
		    }
		}
	},
	recherche : function(value){
		var that = this;
		ajax._({
			url : "http://datanova.legroupe.laposte.fr/api/records/1.0/search/?dataset=laposte_hexasmal&q="+value+"&lang=FR&facet=code_commune_insee&facet=nom_de_la_commune&facet=code_postal",
			complete : function(data){that.setList(data);},
			error : that.error,
			cache : ""
		});
	},
	error : function(error){
		console.log(error);
	},
	setList : function(data){
		console.log(this);
		records = JSON.parse(data.responseText).records;
		this.records = records;
		for(var i=0; i<this.lis.length; i++){
			this.lis[i] = null;		
		}
		this.lis = [];

		if(records.length == 0){
			var li = _ce("li",this.list);
			var text =_ct("Aucun resultat trouvé",li);
		}
		else{
			for(var i=0; i<records.length; i++){
				var li = _ce("li",this.list);
				this.lis.push(li);
				var text =_ct(records[i]['fields']['libell_d_acheminement']+" "+records[i]['fields']['code_postal'],li);
				li["data-order"] = i;
				if(i == 0) li.className="active";
				var that = this;
				Events.addEvent(li,"click",function(e){that.selectLi(this);});
				Events.addEvent(li,"hover",function(e){that.hoverLi(this);});
			}
		}
	},
	blur : function(e){
		this.list.className = "hidden";
	},
	focus : function(e){
		this.list.className = "visible";
	},
	selectLi : function(li){
		this.posCursor = li["data-order"];
		var record = this.records[this.posCursor];
		this.setData(record);
	},
	hoverLi : function(li){
		var order = li["data-order"];
		for(var i = 0; i<this.lis.length; i++){
			this.lis[i].className = "";
			if(i == order){
				this.lis[i].className = "active";
			}
		}
	},
	setData : function(record){
		var parent = this.el.parentElement;
		var children = parent.childNodes;
		for(var i = 0; i<children.length; i++){
			if(children[i].name=="insees[]"){children[i].value = record['fields']['code_commune_insee'];}
			if(children[i].name=="villes[]"){children[i].value = record['fields']['libell_d_acheminement'];}
		}
	}
	*/
});
