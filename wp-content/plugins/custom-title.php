<?php
/*
Plugin Name: Custom Title
Description: Extend or change individual post/Page titles with custom fields.
Version: R1.2.1
Author: Kaf Oseo
Author URI: http://szub.net/

	Copyright (c) 2005, 2006 Kaf Oseo (http://szub.net)
	Custom Title is released under the GNU General Public License
	(GPL) http://www.gnu.org/licenses/gpl.txt

	This is a WordPress plugin (http://wordpress.org).

~Changelog:
R.1.2.1 (Dec-16-2006)
Working through $wp_query now (for the heck of it).

R1.2 (Jan-07-2006)
Yep, post meta tweak.

R1.1 (Jan-02-2006)
Mod to post meta collect due to changes appearing in WP2.
*/

function szub_custom_title($title) {

/* >> user-configurable variable */
	$custom_key   = 'title'; // custom field key
/* << user-configurable variable */

	global $wp_query;
	if( $wp_query->is_page || $wp_query->is_single ) {
		$custom_title = get_post_meta($wp_query->post->ID, $custom_key, true);

		if( $custom_title )
			$title = str_replace($wp_query->post->post_title, $custom_title, $title);

	}

	return $title;
}

add_filter('wp_title', 'szub_custom_title');
add_filter('the_title', 'szub_custom_title');
add_filter('the_title_rss', 'szub_custom_title');
add_filter('single_post_title', 'szub_custom_title');
?>