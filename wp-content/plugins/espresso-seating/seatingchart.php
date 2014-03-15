<?php
/*
  Plugin Name: Event Espresso - Seating Chart
  Plugin URI: http://www.eventespresso.com
  Description: Customizable seating chart plugin for Event Espresso
  Version: 1.1.2-alpha
  Author: Event Espresso
  Author URI: http://www.eventespresso.com
  Copyright 2012  Event Espresso  (email : support@eventespresso.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

function espresso_seating_version() {
    return '1.1.2-alpha';
}

//Update notifications
add_action('action_hook_espresso_seating_update_api', 'ee_seating_load_pue_update');
function ee_seating_load_pue_update() {
	global $org_options, $espresso_check_for_updates;
	if ( $espresso_check_for_updates == false )
		return;
		
	if (file_exists(EVENT_ESPRESSO_PLUGINFULLPATH . 'class/pue/pue-client.php')) { //include the file 
		require(EVENT_ESPRESSO_PLUGINFULLPATH . 'class/pue/pue-client.php' );
		$api_key = $org_options['site_license_key'];
		$host_server_url = 'http://eventespresso.com';
		$plugin_slug = 'espresso-seating';
		$options = array(
			'apikey' => $api_key,
			'lang_domain' => 'event_espresso',
			'checkPeriod' => '24',
			'option_key' => 'site_license_key',
      'options_page_slug' => 'event_espresso'
		);
		$check_for_updates = new PluginUpdateEngineChecker($host_server_url, $plugin_slug, $options); //initiate the class and start the plugin update engine!
	}
}

define("ESPRESSO_SEATING_VERSION", espresso_seating_version());
define('ESPRESSO_SEATING_CHART', 1);

global $wpdb;

//Table definitions
// Added if !defined because these constants are also defined in event-espresso-3.1 table definations. Didn't remove them for backward compatibility - IMON
if(!defined("EVENTS_SEATING_CHART_TABLE")) {
    define("EVENTS_SEATING_CHART_TABLE", $wpdb->prefix . "events_seating_chart");
}   
if(!defined("EVENTS_SEATING_CHART_SEAT_TABLE")) {
    define("EVENTS_SEATING_CHART_SEAT_TABLE", $wpdb->prefix . "events_seating_chart_seat");
}
if(!defined("EVENTS_SEATING_CHART_EVENT_TABLE")) {
    define("EVENTS_SEATING_CHART_EVENT_TABLE", $wpdb->prefix . "events_seating_chart_event");
}
if(!defined("EVENTS_SEATING_CHART_EVENT_SEAT_TABLE")) {
    define("EVENTS_SEATING_CHART_EVENT_SEAT_TABLE", $wpdb->prefix . "events_seating_chart_event_seat");
}
if(!defined("EVENTS_SEATING_CHART_LEVEL_SECTION_ALIGNMENT_TABLE")) {
    define("EVENTS_SEATING_CHART_LEVEL_SECTION_ALIGNMENT_TABLE", $wpdb->prefix . "events_seating_chart_level_section_alignment");
}

require_once(dirname(__FILE__) . '/lib/class/seating_chart.class.php');
require_once('controller.php');

//Get the plugin url and content directories.
//These variables are used to define the plugin and content directories in the constants below.
$wp_plugin_url = WP_PLUGIN_URL;
$wp_content_url = WP_CONTENT_URL;

//Check if SSL is loaded
if (is_ssl()) {

    //Create the server name
    $server_name = str_replace('https://', '', site_url());

    //If the site is using SSL, we need to make sure our files get loaded in SSL.
    //This will (should) make sure everything is loaded via SSL
    //So that the "..not everything is secure.." message doesn't appear
    //Still will be a problem if other themes and plugins do not implement ssl correctly
    $wp_plugin_url = str_replace('http://', 'https://', WP_PLUGIN_URL);
    $wp_content_url = str_replace('http://', 'https://', WP_CONTENT_URL);
} else {
    $server_name = str_replace('http://', '', site_url());
}

//Define the plugin directory and path
define("ESPRESSO_SEATING_PLUGINPATH", "/" . plugin_basename(dirname(__FILE__)) . "/");
define("ESPRESSO_SEATING_FULLPATH", WP_PLUGIN_DIR . ESPRESSO_SEATING_PLUGINPATH);
define("ESPRESSO_SEATING_FULLURL", $wp_plugin_url . ESPRESSO_SEATING_PLUGINPATH);

//Include files
require_once("functions/main.php");
require_once("functions/actions.php");
require_once("functions/filters.php");

//Admin only files
if (is_admin()) {
    //admin files
    require_once("functions/admin.php");

    // Install/Update Tables when plugin is activated
    require_once("functions/database_install.php");
    register_activation_hook(__FILE__, 'espresso_seating_data_tables_install');
}