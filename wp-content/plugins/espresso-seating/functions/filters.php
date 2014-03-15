<?php

function espresso_seating_chart_seat_info_filter($attendee_id, $event_id){
	global $wpdb;
	$booking_info = "";
	$seating_chart_id = seating_chart::check_event_has_seating_chart($event_id);
	if ( $seating_chart_id !== false ){
		$seat = $wpdb->get_row("select scs.* , sces.id as booking_id from ".EVENTS_SEATING_CHART_SEAT_TABLE." scs inner join ".EVENTS_SEATING_CHART_EVENT_SEAT_TABLE." sces on scs.id = sces.seat_id where sces.attendee_id = '".$attendee_id."' ");
		if ( $seat !== NULL ){
			$booking_info = "[".__('Seat', 'event_espresso').": ".$seat->custom_tag." | ".__('Booking ID', 'event_espresso').":".$seat->booking_id." ]";
		}
	}
	return $booking_info;
}
add_filter( 'espresso_seating_info', 'espresso_seating_chart_seat_info_filter', 10, 2 );