jQuery(document).ready(function() {
							 
    var small_menu = '<div class="small-menu-wrapper"><select class="small-menu"><option value="">Navigate To...</option>';		
    jQuery('.main-menu nav ul:first').find('li').each(function(){
        var href = jQuery(this).find('a').first().attr('href');			
        var title = jQuery(this).find('a').first().text();				
        small_menu += '<option value="'+href+'">'+title+'</option>';  						
    });		
    small_menu += '</select></div>';		
    jQuery('.main-menu nav ul:first').after(small_menu);
				
	
	
    if (jQuery(document).width() < 790 ) { 
		
        jQuery('.main-menu nav ul:first').hide();	   	
        jQuery('.main-menu').height('66px');
        jQuery('.small-menu-wrapper').show();
    } 
    else {
        jQuery('.main-menu nav ul:first').show();
        jQuery('.main-menu').height('auto');
        jQuery('.small-menu-wrapper').hide();   
    }


    jQuery('.small-menu').change(function() {
        var goTo = jQuery(this).val();		
		if (goTo != ''){
        if (goTo.indexOf('#') == 0){
            jQuery('html, body').animate({
                scrollTop: jQuery(goTo).offset().top
            }, 2000);				
        }
        else {			
            window.location.href = goTo;
        }
	}
    });	   	

});

jQuery(window).resize(function(){
	
    if (jQuery(document).width() < 790 ){      		
        jQuery('.main-menu nav ul:first').hide();
        jQuery('.main-menu').height('66px');
        jQuery('.small-menu-wrapper').show();
    } 
    else {
        jQuery('.main-menu nav ul:first').show();
        jQuery('.main-menu').height('auto');
        jQuery('.small-menu-wrapper').hide();   
    }
	   
});