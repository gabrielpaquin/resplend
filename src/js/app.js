/*
 *
 *	@author: Gabriel Paquin
 *	Date de création: 13 mars 2018
 *	Dernière modification: 13 mars 2018
 *
 */

var monApp = $(function configurer(evenement) {

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
  Déclaration de variable
-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
	var winScrollTop=0;
	var allMods = $(".slide-in--element");


/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
  Snippet is_on_screen
-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */	
	$.fn.is_on_screen = function(){    
	    var win = $(window);
	    var viewport = {
	        top : win.scrollTop(),
	        left : win.scrollLeft()
	    };
	    //viewport.right = viewport.left + win.width();
	    viewport.bottom = viewport.top + win.height();

	    var bounds = this.offset();
	    //bounds.right = bounds.left + this.outerWidth();
	    bounds.bottom = bounds.top + this.outerHeight();

	    return (!(viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	};



/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
  Function parallax
-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
	function parallax() { 
		var scrolled = $(window).scrollTop();
		$('.wrapper').each(function(){ 

			if ($(this).is_on_screen()) {

			 	var firstTop = $(this).offset().top; 
	 			var $paroller = $(this).find(".paroller");
	 			var $exergue_left = $(this).find(".left");
	 			var $exergue_right = $(this).find(".right");
		      	var moveTop = (firstTop-winScrollTop)*0.2 //speed;

		      	$paroller.css("transform","translateY("+-moveTop+"px)");
		      	$exergue_left.css("transform","translateX("+-moveTop+"px)");
		      	$exergue_right.css("transform","translateX("+moveTop+"px)");
		      	
		 	}
	 
		});
	}


/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
 	Function trigger au scroll
-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */

	$(window).scroll(function(e){
		winScrollTop = $(this).scrollTop();

		//trigger parallax
		parallax();

		//trigger animations
		allMods.each(function(i, el) {
    		var el = $(el);
    		if (el.is_on_screen()) {
     			 el.addClass("come-in"); 
    		} 
  		});
	});


/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
 	Initialisation du flexslider
-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
	$('.slideshow').flexslider({
		animation: "slide",
		slideshow: true,
		slideshowSpeed: 5000,
		animationDuration: 5000,
		directionNav: false
	});
});