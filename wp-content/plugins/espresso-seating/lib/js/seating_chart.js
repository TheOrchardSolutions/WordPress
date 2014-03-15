// JavaScript Document

var ee_current_seat = "";
var current_seat_id = 0;
var selected_custom_tag = "";
var current_seat_select_obj;
var disable_selection = false;
function display_seating_chart() {
    disable_selection = false;
	current_seat_select_obj = jQuery(this);	
	event_id = 0;
    seating_chart_id = 0;
    var event_id_attr = current_seat_select_obj.attr('event_id');    
    var seating_chart_id_attr = current_seat_select_obj.attr('seating_chart_id');
    var disable_selection_attr = current_seat_select_obj.attr('disable_section');
    if (  typeof event_id_attr !== 'undefined' && event_id_attr !== false) {
        event_id = current_seat_select_obj.attr('event_id');
    }
    if (  typeof seating_chart_id_attr !== 'undefined' && seating_chart_id_attr !== false) {
        seating_chart_id = current_seat_select_obj.attr('seating_chart_id');
    }
    if (  typeof disable_selection_attr !== 'undefined' && disable_selection_attr !== false) {
        disable_selection = true;
    }
	postData = 'event_id='+event_id+'&seating_chart_id='+seating_chart_id;
	jQuery.ajax({
		type:"POST"
		,url:ee_seating_chart_vars.callback_url+"request.php?seating_chart_action=get_event_seating_chart"
		,data: postData
		,dataType:"text"
		,error:function(data) {
			alert("Failed to access "+ee_seating_chart_vars.callback_url+"request.php");
		}
		,success: function(data) { 
			data = jQuery.trim(data);
			if ( data != '' ) 
			{ 
				jQuery('#seating_chart_content').html(data);
				jQuery('#seating_chart_page').height(jQuery(document).height());
				jQuery('#seating_chart_page').width(jQuery(document).width());
                jQuery('#seating_chart_info').css('height','0px');
                jQuery('.ee_s_row').each(function(){
                   var seat_count = jQuery(this).children('.ee_s_seat').length;
				   var placeholder_count=jQuery(this).children('.ee_s_seat_placeholder').length;
				   var reserved_count=jQuery(this).children('.ee_s_seat_reserved').length;
                   var width = (seat_count+placeholder_count+reserved_count)*25;
                   jQuery(this).css('width',width+'px');
                });
                jQuery('.ee_s_section').each(function() {
                   var row_count = jQuery(this).children('.ee_s_row').length;
                   var height = (row_count * 30)+30;
                 //  jQuery(this).css('height',height+'px');
                   var width = 0;
                   jQuery(this).children('.ee_s_row').each(function(){
                      if ( jQuery(this).width() > width ) {
                          width = jQuery(this).width();
                      } 
                   });
                   width += 50;
                   jQuery(this).css('width',width+'px');
				   
                });
                
                
                var widest_level = 0;
                var total_level_heights = 0;
                jQuery('.ee_s_level').each(function(){
                    var level_width = 0;
                    var level_height = 30;
                    jQuery(this).children('.ee_s_section').each(function(){
                        level_width += jQuery(this).width()+10;
                       // level_height += jQuery(this).height();
                    });
                    if ( level_width > widest_level) {
                        widest_level = level_width;
                    }
                    total_level_heights += level_height;
                });
                if ( total_level_heights > jQuery(window).height()) {
                  jQuery('#ee_s_layout').height(jQuery(window).height()-150);
                  jQuery('#ee_s_layout').css('overflow-y','auto');
                  jQuery('#seating_wrp').height(jQuery(window).height()-20);
                } else {
                    
                    jQuery('#seating_wrp').height(total_level_heights + 200);
                    if ( jQuery('#seating_wrp').height() < 600 ) {
                        jQuery('#seating_wrp').height(600);
                    }
                } 
                
                jQuery('.ee_s_level').css('width',widest_level+'px');
                if ( (widest_level+40) > jQuery(window).width()) {
                    jQuery('#ee_s_layout').width(jQuery(window).width()-60);
                    jQuery('#seating_wrp').width(jQuery(window).width()-20);
                } else {
                    jQuery('#ee_s_layout').width(widest_level + 20);
                    jQuery('#seating_wrp').width(widest_level + 80);
                    if ( jQuery('#seating_wrp').width() < 700 ) {
                        jQuery('#seating_wrp').width(700);
                    }
                }
                
                
                
				jQuery('#seating_chart_page').show();
				jQuery('#seating_chart_content').show();
				jQuery('#seating_chart_close_button').show();
                var calc_height = 0;
                jQuery('#seating_wrp').children().each(function(){
                   calc_height += jQuery(this).height(); 
                });
                if ( calc_height > jQuery('#seating_wrp').height()) {
                    jQuery('#seating_wrp').height(calc_height);
                }
                var left = ((jQuery(window).width() - jQuery('#seating_wrp').width()) / 2);
                var top = ((jQuery(window).height() - jQuery('#seating_wrp').height()) / 2);
                
                jQuery('#seating_wrp').css('top',(top+5)+'px');
                jQuery('#seating_wrp').css('left',left+'px');
                jQuery('#seating_chart_info').css('height','auto');
				scroll(0,0);
			} 
			else 
			{ 
				alert('Seating chart not available.');
			} 
		}
	});
	return false;
}

function book_a_seat(obj)
{
	jQuery('#seating_chart_info').css('display','none');	
	var seat_id = obj.attr('seat_id');
	var event_id = obj.attr('event_id');
	var booking_info = current_seat_select_obj.val();
	var current_booking_id = 0;
	booking_info = jQuery.trim(booking_info);
	if ( booking_info != "" )
	{
		var tmpar = booking_info.split("|");
		if ( tmpar.length > 1 )
		{
			var tmpar2 = tmpar[tmpar.length-1].split(":");
			if (tmpar2.length == 2 )
			{
				var tmp = tmpar2[1];
				current_booking_id = parseInt(tmp);
			}
		}
	}
	else
	{
		current_booking_id = 0;	
	}
	selected_custom_tag = obj.children('.ee_s_custom_tag').html();
	var postData = "seat_id="+seat_id+"&event_id="+event_id+"&booking_id="+current_booking_id;
	jQuery.ajax({
		type:"POST"
		,url:ee_seating_chart_vars.callback_url+"request.php?seating_chart_action=book_a_seat"
		,data: postData
		,dataType:"text"
		,success: function(data) { 
			data = jQuery.trim(data);
			if ( data != '' ) 
			{ 
				var current_booking_id = parseInt(data);
				
				if ( current_booking_id > 0 )
				{
					//jQuery('#h_'+ee_current_seat).val(current_booking_id);	
					var tag = selected_custom_tag+" | Booking ID:"+current_booking_id;
					current_seat_select_obj.val(tag);
					alert(selected_custom_tag+" has been reserved for you.\nIt will be released if you do not confirm your registration within next 1 hour.\nContinue to submit this form to confirm.");
					close_seating_chart();
				}
				else
				{
					alert("Seat is not available");	
				}
				jQuery('#seating_chart_info').css('display','none');	
			} 
			else 
			{ 
				alert('Failed to connect to server.');
			} 
		}
	});
}

function close_seating_chart()
{	
	//jQuery('#seating_chart_info').hide();
	jQuery('#seating_chart_info').css('display','none');
	jQuery('#seating_chart_close_button').hide();
	jQuery('#seating_chart_content').hide();
	jQuery('#seating_chart_page').hide();
	return false;
}

jQuery(document).ready(function(){
    
	jQuery('body').append('<div id="seating_chart_page"><div id="seating_wrp"><div id="seating_chart_close_button">Close</div><div id="seating_chart_content"></div><p>Seating charts reflect the general layout for the venue at this time. For some events, the layout and specific seat locations may vary without notice.<p><div id="seating_chart_info"></div></div></div>');
	jQuery('#seating_chart_page').live('click',close_seating_chart);
	jQuery('.ee_s_select_seat').live('click',display_seating_chart);
	jQuery('#seating_chart_close_button').live('click',close_seating_chart);

	jQuery('.ee_s_seat').live('mouseenter',function(){ 
		p1 = jQuery('#seating_chart_content').position();
		p = jQuery(this).position();
		obj = jQuery('#seating_chart_info')
        
		newTop = parseInt(p1.top)+parseInt(p.top)+20;
		newLeft = parseInt(p1.left)+parseInt(p.left)+20;
        
		obj.css('top',newTop+'px');
		obj.css('left',newLeft+'px');
		obj.css('height','auto');
		obj.css('width','auto');
		html = "Seat: "+jQuery(this).children('.ee_s_custom_tag').html()+"<br/>";
		html += "Price: "+ee_seating_chart_vars.currency_symbol+jQuery(this).attr('price')+"<br/>";
		html += "Level: "+jQuery(this).attr('level')+"<br/>";
		html += "Section: "+jQuery(this).attr('section')+"<br/>";
		html += "Row: "+jQuery(this).attr('row')+"<br/>";
		html += "Description: "+jQuery(this).children('.ee_s_description').html()+"<br/>";
		obj.html(html);
		obj.show();
        var viewport_w = jQuery(window).width();
        
        if ( (newLeft + obj.width()+40) > viewport_w ) {
            newLeft = parseInt(p1.left)+parseInt(p.left)- parseInt(obj.width()) - 96;
            
            obj.css('left',newLeft+'px');
        }
	});
	
	jQuery('.ee_s_seat').live('mouseout',function() {
		jQuery('#seating_chart_info').hide();
	});
	
	jQuery('.ee_s_seat').live('click',function() {
        if ( !disable_selection) {
            book_a_seat(jQuery(this));
        }
		return false;
	});
	
	
});


jQuery(document).ready(function(){
    jQuery('#bulk_edit').click(function(){ submit_bulk_edit();});
    
    jQuery('#bulk_edit_cancel').click(function(){ 
        jQuery('#bulk_seat_table').hide();
        jQuery('#bulk-titles').html('');
        jQuery('.seat_ids').filter(':checked').each(function(){
           jQuery('.seat_ids').attr('checked',false); 
        });
    });
    
    jQuery('.seat_submitdelete').click(function(){
       var seat_id = jQuery(this).attr('seat_id'); 
       jQuery('.seat_ids').each(function(){
          jQuery(this).attr('checked',false); 
       });
       jQuery('#chk_'+seat_id).attr('checked',true);
       delete_bulk_seats();
    });
    
    jQuery('.seat_editinline').click(function(){
        var seat_id = jQuery(this).attr('seat_id');
        if(!jQuery('#chk_'+seat_id).is(':checked')) {
            jQuery('#seat_list_action').val('edit');
            jQuery('#chk_'+seat_id).attr('checked',true);
            edit_bulk_seats();
        }
    });
    
    jQuery('.bulk_remove_seat').live('click',function() {
       var seat_id = jQuery(this).attr('seat_id');
       jQuery('#bulk_'+seat_id).remove();
       jQuery('#chk_'+seat_id).attr('checked',false);
    });
    
    jQuery('.seat_ids').click(function() {
        if ( !jQuery(this).is(':checked')) {
            if ( jQuery('#bulk_'+jQuery(this).val()).length > 0) {
                jQuery('#bulk_'+jQuery(this).val()).remove();
            }
        } else {
            add_seat_to_bulk_edit(jQuery(this).val());
        }
    });
    
    jQuery('#seat_list_doaction').click(function(){
        jQuery('#bulk-titles').html('');
        
        var selection_count = jQuery('.seat_ids').filter(':checked').length;
        if ( selection_count > 0 ) {
            var action = jQuery('#seat_list_action').val();
            switch(action) {
                case 'edit': 
                    edit_bulk_seats();
                    break;
                case 'trash':
                    delete_bulk_seats();
                    break;
                default:
                    alert('Please select an action!');
                    break;                
            }
        } else {
            alert('Please select at least one seat!');
        }
    });
    
   
});

function delete_bulk_seats() {
    jQuery('#bulk_seat_action').val('bulk_delete');
    jQuery('#frm_bulk_seat_action').submit();
}

function edit_bulk_seats() {
    //"<div class="type1">Level</div><div class="type1">Section</div><div class="type1">Row</div><div class="type1">Seat</div><div class="type2">Tag</div>"
    jQuery('#bulk-titles').html('<div class="bulk_seat bulk_seat_head"><div class="type0">&nbsp;</div><div class="type1">Level</div><div class="type1">Section</div><div class="type1">Row</div><div class="type1">Seat</div><div class="type2">Tag</div></div>');
    jQuery('.seat_ids').filter(':checked').each(function(){
        var seat_id = jQuery(this).val();
        add_seat_to_bulk_edit(seat_id);    
    });
    
    if(jQuery('#bulk_seat_table').is(':hidden')) {
        jQuery('#bulk_seat_table').slideDown('slow'); 
    }
}

function add_seat_to_bulk_edit(seat_id) {
    var bstring = '';
    bstring += '<div id="bulk_'+seat_id+'" seat_id='+seat_id+' class="bulk_seat"><div class="type0"><a title="Remove from bulk edit" class="bulk_remove_seat" seat_id="'+seat_id+'">X</a></div>';
    bstring += '<div class="type1">'+jQuery('#level_'+seat_id).html()+'</div>';
    bstring += '<div class="type1">'+jQuery('#section_'+seat_id).html()+'</div>';
    bstring += '<div class="type1">'+jQuery('#row_'+seat_id).html()+'</div>';
    bstring += '<div class="type1">'+jQuery('#seat_'+seat_id).html()+'</div>';
    bstring += '<div class="type2">'+jQuery('#custom_tag_'+seat_id).html()+'</div>';
    bstring += '</div>';
    //<div id="ttle11"><a title="Remove From Bulk Edit" class="ntdelbutton" id="_11">X</a>General 1 3 5</div>
    jQuery('#bulk-titles').html(jQuery('#bulk-titles').html()+bstring);
    //jQuery('#chk_'+seat_id).attr('checked',true);
}

function submit_bulk_edit() {
    var selection_count = jQuery('.seat_ids').filter(':checked').length;
    if ( selection_count > 0 ) {
        jQuery('#bulk_seat_action').val('bulk_edit');
        jQuery('#frm_bulk_seat_action').submit();
    } else {
        alert('Please select a seat first!');
    }
}