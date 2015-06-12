jQuery(document).ready(function() {

jQuery('.squarebanner ul li:nth-child(even)').addClass('rbanner');

/* Navigation */
jQuery('#submenu ul.sfmenu').superfish({ 
		delay:       500,								// 0.1 second delay on mouseout 
		animation:   {opacity:'show',height:'show'},	// fade-in and slide-down animation 
		dropShadows: true								// disable drop shadows 
	});	

/* Slider	 */	
jQuery('#pslider').bxSlider({
	  mode: 'fade',
	  controls:false,
	  auto:true,
	  pager: true
	});	

/* Prettyphoto */
  
		jQuery("a[rel^='prettyPhoto']").prettyPhoto({theme: 'pp_default',overlay_gallery: true });

	
});