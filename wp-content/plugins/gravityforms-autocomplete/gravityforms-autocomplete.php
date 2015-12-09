<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://line35.com
 * @since             1.0.0
 * @package           Gravityforms_Autocomplete
 *
 * @wordpress-plugin
 * Plugin Name:       Gravity Forms Auto Suggest
 * Plugin URI:        http://gfautocomplete.line35.com
 * Description:       Gravity Forms Auto Suggest is a Gravity Forms field. It fetches suggestions automatically according to what you have entered in textbox. You can choose source for suggestions as you want.
 * Version:           1.0.0
 * Author:            line35
 * Author URI:        http://line35.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gravityforms-autocomplete
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gravityforms-autocomplete-activator.php
 */
function activate_gravityforms_autocomplete() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gravityforms-autocomplete-activator.php';
	Gravityforms_Autocomplete_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gravityforms-autocomplete-deactivator.php
 */
function deactivate_gravityforms_autocomplete() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gravityforms-autocomplete-deactivator.php';
	Gravityforms_Autocomplete_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gravityforms_autocomplete' );
register_deactivation_hook( __FILE__, 'deactivate_gravityforms_autocomplete' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-gravityforms-autocomplete.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_gravityforms_autocomplete() {

	$plugin = new Gravityforms_Autocomplete();
	$plugin->run();

}
run_gravityforms_autocomplete();
