<?php
//Build the user admin menu
if (get_option('events_members_active') == 'true'){
	add_action( 'show_user_profile', 'event_espresso_show_extra_profile_fields' );
	add_action( 'edit_user_profile', 'event_espresso_show_extra_profile_fields' );
	//Show the user admin menu in the side menu
add_action('admin_menu', 'add_member_event_espressotration_menus');
	
	function event_espresso_show_extra_profile_fields( $user ) { 
		global $espresso_premium; if ($espresso_premium != true) return;?>
	
		<h3><?php _e('Events Profile Information','event_espresso'); ?></h3>
	<a name="event_espresso_profile" id="event_espresso_profile"></a>
		<table class="form-table">
	
			<tr>
				<th><label for="event_espresso_address"><?php _e('Address/Street/Number','event_espresso'); ?></label></th>
	
				<td>
					<input type="text" name="event_espresso_address" id="event_espresso_address" value="<?php echo esc_attr( get_the_author_meta( 'event_espresso_address', $user->ID ) ); ?>" class="regular-text" /><br />
					<span class="description"><?php _e('Please enter your Address/Street/Number.','event_espresso'); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="event_espresso_city"><?php _e('City/Town/Village','event_espresso'); ?></label></th>
	
				<td>
					<input type="text" name="event_espresso_city" id="event_espresso_city" value="<?php echo esc_attr( get_the_author_meta( 'event_espresso_city', $user->ID ) ); ?>" class="regular-text" /><br />
					<span class="description"><?php _e('Please enter your City/Town/Village.','event_espresso'); ?></span>
				</td>
			 </tr>
			 <tr>
				<th><label for="event_espresso_state"><?php _e('State/County/Province','event_espresso'); ?></label></th>
	
				<td>
					<input type="text" name="event_espresso_state" id="event_espresso_state" value="<?php echo esc_attr( get_the_author_meta( 'event_espresso_state', $user->ID ) ); ?>" class="regular-text" /><br />
					<span class="description"><?php _e('Please enter your State/County/Province.','event_espresso'); ?></span>
				</td>
			 </tr>
			<tr>
				<th><label for="event_espresso_zip"><?php _e('Zip/Postal Code','event_espresso'); ?></label></th>
	
				<td>
					<input type="text" name="event_espresso_zip" id="event_espresso_zip" value="<?php echo esc_attr( get_the_author_meta( 'event_espresso_zip', $user->ID ) ); ?>" class="regular-text" /><br />
					<span class="description"><?php _e('Please enter your Zip/Postal Code.','event_espresso'); ?></span>
				</td>
			 </tr>
			<tr>
				<th><label for="event_espresso_phone"><?php _e('Phone Number','event_espresso'); ?></label></th>
	
				<td>
					<input type="text" name="event_espresso_phone" id="event_espresso_phone" value="<?php echo esc_attr( get_the_author_meta( 'event_espresso_phone', $user->ID ) ); ?>" class="regular-text" /><br />
					<span class="description"><?php _e('Please enter your Phone Number.','event_espresso'); ?></span>
				</td>
			 </tr>
			 
		</table>
<?php
	}
	add_action( 'personal_options_update', 'event_espresso_extra_profile_fields' );
	add_action( 'edit_user_profile_update', 'event_espresso_extra_profile_fields' );
	
function event_espresso_extra_profile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}
	update_usermeta( $user_id, 'event_espresso_address', $_POST['event_espresso_address'] );
	update_usermeta( $user_id, 'event_espresso_city', $_POST['event_espresso_city'] );
	update_usermeta( $user_id, 'event_espresso_state', $_POST['event_espresso_state'] );
	update_usermeta( $user_id, 'event_espresso_zip', $_POST['event_espresso_zip'] );
	update_usermeta( $user_id, 'event_espresso_phone', $_POST['event_espresso_phone'] );
	}
}

function event_espresso_get_current_user_role(){
	global $espresso_premium; if ($espresso_premium != true) return;
    global $current_user;
    get_currentuserinfo();
    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);
    return $user_role;
}

function add_member_event_espressotration_menus() {
	/*if (event_espresso_get_current_user_role() != 'administrator') {
		//add_menu_page(__('Advanced Events Registration Pro','event_espresso'), __('My Events','event_espresso'), event_espresso_get_current_user_role(), 'my-events', 'event_espresso_my_events', EVENT_ESPRESSO_PLUGINFULLURL.'images/events_icon_16.png');
		//add_submenu_page('my-events', __('View Events','event_espresso'), __('View Events','event_espresso'), event_espresso_get_current_user_role(),  'my-events', 'event_espresso_my_events');
	 	//add_submenu_page('my-events', __('Update Profile','event_espresso'), __('Update Profile','event_espresso'), event_espresso_get_current_user_role(),  'profile.php', 'event_espresso_show_profile_page');
	}*/
	global $espresso_premium; if ($espresso_premium != true) return;
	add_users_page(__('My Events','event_espresso'), __('My Events','event_espresso'), event_espresso_get_current_user_role(), 'my-events', 'event_espresso_my_events');
}

function event_espresso_user_login(){
	global $espresso_premium; if ($espresso_premium != true) return;
	$member_options = get_option('events_member_settings');
	
	//Get the member login page
	if ($member_options['login_page'] != ''){
		$login_page = $member_options['login_page'];
	}else{
		$login_page =  get_option('siteurl') . '/wp-login.php';
	}
	
	//Get the member regsitration page
	if ($member_options['register_page'] != ''){
		$register_page = $member_options['register_page'];
	}else{
		$register_page =  get_option('siteurl') . '/wp-login.php?action=register';
	}
	echo '<h3>' . __('You are not logged in.','event_espresso') . '</h3>';
	echo '<p>' . __('Before you can reserve a spot, you must register.','event_espresso') . '</p>';
	echo '<p>If you are a returning user please <a href="' . $login_page . '?redirect_to=' . urlencode(event_espresso_cur_pageURL()) . '">' . __('Login','event_espresso') . '</a></p>';
	if (get_option('users_can_register')) {
		echo '<p>' . __('New users please','event_espresso') . ' <a href="' . $register_page . '">' . __('Register','event_espresso') . '</a></p>';
	}else{
		_e('Member registration is closed for this site. Please contact the site owner.','event_espresso');
	}
}

function event_espresso_member_only($member_only = 'N'){
	global $espresso_premium; if ($espresso_premium != true) return;?>
	<p><?php _e('Member only event? ','event_espresso');
	$values=array(					
        array('id'=>'N','text'=> __('No','event_espresso')),
        array('id'=>'Y','text'=> __('Yes','event_espresso')));				
		echo select_input('member_only', $values, $member_only);?></p>
 <?php 
}
function event_espresso_user_login_link(){
	global $espresso_premium; if ($espresso_premium != true) return;
	//Get the member login page
	if ($member_options['login_page'] != ''){
		$login_page = $member_options['login_page'];
	}else{
		$login_page =  get_option('siteurl') . '/wp-login.php';
	}
	echo '<a href="' . $login_page . '?redirect_to=' . urlencode(event_espresso_cur_pageURL()) . '">' . __('Login','event_espresso') . '</a>';
}

//Add the ids of the event, user, and attendee to the db
function event_espresso_add_user_to_event($event_id, $userid, $attendee_id){
	global $espresso_premium; if ($espresso_premium != true) return;
	global $wpdb;
	$user_role = event_espresso_get_current_user_role();
	$sql = "INSERT INTO " . EVENTS_MEMBER_REL_TABLE . "(event_id, user_id, attendee_id, user_role) VALUES ('" . $event_id . "', '" . $userid . "', '" . $attendee_id . "', '" . $user_role . "')"; 
	$wpdb->query($wpdb->prepare($sql));
}

/*
Returns the price of an event for members
* 
* @params string $date
*/
if (!function_exists('event_espresso_get_price')) {
	function event_espresso_get_price($event_id) {
		global $espresso_premium; if ($espresso_premium != true) return;
			$org_options = get_option('events_organization_settings');
			global $wpdb;
			if (is_user_logged_in()){
				$prices = $wpdb->get_results("SELECT event_cost, member_price FROM " . EVENTS_PRICES_TABLE . " WHERE event_id='".$event_id."' ORDER BY id ASC LIMIT 1");
			}else{
				$prices = $wpdb->get_results("SELECT event_cost FROM " . EVENTS_PRICES_TABLE . " WHERE event_id='".$event_id."' ORDER BY id ASC LIMIT 1");
			}
			foreach ($prices as $price){
				if ($wpdb->num_rows == 1) {
					$member_price = ($price->member_price  == "") ? $price->event_cost : $price->member_price;
					if ($member_price == 0.00){
						$event_cost = __('Free Event','event_espresso');
					}else{
						$event_cost = $org_options['currency_symbol'] . $member_price;
						$event_cost .= '<input type="hidden"name="event_cost" value="' . $member_price . '">';
					}
				}else if ($wpdb->num_rows == 0){
					$event_cost = __('Free Event','event_espresso');
				}
			}
			
			return $event_cost;
	}
}
function event_espresso_member_only_pricing($event_id = 'NULL'){
	global $espresso_premium; if ($espresso_premium != true) return;
	?>
  <p><strong><?php _e('Member Pricing','event_espresso'); ?></strong></p>
  <?php
	if ($event_id == 0){
		event_espresso_member_pricing_new();
	}else{
		event_espresso_member_pricing_update($event_id);
	}?>
    <p><input type="button" value="<?php _e('Add A Member Price','event_espresso'); ?>" onClick="addMemberPriceInput('dynamicMemberPriceInput');"></p></td>    
<?php	
}

if (!function_exists('event_espresso_member_pricing_update')) {
function event_espresso_member_pricing_update($event_id) {
	global $espresso_premium; if ($espresso_premium != true) return;
	$org_options = get_option('events_organization_settings');
	global $wpdb;
	$member_price_counter = 1;?>
                <ul id="dynamicMemberPriceInput" style="margin:0; padding:0 0 0 10px;">
<?php 
		$member_prices = $wpdb->get_results("SELECT member_price, member_price_type FROM ". EVENTS_PRICES_TABLE ." WHERE event_id = '".$event_id."' ORDER BY id");
		foreach ($member_prices as $member_price){
			echo '<li>' . __('Name','event_espresso') . ' ' . $member_price_counter++.': <input size="10"  type="text" name="member_price_type[]" value="' . $member_price->member_price_type . '"> ';
			echo __('Price','event_espresso') . ': ' . $org_options['currency_symbol'] . '<input size="5"  type="text" name="member_price[]" value="' . $member_price->member_price . '">';
			echo '<img  onclick="this.parentNode.parentNode.removeChild(this.parentNode);" src="' . EVENT_ESPRESSO_PLUGINFULLURL . 'images/icons/remove.gif" alt="' . __('Remove Attendee', 'event_espresso') . '" />';
			
			echo '</li>';
		}
	?>
					</ul>
					<p>
					  <?php _e('(enter 0.00 for free events, enter 2 place decimal i.e. '.$org_options['currency_symbol'].'7.00)','event_espresso'); ?>
					</p>
                  <p><?php _e('<span style="color:red;">Note:</span> A non-member price MUST be entered for each row, even if this is a member only event.','event_espresso'); ?></p>
                
                  
				  <script>
	//Dynamic form fields
	var member_price_counter = <?php echo $member_price_counter++ ?>;
	function addMemberPriceInput(divName){
			  var newdiv = document.createElement('li');
			  newdiv.innerHTML = "<?php _e('Name','event_espresso'); ?> " + (member_price_counter) + ": <input type='text' size='10' name='member_price_type[]'> <?php _e('Price','event_espresso'); ?>: <?php echo $org_options['currency_symbol'] ?><input type='text' size='5' name='member_price[]'> <?php echo "<img  onclick='this.parentNode.parentNode.removeChild(this.parentNode);' src='" . EVENT_ESPRESSO_PLUGINFULLURL . "images/icons/remove.gif' alt='" . __('Remove Attendee', 'event_espresso') . ' />';?>";
			  document.getElementById(divName).appendChild(newdiv);
			  counter++;
	}
	</script>
<?php
}
}

if (!function_exists('event_espresso_member_pricing_new')) {
function event_espresso_member_pricing_new() {
	global $espresso_premium; if ($espresso_premium != true) return;
$member_price_counter = 1;?>
                <ul id="dynamicMemberPriceInput" style="margin:0; padding:0 0 0 10px;">
                  <li>
                    <?php _e('Name','event_espresso'); ?>
                    <?php echo $member_price_counter ?>:
                    <input size="10"  type="text"  name="member_price_type[]">
                    <?php _e('Price:','event_espresso'); ?>
                    <?php echo $org_options['currency_symbol'] ?>
                    <input size="5"  type="text"  name="member_price[]">
                    <?php echo '<img  onclick="this.parentNode.parentNode.removeChild(this.parentNode);" src="' . EVENT_ESPRESSO_PLUGINFULLURL . 'images/icons/remove.gif" alt="' . __('Remove Attendee', 'event_espresso') . '" />';?>
                  </li>
                </ul>
                <p>
                  <?php _e('(enter 0.00 for free events, enter 2 place decimal i.e. 7.00)','event_espresso'); ?>
                </p>
              <p><?php _e('<span style="color:red;">Note:</span> A non-member price MUST be entered, even if this is a member only event.','event_espresso'); ?></p>
              <script>
        //Dynamic form fields
        var member_price_counter = <?php echo $member_price_counter++ ?>;
        function addMemberPriceInput(divName){
                  var newdiv = document.createElement('li');
                  newdiv.innerHTML = "<?php _e('Name','event_espresso'); ?> " + (member_price_counter) + ": <input type='text' size='10' name='member_price_type[]'> <?php _e('Price','event_espresso'); ?>: <?php echo $org_options['currency_symbol'] ?><input type='text' size='5' name='member_price[]'> <?php echo "<img  onclick='this.parentNode.parentNode.removeChild(this.parentNode);' src='" . EVENT_ESPRESSO_PLUGINFULLURL . "images/icons/remove.gif' alt='" . __('Remove Attendee', 'event_espresso') . ' />';?>";
                  document.getElementById(divName).appendChild(newdiv);
                  counter++;
        }
        </script>
         </li>
<?php
}
}

//Creates dropdowns if multiple prices are associated with an event
if (!function_exists('event_espresso_price_dropdown')) {
	function event_espresso_price_dropdown($event_id) {
		global $espresso_premium; if ($espresso_premium != true) return;
		global $wpdb,$org_options;
		if (is_user_logged_in()){
			$prices = $wpdb->get_results("SELECT id, event_cost, surcharge, surcharge_type, member_price, member_price_type, price_type FROM " . EVENTS_PRICES_TABLE . " WHERE event_id='".$event_id."' ORDER BY id ASC");
		}else{
			$prices = $wpdb->get_results("SELECT id, event_cost, surcharge, surcharge_type, price_type FROM " . EVENTS_PRICES_TABLE . " WHERE event_id='".$event_id."' ORDER BY id ASC");
		}
		if ($wpdb->num_rows > 1) {
			echo '<label for="event_cost">' . __('Choose an Option: ','event_espresso') . '</label>';
			echo '<select name="price_option" id="price_option-' . $event_id . '">';
			//foreach ($prices as $price){
				
				foreach ($prices as $price){

				$member_price = ($price->member_price  == "") ? $price->event_cost : $price->member_price;

				$member_price_type = ($price->member_price_type  == "") ? $price->price_type : $price->member_price_type;

				
				
				// Addition for Early Registration discount
				if (early_discount_amount($event_id, $member_price) != false){
					$early_price_data = array();
					$early_price_data = early_discount_amount($event_id, $member_price);
					$member_price = $early_price_data['event_price'];
					$message = __(' Early Pricing','event_espresso');
				}

				//$surcharge = ($price->surcharge > 0.00 && $member_price > 0.00)?" +{$price->surcharge}% " . __('Surcharge','event_espresso'):'';
				$surcharge = '';

                    if ($price->surcharge > 0 &&  $member_price > 0.00){
                            $surcharge = " + {$org_options['currency_symbol']}{$price->surcharge} " . __( 'Surcharge', 'event_espresso' );
                        if ( $price->surcharge_type == 'pct'){
                            $surcharge = " + {$price->surcharge}% " . __( 'Surcharge', 'event_espresso' );
                        }
                    }
				
				//Using price ID
				echo '<option value="' . $price->id . '|' . $member_price_type . '">' . $member_price_type . ' (' . $org_options['currency_symbol'] .  number_format($member_price,2, '.', '') . $message  . ') '. $surcharge . ' </option>';
				//echo '<option value="' . $member_price . '|' . $member_price_type . '">' . $member_price_type . ' (' . $org_options['currency_symbol'] .  $member_price . ')</option>';

			}

				
			//}
			echo '</select><input type="hidden" name="price_select" id="price_select-' . $event_id . '" value="true">';
		}else if ($wpdb->num_rows == 1) {
			foreach ($prices as $price){
				if (is_user_logged_in()){
					$member_price = $price->member_price;
				}else{
					$member_price = $price->event_cost;
				}
				// Addition for Early Registration discount
				if (early_discount_amount($event_id, $member_price) != false){
					$early_price_data = array();
					$early_price_data = early_discount_amount($event_id, $member_price);
					$member_price = $early_price_data['event_price'];
					$message = __(' (including ' . $early_price_data['early_disc'] . ' early discount)', 'event_espresso');
				}

				//$surcharge = ($price->surcharge > 0.00 && $member_price > 0.00)?" +{$price->surcharge}% " . __('Surcharge','event_espresso'):'';
				$surcharge = '';

                    if ($price->surcharge > 0 &&  $member_price > 0.00){
                            $surcharge = " + {$org_options['currency_symbol']}{$price->surcharge} " . __( 'Surcharge', 'event_espresso' );
                        if ( $price->surcharge_type == 'pct'){
                            $surcharge = " + {$price->surcharge}% " . __( 'Surcharge', 'event_espresso' );
                        }
                    }

				echo '<span class=event_price_label">' . __('Price: ','event_espresso') . '</span> <span class="event_price_value">' . $org_options['currency_symbol'] . number_format($member_price,2, '.', '') . $message . $surcharge . '</span>';
				echo '<input type="hidden" name="price_id" id="price_id-' . $event_id . '" value="' . $price->id . '">';
			}
		}else if ($wpdb->num_rows < 0){
			echo '<span class="free_event">' . __('Free Event','event_espresso') . '</span>';
			echo '<input type="hidden" name="payment" id="payment-' . $event_id . '" value="' . __('free event','event_espresso') . '">';
		}
	}
}

/*
Returns the final price of an event
*
* @params string $event_id
*/
if (!function_exists('event_espresso_get_final_price')) {
	function event_espresso_get_final_price($price_id, $event_id = 0 ) {
		global $espresso_premium; if ($espresso_premium != true) return;
		global $wpdb, $org_options;
		
		//Added the following 5 lines, as this was causing non-members to get the member price.
		if (is_user_logged_in()){
			$prices = $wpdb->get_results("SELECT id, event_cost, member_price, surcharge FROM " . EVENTS_PRICES_TABLE . " WHERE id='".$price_id."' ORDER BY id ASC LIMIT 1");
		}else{
			$prices = $wpdb->get_results("SELECT id, event_cost, surcharge FROM " . EVENTS_PRICES_TABLE . " WHERE id='".$price_id."' ORDER BY id ASC LIMIT 1");
		}
		
		//$prices = $wpdb->get_results("SELECT id, event_cost, member_price, surcharge FROM " . EVENTS_PRICES_TABLE . " WHERE id='".$price_id."' ORDER BY id ASC LIMIT 1");
		foreach ($prices as $price){
			if ($wpdb->num_rows >= 1) {
				
				$member_price = ($price->member_price  == "") ? $price->event_cost : $price->member_price;
				
				if ($member_price > 0.00){
					$member_price = $price->surcharge > 0.00 && $member_price > 0.00 ? $member_price + number_format($member_price * $price->surcharge / 100, 2, '.', '') : $member_price;
					
					// Addition for Early Registration discount
					if (early_discount_amount($event_id, $member_price) != false){
						$early_price_data = array();
						$early_price_data = early_discount_amount($event_id, $member_price);
						$member_price = $early_price_data['event_price'];
					}
				
				}else{
					$member_price = 0.00;
				}
			}else if ($wpdb->num_rows == 0){
				$member_price = 0.00;
			}
		}

		return $member_price;
	}
}

/*//Creates dropdowns if multiple prices are associated with an event
if (!function_exists('event_espresso_price_dropdown')) {
function event_espresso_price_dropdown($event_id) {
		$org_options = get_option('events_organization_settings');
		global $wpdb;
		if (is_user_logged_in()){
			$prices = $wpdb->get_results("SELECT id, event_cost, member_price, member_price_type, price_type  FROM " . EVENTS_PRICES_TABLE . " WHERE event_id='".$event_id."' ORDER BY id ASC");
		}else{
			$prices = $wpdb->get_results("SELECT id, event_cost, price_type  FROM " . EVENTS_PRICES_TABLE . " WHERE event_id='".$event_id."' ORDER BY id ASC");
		}
		if ($wpdb->num_rows > 1) {
			echo '<label for="event_cost">' . __('Choose an Option:','event_espresso') . '</label>';
			echo '<select name="event_cost" id="event_cost-' . $event_id . '">';
			foreach ($prices as $price){
				$member_price = ($price->member_price  == "") ? $price->event_cost : $price->member_price;
				$member_price_type = ($price->member_price_type  == "") ? $price->price_type : $price->member_price_type;
				echo '<option value="' . $member_price . '|' . $member_price_type . '">' . $member_price_type . ' (' . $org_options['currency_symbol'] .  $member_price . ')</option>';
			}
			echo '</select><input type="hidden" name="price_select" id="price_select-' . $price->id . '" value="true">';
			echo $event_cost_dd_end;
		}else if ($wpdb->num_rows == 1) {
			foreach ($prices as $price){
				$member_price = ($price->member_price  == "") ? $price->event_cost : $price->member_price;
				echo '<span class="span_event_price_label">' . __('Price:','event_espresso') . '</span> <span class="span_event_price_value">' . $org_options['currency_symbol'] . $member_price . '</span>';
				echo '<input type="hidden" name="event_cost" id="event_cost-' . $price->id . '" value="' . $member_price . '">';
			}
		}else if ($wpdb->num_rows < 0){
			echo '<span class="span_free_event">' . __('Free Event','event_espresso') . '</span>';
			echo '<input type="hidden" name="payment" id="payment' . $price->id . '" value="free event">';
		}
}
}*/
