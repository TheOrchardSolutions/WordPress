<?php
function theme_options_admin_scripts() {
    wp_register_script('wp-custom-admin', get_template_directory_uri('template_url') . '/admin/js/page-custom-admin.js', array('jquery'));
    wp_register_script('frederick-wp-color-picker', get_template_directory_uri('template_url') . '/admin/js/colorpicker.js', array('jquery'));
    wp_enqueue_script('frederick-wp-color-picker');
    wp_enqueue_script('wp-custom-admin');
}
function theme_options_admin_styles() {
    wp_register_style('wp-custom-frederick_admin_color_picker_css', get_template_directory_uri('template_url') . '/admin/css/colorpicker.css', false, '1.0.0');
    wp_register_style('wp-custom-frederick_admin_layout_css', get_template_directory_uri('template_url') . '/admin/css/layout.css', false, '1.0.0');
    wp_enqueue_style('wp-custom-frederick_admin_color_picker_css');
    wp_enqueue_style('wp-custom-frederick_admin_layout_css');
}
if (is_super_admin()) {
    add_action('admin_print_scripts', 'theme_options_admin_scripts');
    add_action('admin_print_styles', 'theme_options_admin_styles');
}
?>