<?php
/**
 * Plugin Name: Sidr - Side Menus
 * Plugin URI: http://wpmu.org
 * Description: Adds the Sidr plugin to WordPress
 * Version: 1.0
 * Author: Chris Knowles
 * Author URI: http://wpmu.org
 * License: GPL2
 */

function sidr_scripts_styles(){

        /*
         * Adds JavaScript for handling the navigation menu hide-and-show behavior.
         */
        wp_enqueue_script( 'sidr' , plugins_url('sidr/js/jquery.sidr.min.js'), array('jquery'), '1.0', true );
        /*
         * Loads stylesheet.
         */
        wp_enqueue_style( 'sidr-style', plugins_url('/sidr/stylesheets/jquery.sidr.dark.css') );

}

add_action( 'wp_enqueue_scripts', 'sidr_scripts_styles' );
?>