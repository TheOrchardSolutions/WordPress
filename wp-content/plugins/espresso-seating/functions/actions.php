<?php
//Creates a field to select a seat in the seating chart
if ( !function_exists('espresso_seating_chart_select') ){
	function espresso_seating_chart_select($event_id, $booking_info=''){
		global $wpdb;
		$seating_chart_id = seating_chart::check_event_has_seating_chart($event_id);
		if ( $seating_chart_id !== false ){
	?>
			<div class="event_questions" id="event_seating_chart">
			
			<p class="event_form_field">
			<label><span class="section-title"><?php echo !is_admin() ? __('Select a Seat:', 'event_espresso'): __('View Layout', 'event_espresso'); ?></span></label>
			<input name="seat_id" type="text" class="ee_s_select_seat required" title="<?php echo !is_admin() ? __('Please select a seat.', 'event_espresso') : __('View layout.', 'event_espresso'); ?>" value="<?php echo $booking_info ?>" size="30" readonly="readonly" event_id="<?php echo $event_id; ?>"  />
	<?php
			$seating_chart = $wpdb->get_row("select * from ".EVENTS_SEATING_CHART_TABLE." where id = $seating_chart_id");
			if (trim($seating_chart->image_name) != "" && file_exists(EVENT_ESPRESSO_UPLOAD_DIR.'seatingchart/images/'.$seating_chart->image_name) ){
	?>
				<br/>
				<a href="<?php echo EVENT_ESPRESSO_UPLOAD_URL . 'seatingchart/images/' . $seating_chart->image_name; ?>" target="_blank"><?php _e('Seating Chart Image', 'event_espresso'); ?></a>
	<?php
			}
	?>
			</p>
			</div>
	<?php
		}
	}
}
add_action( 'espresso_seating_chart_select', 'espresso_seating_chart_select', 10, 2 );

//Displays the price range of the event if a seating chart is assigned to it.
//If no seating chart is assigned, then it will display the default price selection.
if ( !function_exists('espresso_seating_price_select_action') ){
	
	function espresso_seating_price_select_action($event_id, $atts = '' ){
		global $org_options;
		
			$price_range = seating_chart::get_price_range($event_id);
			$price = "";
			if ($price_range['min'] != $price_range['max']) {
				$price = '<span class="section-title">'.__('Price Range', 'event_espresso').'</span>: '.$org_options['currency_symbol'] . number_format($price_range['min'], 2) . ' - ' . $org_options['currency_symbol'] . number_format($price_range['max'], 2);
			} else {
				$price = '<span class="section-title">'.__('Price', 'event_espresso').'</span>: '.$org_options['currency_symbol'] . number_format($price_range['min'], 2);
			}
			echo $price;
		
	}
	
	add_action('espresso_seating_price_select_action', 'espresso_seating_price_select_action', 10, 2);
}