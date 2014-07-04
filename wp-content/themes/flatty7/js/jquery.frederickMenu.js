jQuery(window).bind('scroll resize', function() {	
    var currentSection = null;
	
    jQuery('.section').each(function(){
        var element = jQuery(this).attr('id');	
        if (jQuery('#'+element).is('*')){
            if(jQuery(window).scrollTop() >= jQuery('#'+element).offset().top - 90)
            {
                currentSection = element;
            }
        }
    });
		
    jQuery('.main-menu ul li').removeClass('active').find('a[href="#'+currentSection+'"]').parent().addClass('active');	
	
	jQuery('select.small-menu option:selected').removeAttr('selected');
	jQuery('select.small-menu option[value="#'+currentSection+'"]').attr('selected', 'selected');
	
});

jQuery(document).ready(function() { 
	jQuery(".main-menu").sticky({ topSpacing: 0 });  	
    jQuery('.main-menu ul li a, a.slow-scroll').click(function() {	
        jQuery('html, body').animate({scrollTop: jQuery(this.hash).offset().top}, 2000);
        return false;
    });	
	jQuery(window).scrollTop(1);
	
});