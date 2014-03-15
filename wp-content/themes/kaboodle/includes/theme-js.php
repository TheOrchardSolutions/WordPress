<?php
if ( ! is_admin() ) {
	add_action( 'wp_print_scripts', 'woothemes_add_javascript' );
	add_action( 'wp_print_styles', 'woothemes_add_css' );
}

if ( ! function_exists( 'woothemes_add_javascript' ) ) {
	function woothemes_add_javascript( ) {
		wp_enqueue_script('jquery');    
		wp_enqueue_script( 'superfish', get_template_directory_uri().'/includes/js/superfish.js', array( 'jquery' ) );
		wp_enqueue_script( 'general', get_template_directory_uri().'/includes/js/general.js', array( 'jquery' ) );
		
		// Load the JavaScript for the slides and testimonals on the homepage.
		
		if ( is_home() ) {
			wp_enqueue_script( 'jcarousel', get_template_directory_uri().'/includes/js/jcarousellite.min.js', array( 'jquery' ) );
			wp_enqueue_script( 'slides', get_template_directory_uri().'/includes/js/slides.min.jquery.js', array( 'jquery' ) );
			// wp_enqueue_script( 'jquery-cycle', get_template_directory_uri().'/includes/js/jquery.cycle.all.min.js', array( 'jquery' ) );
			
			// Load the custom slider settings.
			
			$options = get_option( 'woo_options' );
			
			$autoStart = false;
			$autoSpeed = 6000;
			$slideSpeed = 500;
			
			// Get our values from the database and, if they're there, override the above defaults.
			$fields = array( 'autoStart' => 'auto', 'autoSpeed' => 'interval', 'slideSpeed' => 'speed' );
			
			foreach ( $fields as $k => $v ) {
				if ( is_array( $options ) && array_key_exists( 'woo_portfolio_' . $v, $options ) ) {
					${$k} = $options['woo_portfolio_' . $v];
				}
			}
			
			// Set auto speed to 0 if we want to disable automatic sliding.
			if ( $autoStart == 'false' ) {
				$autoSpeed = 0;
			}
			
			$data = array(
						'speed' => $slideSpeed, 
						'auto' => $autoSpeed
						);
						
			wp_localize_script( 'general', 'woo_slider_settings', $data );
		}
		
		// Load the prettyPhoto JavaScript and CSS for use on the portfolio page template.
		
		if ( is_page_template('template-portfolio.php') || is_front_page() || is_singular( 'portfolio' ) ) {
			wp_register_script( 'prettyPhoto', get_template_directory_uri().'/includes/js/jquery.prettyPhoto.js', array( 'jquery' ) );					
			wp_register_script( 'portfolio', get_template_directory_uri().'/includes/js/portfolio.js', array( 'jquery', 'prettyPhoto' ) );
			
			wp_enqueue_script( 'prettyPhoto' );
			wp_enqueue_script( 'portfolio' );
		}
		
		if ( is_singular( 'portfolio' ) ) {
		wp_enqueue_script( 'jcarousel', get_template_directory_uri().'/includes/js/jcarousel.js', array( 'jquery' ) );
		wp_enqueue_script( 'loopedSlider', get_template_directory_uri().'/includes/js/loopedSlider.js', array( 'jquery' ) );
		}
		
	}
}

if ( ! function_exists( 'woothemes_add_css' ) ) {
	function woothemes_add_css () {
	
		if ( is_page_template('template-portfolio.php') || is_front_page() || is_singular( 'portfolio' ) ) {
			wp_register_style( 'prettyPhoto', get_template_directory_uri().'/includes/css/prettyPhoto.css' );
			wp_enqueue_style( 'prettyPhoto' );
		}
	
	} // End woothemes_add_css()
}
?>