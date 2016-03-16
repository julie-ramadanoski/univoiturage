var Step = Class.create({
	init : function(point,distance,price,duree){
		this.point = point
		this.distance = distance || 0;
		this.price = price || 0;
		this.duree = duree || undefined;
	},
	setDistance : function(distance){
		this.distance = distance;
		this.price = parseInt(distance * 0.04);
	}
});