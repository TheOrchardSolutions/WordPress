jQuery(document).ready(function() {
 
var doc_width = jQuery("ul#portfolio-items").width();
var elemnt_width;

    if(doc_width > 1024)
    {
        elemnt_width = Math.floor(doc_width/6);	
    }
    else if(doc_width <= 1024 && doc_width > 850){
        elemnt_width = Math.floor(doc_width/4);	
    }
    else if(doc_width <= 850 && doc_width > 400){
        elemnt_width = Math.floor(doc_width/3);	
    }
    else{
        elemnt_width = Math.floor(doc_width/2);	
    }

    jQuery("#portfolio-items").children().width(elemnt_width);	   
	

    jQuery('ul#filter li').click(function() {								
        jQuery('ul#filter li.current').removeClass('current');
        jQuery(this).addClass('current');
		
        var filterVal = jQuery(this).text().toLowerCase().replace(/ /g,'-');
				
        if(filterVal == 'all') {
            jQuery('ul#portfolio-items li, img.absolute').animate({
                opacity: 1
            }, 1000);
            jQuery("a[rel^='prettyPhoto']").each(function() 
            {
                jQuery(this).addClass('active-items');
            });		
        } else {
            jQuery('ul#portfolio-items li').each(function() {
                if(!jQuery(this).hasClass(filterVal)) {
                    jQuery(this).animate({
                        opacity: 0.3
                    }, 1000);
                } else {
                    jQuery(this).animate({
                        opacity: 1
                    }, 1000);
                    jQuery(this).find('a').addClass('active-items');
                }
            });
        }
		
        jQuery("a[rel^='prettyPhoto']a[class~='active-items']").prettyPhoto({
            animation_speed: 'fast', /* fast/slow/normal */
            slideshow: false, /* false OR interval time in ms */
            autoplay_slideshow: false, /* true/false */
            opacity: 0.80, /* Value between 0 and 1 */
            show_title: true, /* true/false */
            allow_resize: true, /* Resize the photos bigger than viewport. true/false */
            default_width: 500,
            default_height: 344,
            counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
            theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
            hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
            wmode: 'opaque', /* Set the flash wmode attribute */
            autoplay: true, /* Automatically start videos: True/False */
            modal: false, /* If set to true, only the close button will close the window */
            overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
            keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
            deeplinking: false,
            social_tools: false 
        });
        jQuery('*').removeClass('active-items');
        return false;	
    });
});


jQuery(window).resize(function(){


    var doc_width = jQuery("ul#portfolio-items").width();
	var elemnt_width;
    if(doc_width > 1024)
    {
        elemnt_width = Math.floor(doc_width/6);	
    }
    else if(doc_width <= 1024 && doc_width > 850){
        elemnt_width = Math.floor(doc_width/4);	
    }
    else if(doc_width <= 850 && doc_width > 400){
        elemnt_width = Math.floor(doc_width/3);	
    }
    else{
        elemnt_width = Math.floor(doc_width/2);	
    }

    jQuery("#portfolio-items").children().width(elemnt_width);	
});