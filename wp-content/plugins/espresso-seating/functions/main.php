<?php
//Core functions

//Load Javascript files
function espresso_seating_chart_load_js(){
	global $org_options;
	wp_enqueue_script('ee_seating_chart_js', ESPRESSO_SEATING_FULLURL.'lib/js/seating_chart.js',array('jquery'));
	wp_localize_script('ee_seating_chart_js', 'ee_seating_chart_vars', array('callback_url'=>ESPRESSO_SEATING_FULLURL,'currency_symbol'=>$org_options['currency_symbol']));
}
add_action('ee_seating_chart_js','espresso_seating_chart_load_js');

//Load CSS files
function espresso_seating_chart_load_css(){
	wp_enqueue_style( 'jquery.ee_seating_chart_css', ESPRESSO_SEATING_FULLURL.'lib/css/seating_chart.css');
}
add_action('ee_seating_chart_css','espresso_seating_chart_load_css');
	
//Flush the expired seats
function espresso_seating_chart_clear_booking(){

	seating_chart::clear_booking();

}
add_action('ee_seating_chart_flush_expired_seats','espresso_seating_chart_clear_booking');
