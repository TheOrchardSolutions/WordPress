<?php
/*
 * Register Theme Customizer
 */
add_action('customize_register', 'fredericktheme_customize_register');
function fredericktheme_customize_register($wp_customize) {

class Example_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
        <?php
    }
}

    $wp_customize->add_section('color_scheme', array(
        'title' => __('General Color Scheme', 'themename'),
        'priority' => 35,
    ));
    
	$wp_customize->add_setting('body_color', array(
        'default' => '#101114',
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));    
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_color', array(
                'label' => __('Body Text', 'themename'),
                'section' => 'color_scheme',
                'settings' => 'body_color',
            )));
    
    $wp_customize->add_setting('menu_color', array(
        'default' => '#ffffff',
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));    
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_color', array(
                'label' => __('Menu Text', 'themename'),
                'section' => 'color_scheme',
                'settings' => 'menu_color',
            )));    
			
	$wp_customize->add_setting('menu_background', array(
        'default' => '#594f8d',
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));    
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_background', array(
                'label' => __('Menu Background', 'themename'),
                'section' => 'color_scheme',
                'settings' => 'menu_background',
            )));    
  
    $wp_customize->add_setting('footer_background', array(
        'default' => '#39325a',
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background', array(
                'label' => __('Footer Background', 'themename'),
                'section' => 'color_scheme',
                'settings' => 'footer_background',
            )));
    
//--------------------------------------------------------------------------

    $wp_customize->add_section('frederickthemes_text_section', array(
        'title' => __('Static Theme Text', 'themename'),
        'priority' => 38,
    ));

    	
	$wp_customize->add_setting( 'copyright_text', array(
    'default'        => '[round_font class="bottom-70"]<div class="center-relative" style="max-width:720px; color:#e3e7e8">Praesent rhoncus nunc vitae metus condimentum viverra. Fusce sed est orci, vel condimentum felis. Suspendisse ullamcorper vulputate sagittis.</div>[/round_font]

[social type="big"]
[social_item href="#" img="http://omeba3000.tmweb.ru/wp-content/themes/frederick-wp/images/social-icons/facebook.png"]
[social_item href="#" img="http://omeba3000.tmweb.ru/wp-content/themes/frederick-wp/images/social-icons/twitter.png"]
[social_item href="#" img="http://omeba3000.tmweb.ru/wp-content/themes/frederick-wp/images/social-icons/dribble.png"]
[social_item href="#" img="http://omeba3000.tmweb.ru/wp-content/themes/frederick-wp/images/social-icons/instagram.png"]
[social_item href="#" img="http://omeba3000.tmweb.ru/wp-content/themes/frederick-wp/images/social-icons/linkedin.png"]
[/social]

[br][br][br]

<span style="color:#fff;">© 2013 Flatty 7 Theme. All rights reserved. Design by <a href="http://themes.tvda.eu" target="_blank">TVDA</a>.</span>
            ',
) );
 
$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'copyright_text', array(
    'label'   => 'Footer Content:',
    'section' => 'frederickthemes_text_section',
    'settings'   => 'copyright_text',
	  'priority' => 999
) ) );


$wp_customize->add_setting( 'heder_meta_big_page', array(
    'default'        => '',
) );
 
$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'heder_meta_big_page', array(
    'label'   => 'Code in header on front "big" page - only in one page mode :',
    'section' => 'frederickthemes_text_section',
    'settings'   => 'heder_meta_big_page',
	  'priority' => 999
) ) );
    
    
    //--------------------------------------------------------------------------
    $wp_customize->add_section('frederick_image_section', array(
        'title' => __('Images Section', 'themename'),
        'priority' => 37,
    ));
    $wp_customize->add_setting('frederick_fav_icon', array(
        'default' => get_template_directory_uri() . '/images/favicon.png',
        'capability' => 'edit_theme_options',
        'type' => 'option',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'frederick_fav_icon', array(
                'label' => 'Fav Icon',
                'section' => 'frederick_image_section',
                'settings' => 'frederick_fav_icon',
            )));
    
    //--------------------------------------------------------------------------
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('body_color')->transport = 'postMessage';    
    $wp_customize->get_setting('menu_color')->transport = 'postMessage';    
    $wp_customize->get_setting('menu_background')->transport = 'postMessage';    
    $wp_customize->get_setting('footer_background')->transport = 'postMessage';
    $wp_customize->get_setting('copyright_text')->transport = 'postMessage';
    $wp_customize->get_setting('heder_meta_big_page')->transport = 'postMessage';
    //--------------------------------------------------------------------------
    /*
     * If preview mode is active, hook JavaScript to preview changes
     */
    if ($wp_customize->is_preview() && !is_admin()) {
        add_action('customize_preview_init', 'fredericktheme_customize_preview_js');
    }
}
/**
 * Bind Theme Customizer JavaScript
 */
function fredericktheme_customize_preview_js() {
    wp_enqueue_script('fredericktheme-customizer', get_template_directory_uri() . '/admin/js/custom-admin.js', array('customize-preview'), '20120910', true);
}
/*
 * Set Default Theme Options
 */
if (is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php') {
    //default theme options params
    update_option("body_color", "#101114");    
    update_option("menu_color", "#ffffff");    
    update_option("menu_background", "#594f8d");    
    update_option("footer_background", "#39325a");
    update_option("frederick_fav_icon", get_template_directory_uri() . '/images/favicon.png');   	
}
/*
 * Generate CSS Styles
 */
add_action('wp_head', 'fredericktheme_customized_style');
function fredericktheme_customized_style() {
    echo ('<style type="text/css">');
    generate_css('body', 'color', 'body_color');    
    generate_css('.main-menu nav a', 'color', 'menu_color');    
    generate_css('.main-menu', 'background-color', 'menu_background');    
    generate_css('footer', 'background-color', 'footer_background');
    echo ('</style>');
}
/*
 * Generate CSS Class - Helper Method
 */
function generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true) {
    $return = '';
    $mod = get_option($mod_name);
    if (!empty($mod)) {
        $return = sprintf('%s { %s:%s; }', $selector, $style, $prefix . $mod . $postfix
        );
        if ($echo) {
            echo $return;
        }
    }
    return $return;
}
?>