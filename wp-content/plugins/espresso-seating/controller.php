<?php

function event_espresso_manage_seating_chart (){
	do_action('ee_seating_chart_css');
	do_action('ee_seating_chart_js');
	do_action('ee_seating_chart_flush_expired_seats');
	if ( isset($_REQUEST['seating_chart_action']) ){
		switch($_REQUEST['seating_chart_action']){
			case 'create':
				create_seating_chart();
				break;
			case 'edit':
				edit_seating_chart();
				break;
			case 'seat_list':
				seat_list();
				break;
			case 'add_seat':
				add_seat();
				break;
			case 'edit_seat':
				edit_seat();
				break;
			case 'delete_seat':
				delete_seat();
				break;
			case 'delete':
				delete_seating_chart();
				break;
			case 'manage_event_seating_chart':
				manage_event_seating_chart();
				break;
			case 'seating_chart_list':
			default:
				display_seating_chart_list();
				break;
			case 'seating_chart_section_alignment':
			default:
				display_seating_chart_section_alignment();
				break;		
		}
	}else{
		display_seating_chart_list();
	}
	
}

/*
 * Display list of available seating chart
 */
function display_seating_chart_list(){
	require_once(dirname(__FILE__).'/template/seating_chart_list.php');
}


/*
 * Create a new seating chart
 */
function create_seating_chart(){
	require_once (dirname(__FILE__).'/lib/class/reader.php');
	require_once(dirname(__FILE__).'/template/create_seating_chart.php');
}

/*
 * Edit seating chart
 */
function edit_seating_chart(){
	require_once(dirname(__FILE__).'/template/edit_seating_chart.php');
}

/*
 * Display seats for a seating chart
 */
function seat_list(){
	require_once(dirname(__FILE__).'/template/seating_chart_seat_list.php');
} 

/*
 * Add a seat in a seating chart
 */
function add_seat(){
	require_once(dirname(__FILE__).'/template/create_seat.php');
}

/*
 * Modify a seat in a seating chart
 */
function edit_seat(){
	require_once(dirname(__FILE__).'/template/edit_seat.php');
}

/*
 * Manage seating chart associated with an event
 */
function manage_event_seating_chart(){
	require_once(dirname(__FILE__).'/template/manage_event_seating_chart.php');
}

/*
 * Display section of seating chart for alignment
 */
function display_seating_chart_section_alignment(){
	require_once(dirname(__FILE__).'/template/edit_section_alignment.php');
} 