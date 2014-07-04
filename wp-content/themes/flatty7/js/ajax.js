var SendMail = function(){
    var isValid = true;
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(jQuery('div.contact-form #contact-email').val())){
        isValid = false;
        alert('Your email is not in valid format');
    }
	
	var website = jQuery('#website').val();
    if(website == '*Web Site')
    {
        website ='';
    }
	
    if(isValid){
		jQuery('#sending-message-status').text("Sending...");
        var params = {
            'action'    : 'contact_action',
            'name'      : jQuery('div.contact-form #name').val(),
            'email'     : jQuery('div.contact-form #contact-email').val(),
            'website'   : website,
            'message'   : jQuery('div.contact-form #message').val()
        };
        
        jQuery.post(frederickAJAX.ajaxurl, params, function(response) {	        
			alert(response);	 
			resetInput();	
			displayHints();			
        });  
    }
};