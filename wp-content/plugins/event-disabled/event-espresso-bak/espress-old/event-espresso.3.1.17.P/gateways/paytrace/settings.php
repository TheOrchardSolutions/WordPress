<?php

function event_espresso_paytrace_payment_settings() {
	global $espresso_premium, $active_gateways;
	if (!$espresso_premium)
		return;
	if (isset($_POST['update_paytrace'])) {
		$paytrace_settings['paytrace_user_id'] = $_POST['paytrace_user_id'];
		$paytrace_settings['paytrace_user_pass'] = $_POST['paytrace_user_pass'];
		update_option('event_espresso_paytrace_settings', $paytrace_settings);
		echo '<div id="message" class="updated fade"><p><strong>' . __('Paytrace settings saved.', 'event_espresso') . '</strong></p></div>';
	}
	$paytrace_settings = get_option('event_espresso_paytrace_settings');
	if (empty($paytrace_settings)) {
		$paytrace_settings['paytrace_user_id'] = '';
		$paytrace_settings['paytrace_user_pass'] = '';
		if (add_option('event_espresso_paytrace_settings', $paytrace_settings, '', 'no') == false) {
			update_option('event_espresso_paytrace_settings', $paytrace_settings);
		}
	}

	//Open or close the postbox div
	if (empty($_REQUEST['deactivate_paytrace'])
					&& (!empty($_REQUEST['activate_paytrace'])
					|| array_key_exists('paytrace', $active_gateways))) {
		$postbox_style = '';
	} else {
		$postbox_style = 'closed';
	}
	?>

	<div class="metabox-holder">
		<div class="postbox <?php echo $postbox_style; ?>">
			<div title="Click to toggle" class="handlediv"><br /></div>
			<h3 class="hndle">
				<?php _e('Paytrace Settings', 'event_espresso'); ?>
			</h3>
			<div class="inside">
				<div class="padding">
					<?php
					if (!empty($_REQUEST['activate_paytrace'])) {
						$active_gateways['paytrace'] = dirname(__FILE__);
						update_option('event_espresso_active_gateways', $active_gateways);
					}
					if (!empty($_REQUEST['deactivate_paytrace'])) {
						unset($active_gateways['paytrace']);
						update_option('event_espresso_active_gateways', $active_gateways);
					}
					echo '<ul>';
					if (array_key_exists('paytrace', $active_gateways)) {
						echo '<li id="deactivate_paytrace" style="width:30%;" onclick="location.href=\'' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=payment_gateways&deactivate_paytrace=true\';" class="red_alert pointer"><strong>' . __('Deactivate Paytrace?', 'event_espresso') . '</strong></li>';
						event_espresso_display_paytrace_settings();
					} else {
						echo '<li id="activate_paytrace" style="width:30%;" onclick="location.href=\'' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=payment_gateways&activate_paytrace=true\';" class="green_alert pointer"><strong>' . __('Activate Paytrace?', 'event_espresso') . '</strong></li>';
					}
					echo '</ul>';
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
}

//PayPal Settings Form
function event_espresso_display_paytrace_settings() {
	$paytrace_settings = get_option('event_espresso_paytrace_settings');
	?>
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
		<table width="99%" border="0" >
			<tr>
				<td valign="top">
					<ul>
						<li>
							<label for="paytrace_user_id">
								<?php _e('Paytrace User ID:', 'event_espresso'); ?>
							</label>
							<br />
							<input type="text" name="paytrace_user_id" size="35" value="<?php echo $paytrace_settings['paytrace_user_id']; ?>">
						</li>
						<li>
							<label for="paytrace_user_pass">
								<?php _e('Paytrace User Password:', 'event_espresso'); ?>
							</label>
							<br />
							<input type="text" name="paytrace_user_pass" size="35" value="<?php echo $paytrace_settings['paytrace_user_pass']; ?>">
						</li>

					</ul>
				</td>
			</tr>
		</table>
		<p>
			<input type="hidden" name="update_paytrace" value="update_paytrace">
			<input class="button-primary" type="submit" name="Submit" value="<?php _e('Update Paytrace Settings', 'event_espresso') ?>" id="save_paytrace_settings" />
		</p>
	</form>
	<?php
}

add_action('action_hook_espresso_display_gateway_settings','event_espresso_paytrace_payment_settings');
