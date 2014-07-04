jQuery(window).load(function() {

    if(jQuery().ColorPicker) {		
        doColors();
    }	
});

var doColors = function()
{
    var title_color = jQuery('#colorTitleSelector').next('input').first().attr('value');   
    var background_color = jQuery('#colorBackgroundSelector').next('input').first().attr('value');
    var date_color = jQuery('#colorDateSelector').next('input').first().attr('value');

    if(title_color == ''){
        title_color = '#191b1f'
    }

    if(background_color == ''){
        background_color = '#ffffff'
    }  

	if(date_color == ''){
        date_color = '#9da1a4'
    }   	

    jQuery('#colorTitleSelector').find('div').first().css('background-color', title_color);
    jQuery('#colorBackgroundSelector').find('div').first().css('background-color', background_color);
    jQuery('#colorDateSelector').find('div').first().css('background-color', date_color);

    jQuery('#colorTitleSelector').ColorPicker({
        color: title_color,
        onShow: function (colpkr) {
            jQuery(colpkr).fadeIn(500);
            return false;
        },
        onHide: function (colpkr) {
            jQuery(colpkr).fadeOut(500);
            return false;
        },
        onChange: function (hsb, hex, rgb) {
            jQuery('#colorTitleSelector div').css('backgroundColor', '#' + hex);
            jQuery('#colorTitleSelector').next('input').first().attr('value','#' + hex);
        }
    });
    
    jQuery('#colorBackgroundSelector').ColorPicker({
        color: background_color,
        onShow: function (colpkr) {
            jQuery(colpkr).fadeIn(500);
            return false;
        },
        onHide: function (colpkr) {
            jQuery(colpkr).fadeOut(500);
            return false;
        },
        onChange: function (hsb, hex, rgb) {
            jQuery('#colorBackgroundSelector div').css('backgroundColor', '#' + hex);
            jQuery('#colorBackgroundSelector').next('input').first().attr('value','#' + hex);
        }
    });  
	
	  jQuery('#colorDateSelector').ColorPicker({
        color: date_color,
        onShow: function (colpkr) {
            jQuery(colpkr).fadeIn(500);
            return false;
        },
        onHide: function (colpkr) {
            jQuery(colpkr).fadeOut(500);
            return false;
        },
        onChange: function (hsb, hex, rgb) {
            jQuery('#colorDateSelector div').css('backgroundColor', '#' + hex);
            jQuery('#colorDateSelector').next('input').first().attr('value','#' + hex);
        }
    });  
}