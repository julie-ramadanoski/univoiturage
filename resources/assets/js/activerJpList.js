$('document').ready(function(){

	/**
	* user defined functions
	*/
	jQuery.fn.jplist.settings = {
		
		/**
		* LIKES: jquery ui range slider
		*/
		hourSlider: function ($slider, $prev, $next){

			$slider.slider({
				min: 0,
				max: 23,
				range: true,
				values: [0, 23],
				slide: function (event, ui){
					$prev.text(ui.values[0] + ' h');
					$next.text(ui.values[1] + ' h');
				}
			});
		},		
		/**
		* LIKES: jquery ui set values
		*/
		hourValues: function ($slider, $prev, $next){
			$prev.text($slider.slider('values', 0) + ' h');
			$next.text($slider.slider('values', 1) + ' h');
		}
	}
		
   //check all jPList javascript options
   $('#jplist').jplist({				
      itemsBox: '.list',
      itemPath: '.list-item',
      panelPath: '.jplist-panel'
   });

      
});