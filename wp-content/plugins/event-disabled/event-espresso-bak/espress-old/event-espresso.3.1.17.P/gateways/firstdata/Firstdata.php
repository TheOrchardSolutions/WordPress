<?php

function espresso_transactions_firstdata_get_attendee_id($attendee_id) {
	if (isset($_REQUEST['id']))
		$attendee_id = $_REQUEST['id'];
	return $attendee_id;
}

add_filter('filter_hook_espresso_transactions_get_attendee_id', 'espresso_transactions_firstdata_get_attendee_id');

function espresso_process_firstdata($payment_data) {
	global $wpdb;
	$attendee_id = $payment_data['attendee_id'];
	$registration_id = espresso_registration_id($attendee_id);

	$sql = "SELECT ea.amount_pd, ed.event_name FROM " . EVENTS_ATTENDEE_TABLE . " ea ";
	$sql .= "JOIN " . EVENTS_DETAIL_TABLE . " ed ";
	$sql .= "ON ed.id = ea.event_id ";
	$sql .= " WHERE registration_id = '" . $registration_id . "' ";
	$sql .= " ORDER BY ea.id ASC LIMIT 1";

	$r = $wpdb->get_row($sql);

	if (!$r || $wpdb->num_rows == 0) {

		exit("Looks like something went wrong.  Please try again or notify the website administrator.");
	}


	$firstdata_settings = get_option('event_espresso_firstdata_settings');

	$pem_file = EVENT_ESPRESSO_PLUGINFULLPATH . "gateways/firstdata/" . $firstdata_settings['firstdata_store_id'] . ".pem";

	if (file_exists(EVENT_ESPRESSO_GATEWAY_DIR . "firstdata/" . $firstdata_settings['firstdata_store_id'] . ".pem")) {

		$pem_file = EVENT_ESPRESSO_GATEWAY_DIR . "firstdata/" . $firstdata_settings['firstdata_store_id'] . ".pem";
	}


	include"lphp.php";
	$mylphp = new lphp;
	$myorder["debugging"] = $firstdata_settings['use_sandbox'];
	$myorder["host"] = $myorder["debugging"] ? "staging.linkpt.net" : "secure.linkpt.net";
	$myorder["port"] = "1129";
	$myorder["keyfile"] = $pem_file; # Change this to the name and location of your certificate file
	$myorder["configfile"] = $firstdata_settings['firstdata_store_id']; # Change this to your store number

	$myorder["ordertype"] = "SALE";
	$myorder["result"] = "LIVE"; # For a test, set result to GOOD, DECLINE, or DUPLICATE
	$myorder["cardnumber"] = $_POST['card_num'];
	$myorder["cardexpmonth"] = $_POST['expmonth'];
	$myorder["cardexpyear"] = $_POST['expyear'];
	$myorder["chargetotal"] = $r->amount_pd;

	$myorder["name"] = $_POST['first_name'] . ' ' . $_POST['last_name'];
	$myorder["address1"] = $_POST['address'];
	$myorder["city"] = $_POST["city"];
	$myorder["state"] = $_POST["state"];
	$myorder["email"] = $_POST["email"];

	/**
	 * It looks like firstdata requires addrnum, the beginning
	 * number of the address.  On their test forms, they have a specific
	 * field for this.  I am just going to grab the address, split it and grab
	 * index 0.  Will see how this goes before adding a new field.  If can't split the
	 * address, will pass it full.
	 */
	$addrnum = $_POST['address'];

	$temp_address = explode(" ", $_POST['address']);

	if (count($temp_address > 0))
		$addrnum = $temp_address[0];

	$myorder["addrnum"] = $addrnum;
	$myorder["zip"] = $_POST["zip"];

	$payment_data['txn_type'] = 'FirstData';
	$payment_data['payment_status'] = "Incomplete";
	$payment_data['txn_id'] = 0;
	$payment_data['txn_details'] = serialize($_REQUEST);

	$result = $mylphp->curl_process($myorder); # use curl methods

	if ($myorder["debugging"]) {
		echo "<p>var_dump of order data:</p> ";
		var_dump($myorder);

		echo "<br />";
		echo "<p>var_dump of result:</p> ";
		var_dump($result);
		echo '<h3 style="color:#ff0000;" title="Payments will not be processed">' . __('End of Debugging / Sandbox output (this will go away when you switch to live transactions)', 'event_espresso') . '</h3>';
	}

	if (!empty($result)) {
		$payment_data['txn_details'] = serialize($result);
		$payment_data['txn_id'] = $result["r_ordernum"];
		if ($result["r_approved"] != "APPROVED") {
			if ($result['r_approved'] != '<')
				echo "<br />Status: " . $result['r_approved'];
			if ($result['r_error'] != '<')
				echo "<br />Error: " . $result['r_error'];
			echo "<br />";
		} else { // success
			$payment_data['payment_status'] = 'Completed';
		}
	}
	$payment_data = apply_filters('filter_hook_espresso_get_total_cost', $payment_data);
	$payment_data = apply_filters('filter_hook_espresso_prepare_event_link', $payment_data);
	$payment_data = apply_filters('filter_hook_espresso_update_attendee_payment_data_in_db', $payment_data);
	do_action('action_hook_espresso_email_after_payment', $payment_data);
	return $payment_data;
}

add_filter('filter_hook_espresso_transactions_get_payment_data', 'espresso_process_firstdata');