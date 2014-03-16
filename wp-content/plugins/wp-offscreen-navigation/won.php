<?php
/*
Plugin Name: WP Offscreen Navigation
Description: Simple to use slide out menu (like mobile Facebook, Gmail, etc)
Author: Cozmoslabs, Cristian Antohe
Version: 0.1
Author URI: http://www.cozmoslabs.com

License: GPL2

== Copyright ==
Copyright 2011 Cozmoslabs (wwww.cozmoslabs.com)

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
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

define( 'WON_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) );

/* ready for localization */
load_plugin_textdomain( 'won', false, basename( dirname( __FILE__ ) ) . '/languages' );

/* Register the Theme Location */
add_action('init', 'won_theme_location' );
function won_theme_location(){
	register_nav_menu( 'wonoffscreen', 'Offscreen Nav' );
}

/* Add Scripts and CSS*/
add_action('wp_head', 'won_print_css' );
function won_print_css($hook){
	wp_register_style('won-sidr-blacktheme', plugins_url('/assets/stylesheets/jquery.sidr.dark.css', __FILE__));
	wp_enqueue_style('won-sidr-blacktheme');
		
	wp_register_script('won-sidr-js', plugins_url('/assets/jquery.sidr.js', __FILE__), array( 'jquery' ), '1.0' );
	wp_enqueue_script('won-sidr-js');		
}

add_action('wp_footer', 'won_print_scripts' );
function won_print_scripts($hook){
	wp_register_script('won-sidr-js', plugins_url('/assets/jquery.sidr.js', __FILE__), array( 'jquery' ), '1.0' );
	wp_enqueue_script('won-sidr-js');		
}

/* Insert slider */
add_action('wp_footer', 'won_insert_menu');
function won_insert_menu(){
?>
<div id="mobile-header">
	<a href="#sidr" id="responsive-menu-button">Menu</a>
</div>

<?php 

$args = array(
	'theme_location'  => 'wonoffscreen',
	'container'       => 'div',
	'container_id'    => 'sidr',
	'menu_class'      => 'menu',
	'fallback_cb'     => 'wp_page_menu',
);

wp_nav_menu( $args ); 
}

?>