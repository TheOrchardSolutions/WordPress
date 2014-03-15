<?php
/*
  Plugin Name: Event Espresso - Multi Event Registration
  Plugin URI: http://eventespresso.com/
  Description: Multi Events Registration addon for Event Espresso.

  Version: 1.0.2

  Author: Seth Shoultes
  Author URI: http://www.eventespresso.com

  Copyright (c) 2011 Event Espresso  All Rights Reserved.

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA

 */

register_activation_hook(__FILE__, 'event_espresso_multi_reg_install');
register_deactivation_hook(__FILE__, 'event_espresso_multi_reg_deactivate');

$wp_plugin_url = WP_PLUGIN_URL;
//$wp_content_url = WP_CONTENT_URL;

if (is_ssl()) {

    $wp_plugin_url = str_replace('http://', 'https://', WP_PLUGIN_URL);
    //$wp_content_url = str_replace('http://', 'https://', WP_CONTENT_URL);
}


//define( "EVENT_ESPRESSO_MULTI_REG_TABLE", get_option( $wpdb->prefix . 'events_multi_reg_tbl' ) );
define("EVENT_ESPRESSO_MULTI_REG_PATH", "/" . plugin_basename(dirname(__FILE__)) . "/");
define("EVENT_ESPRESSO_MULTI_REG_FULL_PATH", WP_PLUGIN_DIR . EVENT_ESPRESSO_MULTI_REG_PATH);
define("EVENT_ESPRESSO_MULTI_REG_FULL_URL", $wp_plugin_url . EVENT_ESPRESSO_MULTI_REG_PATH);
define("EVENT_ESPRESSO_MULTI_REG_MODULE_ACTIVE", TRUE);
define("EVENT_ESPRESSO_MULTI_REG_MODULE_VERSION", '1.0.1');


session_start();
global $events_in_session;
if(isset($_SESSION['events_in_session'])) $events_in_session = $_SESSION['events_in_session'];

if (!function_exists('event_espresso_multi_reg_install')) {
    function event_espresso_multi_reg_install() {
        update_option('event_espresso_multi_reg_version', '1.0.1');
        update_option('event_espresso_multi_reg_active', 1);
        global $wpdb;
    }
}

if (!function_exists('event_espresso_multi_reg_deactivate')) {
    function event_espresso_multi_reg_deactivate() {
        update_option('event_espresso_multi_reg_active', 0);
    }
}

if (!function_exists('event_espresso_multi_reg_init')) {
    function event_espresso_multi_reg_init() {

    }
}
?>