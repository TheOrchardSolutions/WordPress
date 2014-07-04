jQuery(document).ready(function(){  
	jQuery('#blog-pagination a').live('click', function(e){  	  
		e.preventDefault();  	  
		var link = jQuery(this).attr('href');  
		jQuery('#blog-items-holder').html('<div class="loading-more-posts"><img src="'+frederickAJAX.ThemePath+'/images/ajax-document-loader.gif" alt=""/></div>');		
		jQuery('#main-blog-holder').load(link+' #blog-items-holder');  
	});  
}); 