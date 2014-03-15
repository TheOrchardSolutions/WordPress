<?php
global $espresso_premium; if ($espresso_premium != true) return;
	global $current_user;
	wp_get_current_user();

	$userid = $current_user->ID;
	$um_fname = $current_user->user_firstname;
	$um_lname = $current_user->user_lastname; 
	$um_email = $current_user->user_email;
	$um_address = esc_attr(get_usermeta($userid,'event_espresso_address' ));
	$um_city = esc_attr(get_usermeta($userid,'event_espresso_city'));
	$um_state = esc_attr(get_usermeta($userid,'event_espresso_state'));
	$um_zip = esc_attr(get_usermeta($userid,'event_espresso_zip' ));
	$um_phone = esc_attr(get_usermeta($userid,'event_espresso_phone' ));
	
	//Get the options
	$member_options = get_option('events_member_settings');
		$login_page = $member_options['login_page'];
		$register_page = $member_options['register_page'];
		$member_only_all = $member_options['member_only_all'];
	if ($member_only_all == 'Y'){
		$member_only = 'Y';
	}
