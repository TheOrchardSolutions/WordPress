jQuery(document).ready(function() {
	jQuery('.vimeo').each(function() {
		var vimeo_src_value = jQuery(this).find('.vimeo_source').first().val();	
		jQuery(this).html('<iframe src="http://player.vimeo.com/video/'+vimeo_src_value+'?title=0&amp;portrait=0&amp;badge=0&amp;autoplay=0"></iframe>')
	});
	
	jQuery('.youtube').each(function() {
		var youtube_src_value = jQuery(this).find('.youtube_source').first().val();	
		jQuery(this).html('<iframe src="http://www.youtube.com/embed/'+youtube_src_value+'?wmode=transparent"></iframe>')
	});
	
});

jQuery(window).load(function() {
	
    //Fix for hash
	var hash = location.hash;  
	if (hash != '')
	{
    setTimeout(function(){
        window.location.hash = '#';
        window.location.hash = hash;
    },200);
	}	
	
	
	//Fix for Opera (section)
	jQuery('div.section').css('float','left');
	jQuery('div.section').css('float','none');	
	
	//Extra padding if menu is too big
	if (jQuery('.main-menu').height() > 85)
	{
		jQuery('.section').css('padding-top',jQuery('.main-menu').height()+150+'px');
	}
	
	//Remove padding-bottom from last section
	jQuery('div.section:last').css('padding-bottom','0');
	
    jQuery('.doc-loader').fadeOut('slow'); 
    displayHints();
    addTweets();
	
	//Fix for Blog Holder
	 jQuery('#main-blog-holder').css({
        'min-height':jQuery('#main-blog-holder').height()
    });
		
	
	//PrettyPhoto fix form slider images (each slider must have different)
	jQuery('.image-slider').each(function(){	
	var id = jQuery(this).attr('id');	
		jQuery(this).find('li a').each(function(){	
			if(typeof jQuery(this).attr('data-rel') != 'undefined')
			{
			jQuery(this).attr('data-rel','prettyPhoto['+id+']');		
			}
		});
	});
			
	//PrettyPhoto inicial
    jQuery('a[data-rel]').each(function() {
        jQuery(this).attr('rel', jQuery(this).data('rel'));
    });

    jQuery("a[rel^='prettyPhoto']").prettyPhoto({
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
			
	//Text slider configuration
	jQuery(".text-slider").each(function(){ 
	 var id = jQuery(this).attr('id');
	 
        if(window[id+'_pagination'] == 'true')
        {
            var pagination_value = '#'+id+'_text_slide_pager'; 
        }
        else
        {
            var pagination_value = false; 
        }
                                
        var auto_value = window[id+'_auto'];
        if(auto_value == 'false')
        {
            auto_value = false;  
        }else{
            auto_value = true;    
        }
       
        var hover_pause = window[id+'_hover'];
        if(hover_pause == 'true')
        {
            hover_pause = 'resume';
        }
        else{
            hover_pause = false;
        }
               
        var speed_value = window[id+'_speed'];
		var start_value = window[id+'_start'];
		
	jQuery('#'+id).carouFredSel({	
        responsive: true,
        width: '100%',
         auto: {
                play: auto_value,
                pauseOnHover: hover_pause                
            },      		
        pagination: pagination_value,	
        scroll: {
            fx: 'uncover-fade',
			duration: parseFloat(speed_value),
			items: 1
        },
        swipe: {
            onMouse: true,
            onTouch: true
        }, 
        items: {
            height: 'variable',
			start: parseFloat(start_value)
        }
    });	
	});
	
	//Image slider configuration
	jQuery(".image-slider").each(function(){ 
	 var id = jQuery(this).attr('id');
	 
        if(window[id+'_pagination'] == 'true')
        {
            var pagination_value = '#'+id+'_image_slide_pager'; 
        }
        else
        {
            var pagination_value = false; 
        }
                                
        var auto_value = window[id+'_auto'];
        if(auto_value == 'false')
        {
            auto_value = false;  
        }else{
            auto_value = true;    
        }
       
        var hover_pause = window[id+'_hover'];
        if(hover_pause == 'true')
        {
            hover_pause = 'resume';
        }
        else{
            hover_pause = false;
        }
               
        var speed_value = window[id+'_speed'];
		var start_value = window[id+'_start'];
		var width_value = window[id+'_width'];
		var num_value = window[id+'_num'];
		
	jQuery('#'+id).carouFredSel({	
        responsive: true,
        width: '100%',
         auto: {
                play: auto_value,
                pauseOnHover: hover_pause                
            },      		
		prev: '#'+id+'_prev',
		next: '#'+id+'_next',
        pagination: pagination_value,		
        scroll: {
			duration: parseFloat(speed_value),
			items: 1
        },
        swipe: {
            onMouse: false,
            onTouch: false
        }, 
        items: {
            width: parseFloat(width_value),
            height: 'auto',	//	optionally resize item-height
            visible: {
                min: 1,
                max: parseFloat(num_value)
				},
			start: parseFloat(start_value)
        }
    });	
	});
			    					
	//Fix for slider pagination
    jQuery('.slider_holder').each(function(){
        var pagination_width = jQuery(this).find('.carousel_pagination').first().width();
        var windw_width = jQuery(this).width();
        jQuery(this).find('.carousel_pagination').first().css("margin-left", (windw_width-pagination_width)/2);
    });
		
    //Fix for next/previus arrow (center)
	jQuery('.image-slider').each(function(){
	var slider_height = jQuery(this).height();	
	var arrow_height = jQuery(this).parent().next().next('a.prev').height();	
	var top = (slider_height - arrow_height)/2;	
	jQuery(this).parent().siblings('a.prev').css('top', top+'px');
	jQuery(this).parent().siblings('a.next').css('top', top+'px');
	});
	
	
    //Fix for featured work item text
    jQuery(".image-slider li").each(function(){
        var element_holder_width = jQuery(this).width();
        var element_holder_height = jQuery(this).height();
        var featured_work_text_width = jQuery(this).find("span.featured_work_item_text").width();
        var featured_work_text_height = jQuery(this).find("span.featured_work_item_text").height();
        var top = (element_holder_height - featured_work_text_height)/2;
        var left = (element_holder_width - featured_work_text_width)/2;
        jQuery(this).find("span.featured_work_item_text").css({
            'top': top, 
            'left': left
        });
    });
	
    //Fix for portfolio work item text
    jQuery("#portfolio-items li").each(function(){
        var work_items_element_holder_width = jQuery(this).width();
        var work_items_element_holder_height = jQuery(this).height();
        var work_items_text_width = jQuery(this).find("span.work_item_text").width();
        var work_items_text_height = jQuery(this).find("span.work_item_text").height();
        var work_items_top = (work_items_element_holder_height - work_items_text_height)/2;
        var work_items_left = (work_items_element_holder_width - work_items_text_width)/2;
        jQuery(this).find("span.work_item_text").css({
            'top': work_items_top, 
            'left': work_items_left
        });
    });
	
	  // Fix for Vimeo and YouTube Video to be Full Screen
    jQuery(".vimeo, .youtube").each(function() {
        var vimeo_width = jQuery(this).width();    
        var vimeo_height = vimeo_width*16*7/(90*2.2);
        jQuery(this).find('iframe').css('height',vimeo_height);    
    }); 
	
    //Social hover
    jQuery('.team-social a').hover(function(){
        jQuery(this).find('img').animate({'margin-top':'0px'}, 100);
    }, function() {
        jQuery(this).find('img').animate({'margin-top':'-33px'}, 100);
    });
	
    //Footer Social hover
    jQuery('.footer-social a').hover(function(){
        jQuery(this).find('img').css({'margin-top':'0px'});
    }, function() {
        jQuery(this).find('img').css({'margin-top':'-168px'});
    });
	
	
	
	//Add margin-bottom to last elemnt with class section		
	jQuery('.section:last').css("margin-bottom", jQuery('footer').outerHeight()+'px');
		

	
	//PORTFOLIO ITEM IMAGE HOVER (double touch), FEATURED WORK IMAGE HOVER (double touch) AND REMOVING BACKGROUND-ATTACHMENT:FIXED on touch devices
	if( is_touch_device() ){	
  
  
  jQuery('.background-fixed, .section').each(function(){  
  jQuery(this).css('background-attachment','scroll');  
  });
  
	jQuery('footer, .section').css({'position':'static', 'z-index':'0'});
	jQuery('.section:last').css("margin-bottom", "0");
	
		//portfolio
		jQuery("ul#portfolio-items li a.preview").css("visibility", "hidden");		
		jQuery("ul#portfolio-items li").click(function(){									
			var display = jQuery(this).find("span:first").css("display");
			
			if(display == 'none')
				{					
					jQuery(this).find("span").show();		
					jQuery(this).find("a.preview").css("visibility", "hidden");			
				}else
				{
					jQuery(this).parent().find("li span").show();
					jQuery(this).find("a.preview").css("visibility", "hidden");		
					jQuery(this).find("span").hide();		
					jQuery(this).find("a.preview").css("visibility", "visible");			
				}							
		});			
		jQuery("ul#portfolio-items li a.preview").click(function(){					
		jQuery(this).nextAll('span.shadow, span.work_item_text').show();							
		});		
		
		
		//featured work
		jQuery("ul.image-slider li a.preview").css("visibility", "hidden");		
		jQuery("ul.image-slider li").click(function(){									
			var display = jQuery(this).find("span:first").css("display");
			
			if(display == 'none')
				{					
					jQuery(this).find("span").show();		
					jQuery(this).find("a.preview").css("visibility", "hidden");		
				}else
				{
					jQuery(this).parent().find("li span").show();
					jQuery(this).find("a.preview").css("visibility", "hidden");		
					jQuery(this).find("span").hide();		
					jQuery(this).find("a.preview").css("visibility", "visible");			
				}							
		});			
		jQuery("ul.image-slider li a.preview").click(function(){					
		jQuery(this).nextAll('span.shadow, span.featured_work_item_text').show();							
		});		
  
	}else
	{
		//if not touch device
		jQuery('ul#portfolio-items li, ul.image-slider li').hover(function() {
					jQuery(this).find("span").fadeOut(200);					
				}, function() {
					jQuery(this).find("span").fadeIn(200);					
			});				
	}	

	
	
});


jQuery(window).resize(function(){

	//Fix for slider pagination
    jQuery('.slider_holder').each(function(){
        var pagination_width = jQuery(this).find('.carousel_pagination').first().width();
        var windw_width = jQuery(this).width();
        jQuery(this).find('.carousel_pagination').first().css("margin-left", (windw_width-pagination_width)/2);
    });
	
	//Fix for next/previus arrow (center)
	jQuery('.image-slider').each(function(){
	var slider_height = jQuery(this).height();	
	var arrow_height = jQuery(this).parent().next().next('a.prev').height();	
	var top = (slider_height - arrow_height)/2;	
	jQuery(this).parent().siblings('a.prev').css('top', top+'px');
	jQuery(this).parent().siblings('a.next').css('top', top+'px');
	});
	
	// Fix for Vimeo and YouTube Video to be Full Screen
    jQuery(".vimeo, .youtube").each(function() {
        var vimeo_width = jQuery(this).width();    
        var vimeo_height = vimeo_width*16*7/(90*2.2);
        jQuery(this).find('iframe').css('height',vimeo_height);    
    }); 
	
     //Fix for featured work item text
    jQuery(".image-slider li").each(function(){
        var element_holder_width = jQuery(this).width();
        var element_holder_height = jQuery(this).height();
        var featured_work_text_width = jQuery(this).find("span.featured_work_item_text").width();
        var featured_work_text_height = jQuery(this).find("span.featured_work_item_text").height();
        var top = (element_holder_height - featured_work_text_height)/2;
        var left = (element_holder_width - featured_work_text_width)/2;
        jQuery(this).find("span.featured_work_item_text").css({
            'top': top, 
            'left': left
        });
    });
	
    //Fix for portfolio work item text
    jQuery("#portfolio-items li").each(function(){
        var work_items_element_holder_width = jQuery(this).width();
        var work_items_element_holder_height = jQuery(this).height();
        var work_items_text_width = jQuery(this).find("span.work_item_text").width();
        var work_items_text_height = jQuery(this).find("span.work_item_text").height();
        var work_items_top = (work_items_element_holder_height - work_items_text_height)/2;
        var work_items_left = (work_items_element_holder_width - work_items_text_width)/2;
        jQuery(this).find("span.work_item_text").css({
            'top': work_items_top, 
            'left': work_items_left
        });
    });

	
});

//------------------------------------------------------------------------
//Helper Methods -->
//------------------------------------------------------------------------
var displayHints = function()
{
    if(jQuery().attachHint) {		
        jQuery('#name, #author').attachHint('*Name');
        jQuery('#contact-email, #email').attachHint('*Email Address');
        jQuery('#website').attachHint('*Web Site');
        jQuery('#message, #comment').attachHint('*Message');		     
    }
}

var StringFormat = function() {
    var s = arguments[0];
    for (var i = 0; i < arguments.length - 1; i++) {
        var regExpression = new RegExp("\\{" + i + "\\}", "gm");
        s = s.replace(regExpression, arguments[i + 1]);
    }
    return s;
}

var resetInput = function(){
    jQuery('input, textarea').each(function() {
        jQuery(this).val('').text('');
    });	
};

function is_touch_device() {
  return !!('ontouchstart' in window);
}