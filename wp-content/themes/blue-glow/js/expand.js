// jQuery expandable navigation by Mark Jones http://www.bluebit.co.uk 

$(function() { 		   
	$('ul > li > ul').addClass("hidden");
	$('ul li:has(ul li)').children('a').click(function() {	
		$(this).parent().children('ul').toggleClass("hidden");		
		return false;		
	});		   
	$('html').removeClass("js");		   
});


	

