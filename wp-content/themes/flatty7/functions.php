<?php

	/* TVDA Base Theme Functions with Main Functions and Configurations */

	// Load Fonts, JS Scripts and CSS styles
	function load_scripts_and_style() {
	
		/* Google Web Fonts */
		wp_register_style('google_fonts_style', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Roboto+Slab|Raleway:400,200,700');
	    wp_enqueue_style('google_fonts_style');
    
		/* Initialize once to optimize number of cals to get template directory url method */
	    $base_theme_url = get_template_directory_uri();

	    /* register and load styles which is used on every pages */
	    // Clear CSS
	    wp_register_style('clear_style', $base_theme_url . '/css/clear.css');
	    wp_enqueue_style('clear_style');
	    
	    // Sliders
		wp_register_style('carouFredSel_style', $base_theme_url . '/css/carouFredSel.css');
	    wp_enqueue_style('carouFredSel_style');
	    
	    // Default Styles
		wp_register_style('default_style', $base_theme_url . '/css/default.css');
	    wp_enqueue_style('default_style');
	    
	    // Grid System
	    wp_register_style('columns_style', $base_theme_url . '/css/columns.css');
	    wp_enqueue_style('columns_style');
	    
	    // Grid System with borders
		wp_register_style('columns_with_border_style', $base_theme_url . '/css/columns_with_border.css');
	    wp_enqueue_style('columns_with_border_style');
	    
	    // Main CSS
		wp_register_style('common_style', $base_theme_url . '/css/common.css');
	    wp_enqueue_style('common_style');
	    
	    // prettyPhoto PlugIn
		wp_register_style('prettyPhoto_style', $base_theme_url . '/css/prettyPhoto.css');
	    wp_enqueue_style('prettyPhoto_style');
	    
	    // Styles for comments
		wp_register_style('comments_style', $base_theme_url . '/css/comments.css');
	    wp_enqueue_style('comments_style');
	    
	    // Colors
		wp_register_style('colors_style', $base_theme_url . '/colors.css');
	    wp_enqueue_style('colors_style');
	    
	    // WP CSS
	    wp_register_style('standard_wp_style', $base_theme_url . '/css/wp.css');
	    wp_enqueue_style('standard_wp_style');
	    
	    // Typography
		wp_register_style('typography_style', $base_theme_url . '/css/typography.css');
	    wp_enqueue_style('typography_style');	
	    
	    // Fixes
		wp_register_style('fix-for-regular_style', $base_theme_url . '/css/fix-for-regular.css');
	
		if(is_single() || is_page())
		{
			wp_register_style('single_style', $base_theme_url . '/css/single.css');
			wp_enqueue_style('single_style');
		}
		
		wp_register_style('main_theme_style', $base_theme_url . '/style.css');
	    wp_enqueue_style('main_theme_style');
	    wp_register_style('responsive_style', $base_theme_url . '/css/responsive.css');
	    wp_enqueue_style('responsive_style');
	
	    /* JavaScript */
	    // JQuery Script
	    wp_enqueue_script('jquery', '', '', '', '', true);
	    
	    // Fixed Menu
	    wp_enqueue_script('jquery.sticky', $base_theme_url . '/js/jquery.sticky.js', array('jquery'), '', true);
	    
	    // Navigation
	    wp_enqueue_script('jquery.frederickMenu', $base_theme_url . '/js/jquery.frederickMenu.js', array('jquery'), '', true);
	    
	    // Mobile Navigation
	    wp_enqueue_script('small-menu', $base_theme_url . '/js/small-menu.js', array('jquery'), '', true);
	    
	    // Sliders
	    wp_enqueue_script('jquery.carouFredSel-6.2.0-packed', $base_theme_url . '/js/jquery.carouFredSel-6.2.0-packed.js', array('jquery'), '', true);
	    
	    // Mouse Wheel JS
	    wp_enqueue_script('jquery.mousewheel.min', $base_theme_url . '/js/jquery.mousewheel.min.js', array('jquery'), '', true);
	    
	    // Touch Swipes for mobile devices
	    wp_enqueue_script('jquery.touchSwipe.min', $base_theme_url . '/js/jquery.touchSwipe.min.js', array('jquery'), '', true);
	    
	    // JQuery Easing
	    wp_enqueue_script('jquery.easing.1.3', $base_theme_url . '/js/jquery.easing.1.3.js', array('jquery'), '', true);
	    
	    // Some Hints
	    wp_enqueue_script('jquery.myHint', $base_theme_url . '/js/jquery.myHint.js', array('jquery'), '', true);
	    
	    // Portfolio Filter
		wp_enqueue_script('portfolio', $base_theme_url . '/js/portfolio.js', array('jquery'), '', true);
		
		// JQuery Vticker
	    wp_enqueue_script('jquery.vticker-min', $base_theme_url . '/js/jquery.vticker-min.js', array('jquery'), '', true);
	    
	    // Twiter
	    wp_enqueue_script('jquery.tweets', $base_theme_url . '/js/jquery.tweets.js', array('jquery'), '', true);
	    
	    // prettyPhoto Plugin
	    wp_enqueue_script('prettyPhoto', $base_theme_url . '/js/jquery.prettyPhoto.js', array('jquery'), '', true);
	    
	    // Pagination
	    wp_enqueue_script('pagination_handler', $base_theme_url . '/js/pagination_handler.js', array('jquery'), '', true);
	    
	    // JQuery Main Scripts
		wp_enqueue_script('main', $base_theme_url . '/js/main.js', array('jquery'), '', true);
		
		// Responsive
		wp_enqueue_script('respond.src', $base_theme_url . '/js/respond.src.js', array('jquery'), '', true);
		
		// Parallax
		wp_enqueue_script('parallax', $base_theme_url . '/js/jquery.parallax-1.1.3.js', array('jquery'), '', true);
		
		// Parallax Settings
		wp_enqueue_script('parallax-settings', $base_theme_url . '/js/parallax-settings.js', array('jquery'), '', true);

	
		global $wp_query;
		if(is_page() || is_single())
		{		
			$post = $wp_query->post; 		
			$head_custom_tag = get_post_meta($post->ID, "page_head_tag", true);	
			if($head_custom_tag != '')
			{
				echo $head_custom_tag;
			}		
		}
		
		if(is_home() )
		{
			
			$show_on_front = get_option('show_on_front');
			if($show_on_front == 'page')
			{
			$page_id = get_queried_object_id();
			$head_custom_tag = get_post_meta($page_id, "page_head_tag", true);	
			if($head_custom_tag != '')
			{
				echo $head_custom_tag;
			}		
			}
			else
			{
				$get_footer_content = get_theme_mod('heder_meta_big_page');			
				
				if($get_footer_content != '')
				{
					echo $get_footer_content;
				}
			
			}
		}
		
		if (is_singular() )
		{
		if(get_option( 'thread_comments' )){
				wp_enqueue_script('comment-reply');		
			}
		}
	}
	add_action('wp_enqueue_scripts', 'load_scripts_and_style');


	// Expert read more
	function new_excerpt_more( $more ) {
		return ' ...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
	
	// Expert lenth
	function custom_excerpt_length( $length ) {
		return 50;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	
	// Add support to theme for Portfolio thumbnails
	add_theme_support('post-thumbnails', array('post'));
	
	
	// Cut text
	function substrwords($input, $length, $ellipses = true, $strip_html = true) {
		//strip tags, if desired
	    if ($strip_html) {
	        $input = strip_tags($input);
	    }
	    //no need to trim, already shorter than trim length
	    if (strlen($input) <= $length) {
	        return $input;
	    }
	    //find last space within length
	    $last_space = strrpos(substr($input, 0, $length), ' ');
	    $trimmed_text = substr($input, 0, $last_space);
	    //add ellipses (...)
	    if ($ellipses) {
	        $trimmed_text .= ' ...';
	    }
	    return $trimmed_text;
	}


	// Columns shortcode
	function col($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "size" => 'one',
					"type" => '',
					"border" => '',
					"text_align" => '',
	                "class" => ''
	                    ), $atts));
	    
		if($text_align == 'left')
		{
			$text_align = "text-left";
		}elseif($text_align == 'right')
		{
			$text_align = "text-right";
		}elseif($text_align == 'center')
		{
			$text_align = "center-text";
		}else
		{
		$text_align = '';	
		}
		
		
		if($type != 'border')
		{
		switch ($size) {
	        case "one":
	            $return = '<div class="one ' . $class . '">
	                    ' . do_shortcode($content) . '
	                    </div><div class="clear"></div>';
	            break;
	        case "one_half_last":
	            $return = '<div class="one_half last ' . $class . ' ' . $text_align . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
	            break;
	        case "one_third_last":
	            $return = '<div class="one_third last ' . $class . ' ' . $text_align . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
	            break;
	        case "two_third_last":
	            $return = '<div class="two_third last ' . $class . ' ' . $text_align . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
	            break;			
			case "one_fourth_last":
	            $return = '<div class="one_fourth last ' . $class . ' ' . $text_align . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
	            break;
			case "three_fourth_last":
	            $return = '<div class="three_fourth last ' . $class . ' ' . $text_align . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
	            break;	
	        default:
	            $return = '<div class="' . $size . ' ' . $class . ' ' . $text_align . '">' . do_shortcode($content) . '</div>';
	    }
		}
		else
		{
		
		if($border == "left")
		{
			$border = 'border-left';
		}
		else
		{
			$border = '';
		}
				
		
		switch ($size) {
	        case "one":
	            $return = '<div class="one ' . $class . '">
	                    ' . do_shortcode($content) . '
	                    </div><div class="clear"></div>';
	            break;
	        case "one_half_last":
	            $return = '<div class="one_half_with_border last ' . $text_align . ' ' . $border . ' ' . $class . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
	            break;
	        case "one_third_last":
	            $return = '<div class="one_third_with_border last ' . $text_align . ' ' . $border . ' ' . $class . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
	            break;
	        case "two_third_last":
	            $return = '<div class="two_third_with_border last ' . $text_align . ' ' . $border . ' ' . $class . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
	            break;			
			case "one_fourth_last":
	            $return = '<div class="one_fourth_with_border last ' . $text_align . ' ' . $border . ' ' . $class . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
	            break;
			case "three_fourth_last":
	            $return = '<div class="three_fourth_with_border last ' . $text_align . ' ' . $border . ' ' . $class . '">' . do_shortcode($content) . '</div><div class="clear"></div>';
	            break;	
	        default:
	            $return = '<div class="'.$size.'_with_border ' . $text_align . ' ' . $border . ' ' . $class . '">' . do_shortcode($content) . '</div>';
	    }
		}
	    return $return;
	}
	add_shortcode("col", "col");


	// Big Title text shortcode
	function big_title($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => ''
	                    ), $atts));
	    $return = '<p class="home-title ' . $class . '">' . do_shortcode($content) . '</p>';
	    return $return;
	}
	add_shortcode("big_title", "big_title");


	// Title description short code
	function title_description($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => ''
	                    ), $atts));
	    $return = '<p class="title-description ' . $class . '">' . do_shortcode($content) . '</p>';
	    return $return;
	}
	add_shortcode("title_description", "title_description");


	// Progress bar shortcode
	function skills($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => '',
	                "title" => '',                
	                "bgcolor" => '#e3e7e8',
	                "percent_color" => '#00b1ee',
	                "percent" => '50%'
	                    ), $atts));
	    $return = '<div class="progress_bar ' . $class . '">
				   <div class="progress_bar_field_holder" style="background-color:'.$bgcolor.';">
	               <div class="progress_bar_title">'.$title.'</div>               
	               <div class="progress_bar_field_perecent" style="width:'.$percent.'; background-color: ' .$percent_color. '"></div>    
	               </div>              
	               </div>';
	    return $return;
	}
	add_shortcode("skills", "skills");


	// Separator shortcode
	function separator($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => '',
					"type" => 'clock'
	                    ), $atts));
	
				switch($type){
				case 'twitter':
					$type = 'twitter_separator';
				break;
				default:
				$type = 'line_separator';
				
				}								
	    $return = '<div class="separator ' .$type. ' ' .$class. '"></div>';
	    return $return;
	}
	add_shortcode("separator", "separator");


	// Twitter shortcode
	function twitter($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => '',
					"name" => 'Omeba3000'
	                    ), $atts));
	    
		$return = '<script>var twitterName = "'.$name.'";</script> 
					<div class="tweets '.$class.'">                       
	                    <ul class="tweets-content crete-round-font">
	                        <!--do not remove this section-->
	                        <li></li>
	                    </ul>				
	                </div>	';
	    
		return $return;
	}
	add_shortcode("twitter", "twitter");


	// Fixed image shortcode
	function fixed_background($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => '',
					"img_src" => '#',
					"height" => '500px'
	                    ), $atts));
	    		
		$return = 
			'<div style="min-height: '.$height.'; background-image: url('.$img_src.')" class="background-fixed left parallax ' .$class . '">                       
	        <div class="block content-960 center-relative">' . do_shortcode($content) . '</div>
	        </div><div class="clear"></div>';
	    
		return $return;
	}
	add_shortcode("fixed_background", "fixed_background");


	// Page/Section description shortcode
	function section_description($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => ''
	                    ), $atts));
	    $return = '<p class="info ' . $class . '">' . do_shortcode($content) . '</p>';
	    return $return;
	}
	add_shortcode("section_description", "section_description");


	// Page/Section Title shortcode
	function section_title($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => ''
	                    ), $atts));
	    $return = '<h2 class="section-title '.$class.'">'.do_shortcode($content).'</h2>
						  <p class="center-text"><img class="separator_x" src="'.get_template_directory_uri('template_url').'/images/separators/separator_x.png" alt="____"></p>';
	    return $return;
	}
	add_shortcode("section_title", "section_title");


	// Round font short code
	function round_font($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => ''
	                    ), $atts));
	    $return = '<div class="crete-round-font ' . $class . '">' . do_shortcode($content) . '</div>';
	    return $return;
	}
	add_shortcode("round_font", "round_font");
	
	
	// Return values of Categories without links
	function drop_cats($ID) {
	
	$post_categories = wp_get_post_categories( $ID );
	$cats = array();
	$category_list = '';
	foreach($post_categories as $c){
		$cat = get_category( $c );
		$category_list .= $cat->name.'-';
	}
	
	    $category_list.=';';
	    $category_list = explode('-;', $category_list); 
		$category_list[0].=' / ';
		if (($category_list[0] == '; / ')||($category_list[0] == 'Uncategorized / ')){
	        $category_list[0] = '';
	    }
	    return $category_list[0];
	}


	// Blog short code
	function blog($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => ''
	                    ), $atts));   
	    global $post;
		
	    $return = '<div id="main-blog-holder"><div id="blog-items-holder">';
		$conuter = 0;
		$postsperpage = get_option('posts_per_page');
		$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
		query_posts('post_type=post&paged='.$page);
		
	    while (have_posts()) : the_post();
		$conuter++;
		
			if($conuter%2 == 1)
			{
				$return .='<div class="bottom-10 one_half_with_border text-left">
	                    <p class="blog-section-title crete-round-font bottom-10"><a href="' . get_permalink($post->ID) . '">' . substrwords(get_the_title(), 70) . '</a></p>
	                    <p class="blog-date-holder bottom-20">'.get_the_date('d-M').' / '. drop_cats($post->ID) .''.get_comments_number('0').' COMMENTS</p>
	                    <p class="blog-excerpt-holder">
	                        '.get_the_excerpt().'
	                    </p>
	                    <a class="button dark" href="' . get_permalink($post->ID) . '">READ MORE</a>	
	                </div>';
			}else{		
				$return .= '<div class="bottom-10 one_half_with_border last border-left text-left">
	                    <p class="blog-section-title crete-round-font bottom-10"><a href="' . get_permalink($post->ID) . '">' . substrwords(get_the_title(), 70) . '</a></p>
	                    <p class="blog-date-holder bottom-20">'.get_the_date('d-M').' / '. drop_cats($post->ID) .''.get_comments_number('0').' COMMENTS</p>
	                    <p class="blog-excerpt-holder">
						'.get_the_excerpt().'
	                    </p>
	                    <a class="button dark" href="' . get_permalink($post->ID) . '">READ MORE</a>	
	                </div>';
				if($conuter/$postsperpage != 1)
				{
	              $return .= '<div class="clear separator blank_separator"></div>';
				}
					
	             }   
	    endwhile;        
	
	    $return .= '<div class="clear"></div>
					<div id="blog-pagination" class="navigation-holder">
					<span class="navigation-next crete-round-font">'.get_previous_posts_link('<span class="left next-blog-pagination">Next</span>').'</span><span class="navigation-previous crete-round-font">'.get_next_posts_link('<span class="right previus-blog-pagination">Previous</span>').'</span><div class="clear"></div></div>
					</div></div>';
		wp_reset_query();				
	    return $return;
	}
	add_shortcode("blog", "blog");
	
	
	// Button shortcode
	function button($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => '',
					"variant" => '',
					"size" => '',
					"color" => '',
					"target" => '_self',
					"href" => '#',
					"position" => 'center'
	                    ), $atts));
						
		if($variant == 'border')				
		{
		$variant = 'button-border';
		}else
		{
		$variant = 'button';
		}
		
		if($target == '_self')
		{
			$slow_scroll = "slow-scroll";
		}
		else
		{		
			$slow_scroll = '';
		}
		
		switch($position){		
			case 'left':
				$position = "text-left";
			break;		
			case 'right':
				$position = "text-right";
			break;		
			default:
				$position = "center-text";
		}
		
	    $return = '<div class="'.$position.'"><a href="'.$href.'" target="'.$target.'" class="' .$variant. ' ' .$color. ' ' .$size. ' ' .$class. ' ' .$slow_scroll. ' ">' . do_shortcode($content) . '</a></div>';
	    
		return $return;
	}
	add_shortcode("button", "button");


	// Full width shortcode
	function full_width($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => '',
					"background" => 'transparent'
	                    ), $atts));
	    $return = '</div>
		<div class="full-width ' . $class . '" style="background-color: '.$background.'">' . do_shortcode($content) . '</div>
		<div class="block content-960 center-relative">';
	    return $return;
	}
	add_shortcode("full_width", "full_width");


	// Box width shortcode
	function box_width($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => '',
					"background" => 'transparent'
	                    ), $atts));
	    
		$return = '<div class="block content-960 center-relative ' . $class . '">'.do_shortcode($content).'</div>';
	    
		return $return;
	}
	add_shortcode("box_width", "box_width");


	// Book left shortcode
	function book_left($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => '',
					"background" => '#dad1cc',
					"title" => ''
	                    ), $atts));
	    $return = '<div style="background-color: '.$background.'" class="book-left left ' . $class . '">
				   <div class="right-35 top-80 book-title crete-round-font right">'.$title.'</div>
				   <div class="right-35 top-20 book-content bottom-80 right clear-right">' . do_shortcode($content) . '</div>
					</div>';
	    
		return $return;
		
	}
	add_shortcode("book_left", "book_left");


	// Book right shortcode
	function book_right($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => '',
					"background" => '#e7ded9',
					"title" => ''
	                    ), $atts));
	    
		$return = '<div style="background-color: '.$background.'" class="book-right left ' . $class . '">
				   <div class="left-35 top-80 book-title crete-round-font left">'.$title.'</div>
				   <div class="left-35 top-20 book-content bottom-80 left clear-left">' . do_shortcode($content) . '</div>
				   </div>
				   <div class="clear"></div>
				   ';
	    
		return $return;
		
	}
	add_shortcode("book_right", "book_right");


	// Service item shortcode
	function service_item($atts, $content = null) {
	    extract(shortcode_atts(array(
					"class" => '',
	                "img_src" => '',                
	                "title" => '',
					"more" => '',
					"href" => '#',
					"target" => '_self'
	                    ), $atts));
						
		if($target == '_self')
		{
			$slow_scroll = 'slow-scroll';
		}
		else
		{
			$slow_scroll = '';
		}
							
		if($more != '')
		{
			$add_read_more = '<ul class="read-more service-read-more">
	                        <li><a href="'.$href.'" target="'.$target.'" class="'.$slow_scroll.'">'.$more.'</a></li>
	                    </ul>';
		}else
		{
			$add_read_more = '';
		}
		
		if($img_src != '')
		{	
	    $return = '<div class="service-item-holder center-text ' .$class. '">
					<img class="block center-relative" src="' . $img_src . '" alt="" />
	                <h4 class="service-item-title">' . $title . '</h4>
	                <p>' . do_shortcode($content) . '</p>				
					'.$add_read_more.'
					</div>';
		}
		else
		{
			$return = '<div class="service-item-holder center-text ' .$class. '">				
	                <h4 class="service-item-title">' . $title . '</h4>
	                <p>' . do_shortcode($content) . '</p>				
					'.$add_read_more.'
					</div>';
		}
	
	    return $return;
	}
	
	add_shortcode("service_item", "service_item");
	

	// Text Slider holder shortcode
	function text_slider($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "name" => 'slider',
	                "auto" => 'false',
	                "pagination" => 'true',
	                "hover_pause" => 'true',
					"start" => '0',
	                "speed" => '500',
					"class" => ''
	                    ), $atts));    
	    
	    return '<script> var ' . $name . '_speed="' . $speed . '"; 
	                     var ' . $name . '_auto="' . $auto . '"; 
	                     var ' . $name . '_pagination="' . $pagination . '"; 
	                     var ' . $name . '_hover="' . $hover_pause . '"; 
	                     var ' . $name . '_start="' . $start . '"; 
	            </script>
				<div class="' .$name. ' text-slider-holder slider_holder ' .$class. '">
				<ul id = ' . $name . ' class = "slides center-text crete-serif-font text-slider">
				' . do_shortcode($content) . '
				</ul>
				<div id="'.$name.'_text_slide_pager" class="carousel_pagination left"></div>
				</div>
				<div class = "clear"></div>';
	}
	add_shortcode("text_slider", "text_slider");


	// Text slide shortcode
	function text_slide($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "author" => ''             
	                    ), $atts));
	    
		if ($author != ''){
	    return '<li>' . do_shortcode($content) . ' <p class="quote-author top-30">'.$author.'</p></li>';	
	    }else{   
	    return '<li>' . do_shortcode($content) . '</li>';
	    }
	}
	add_shortcode("text_slide", "text_slide");


	// Image Slider holder shortcode
	function image_slider($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "name" => 'slider',
	                "auto" => 'false',
	                "pagination" => 'true',				
	                "hover_pause" => 'true',
					"start" => '0',
	                "speed" => '500',
					"width" => '400',
					"num" => '3',
					"class" => ''
	                    ), $atts));    
	    
	    return '<script> var ' . $name . '_speed="' . $speed . '"; 
	                     var ' . $name . '_auto="' . $auto . '"; 
	                     var ' . $name . '_pagination="' . $pagination . '"; 
	                     var ' . $name . '_hover="' . $hover_pause . '"; 
	                     var ' . $name . '_start="' . $start . '";                      
	                     var ' . $name . '_width="' . $width . '";                      
	                     var ' . $name . '_num="' . $num . '";                      
	            </script>
				<div class="' .$name. ' image-slider-holder slider_holder list_carousel ' .$class. '">
				<ul id = ' . $name . ' class = "gallery image-slider">
				' . do_shortcode($content) . '
				</ul>
				<div class="clear"></div>
				<a id="'.$name.'_prev" class="carousel_prev" href="#"></a>
	            <a id="'.$name.'_next" class="carousel_next" href="#"></a>
				<div id="'.$name.'_image_slide_pager" class="carousel_pagination left"></div>
				</div>
				<div class = "clear"></div>';
	}
	add_shortcode("image_slider", "image_slider");


	// Image slide shortcode
	function image_slide($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "text" => '',
					"img_small" => '#',
					"img_big" => '#',
					"href" => '',
					"target" => '_self'
	                    ), $atts));
	   
	   if($href != '')
	   {
	   $return = '<li><a class="preview" target="'.$target.'" href="'.$href.'"><img src="'.$img_small.'" alt="" /></a>
	                            <span class="shadow"></span>
	                            <span class="featured_work_item_text">'.$text.'</span></li>';
	   }
	   else
	   {
	   $return = '<li><a class="preview" href="'.$img_big.'" data-rel="prettyPhoto[gallery1]"><img src="'.$img_small.'" alt="" /></a>
	                            <span class="shadow"></span>
	                            <span class="featured_work_item_text">'.$text.'</span></li>';
	   }
	   
	    return $return;
	    }
	add_shortcode("image_slide", "image_slide");


	// Portfolio filter shortcode
	function portfolio_filter($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => '',
					"filter" => ''
	                    ), $atts));
	   
		$filter = explode(",", $filter);
		$filter = array_unique($filter);
		$filter_list='';
		
		foreach($filter as $value) {
	    $class_value = strtolower($value);
		$class_value = preg_replace('/\s+/', '-', $class_value);
		$filter_list.='<li class="'.$class_value.'">'.$value.'</li>';
		}
			
	    return '<ul id="filter" class="'.$class.'"><li class="all current">ALL</li>'.$filter_list.'</ul>';
	    }
	add_shortcode("portfolio_filter", "portfolio_filter");


	// Portfolio Items holder shortcode
	function portfolio($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => ''				
	                    ), $atts));
	   			
	    return '<ul id="portfolio-items" class="gallery">' . do_shortcode($content) . '</ul><div class="clear"></div>';
	    }
	add_shortcode("portfolio", "portfolio");


	// Portfolio Items shortcode
	function portfolio_item($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => '',
					"img_small" => '#',
					"img_big" => '#',
					"text" => '',
					"category" => '',
					"href" => '',
					"target" => '_self'
	                    ), $atts));
	
		$category = explode(",", $category);
		$category = array_unique($category);
		$class_value_list='';
		
		foreach($category as $value) {
	    $class_value = strtolower($value);
		$class_value = preg_replace('/\s+/', '-', $class_value);
		$class_value_list.=$class_value.' ';	
		}
		
		if($href != '')
		{
		$category_list = '<li class="'.$class_value_list.'"><a class="preview" target="'.$target.'" href="'.$href.'">
							<img src="'.$img_small.'" alt="" /></a>
	                        <span class="shadow"></span>
	                        <span class="work_item_text">'.$text.'</span></li>';
		}
		else{
		$category_list = '<li class="'.$class_value_list.'"><a class="preview" href="'.$img_big.'" data-rel="prettyPhoto[portfoliogallery99]">
							<img src="'.$img_small.'" alt="" /></a>
	                        <span class="shadow"></span>
	                        <span class="work_item_text">'.$text.'</span></li>';
		}
						
	    return $category_list;
	    }
	add_shortcode("portfolio_item", "portfolio_item");


	// Pricing shortcode
	function pricing($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => '',
					"title" => '',
					"body_background" => '#EBE2D9',
					"footer_text" => '',
					"footer_background" => '#69625A',				
					"price" => '',
					"price_background" => '#B4ACA1',
					"href" => '#'
	                    ), $atts));
	   					
				
	    return '<div class="pricing-table-small ' .$class. '">
	                    <div class="pricing-table-small-content-holder" style="background-color: '.$body_background.'">
	                        <div class="pricing-table-small-title">'.$title.'</div></div>
	                        <div class="pricing-table-small-price" style="background-color: '.$price_background.'">'.$price.'</div>
							<div class="pricing-table-small-list">' . do_shortcode($content) . '</div>
	                    <a href="'.$href.'" class="sign-up-link slow-scroll">
							<div class="pricin-table-small-sign-up" style="background-color: '.$footer_background.'">'.$footer_text.'</div>
						</a>
	                </div>';
	    }
	add_shortcode("pricing", "pricing");


	// Vimeo shortcode
	function vimeo($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "src" => 'vimeo.com/1185749',
					"class" => ''
	                    ), $atts));
	    $return = '';
	    $vimeo = explode('vimeo.com/', $src);
	    $return = '<div class="vimeo '.$class.'">
				<input type="hidden" class="vimeo_source" value="'.$vimeo[1].'"/>              
	                  </div>';
	    return $return;
	}
	
	add_shortcode("vimeo", "vimeo");


	// Youtube shortcode
	function youtube($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "src" => '',
					"class" => ''
	                    ), $atts));
	    $return = '';
	    $youtube = explode('youtube.com/watch?v=', $src);
					$return = '<div class="youtube '.$class.'">  
								<input type="hidden" class="youtube_source" value="'.$youtube[1].'"/>    									
	                                </div>';		
	    return $return;
	}
	
	add_shortcode("youtube", "youtube");

	
	// Add the Meta Box to "Single" 
	function add_single_custom_meta_box() {
	    add_meta_box(
	            'single_custom_meta_box', // $id  
	            'Post Preference', // $title   
	            'show_single_custom_meta_box', // $callback  
	            'post', // $page  
	            'normal', // $context  
	            'high'); // $priority   
	}
	add_action('add_meta_boxes', 'add_single_custom_meta_box');
	// Field Array Post Page 
	$prefix = 'post_';
	$single_custom_meta_fields = array(	    
	     array(
	        'label' => 'Post Title Color',
	        'desc' => '',
	        'id' => $prefix . 'title_color',
	        'type' => 'text'
	    ),
	   array(
	        'label' => 'Post Date Color',
	        'desc' => '',
	        'id' => $prefix . 'date_color',
	        'type' => 'text'
	    ),
	    array(
	        'label' => 'Post Background Color',
	        'desc' => '',
	        'id' => $prefix . 'background_color',
	        'type' => 'text'
	    ),
	    array(
	        'label' => 'Post Background Image URL',
	        'desc' => '',
	        'id' => $prefix . 'background_img',
	        'type' => 'text'
	    ),
	    array(
	        'label' => 'Background Image Position',
	        'desc' => '',
	        'id' => $prefix . 'img_position',
	        'type' => 'select',
	        'options' => array(
	            'one' => array(
	                'label' => 'Left Top',
	                'value' => 'left top'
	            ),
	            'two' => array(
	                'label' => 'Left Center',
	                'value' => 'left center'
	            ),
	            'three' => array(
	                'label' => 'Left Bottom',
	                'value' => 'left bottom'
	            ),
	            'four' => array(
	                'label' => 'Center Top',
	                'value' => 'center top'
	            ),
	            'five' => array(
	                'label' => 'Center Center',
	                'value' => 'center center'
	            ),
	            'six' => array(
	                'label' => 'Center Bottom',
	                'value' => 'center bottom'
	            ),
	            'seven' => array(
	                'label' => 'Right Top',
	                'value' => 'right top'
	            ),
	            'eight' => array(
	                'label' => 'Right Center',
	                'value' => 'right center'
	            ),
	            'nine' => array(
	                'label' => 'Right Bottom',
	                'value' => 'right bottom'
	            )
	        )
	    ),
	    array(
	        'label' => 'Background Image Repeat',
	        'desc' => '',
	        'id' => $prefix . 'img_repeat',
	        'type' => 'select',
	        'options' => array(
	            'one' => array(
	                'label' => 'No Repeat',
	                'value' => 'no-repeat'
	            ),
	            'two' => array(
	                'label' => 'Repeat-X',
	                'value' => 'repeat-x'
	            ),
	            'three' => array(
	                'label' => 'Repeat-Y',
	                'value' => 'repeat-y'
	            ),
	            'four' => array(
	                'label' => 'Repeat All',
	                'value' => 'repeat'
	            )
	        )
	    ), array(
	        'label' => 'Background Image Attachment',
	        'desc' => '',
	        'id' => $prefix . 'img_attachment',
	        'type' => 'select',
	        'options' => array(
	            'one' => array(
	                'label' => 'Scroll',
	                'value' => 'scroll'
	            ),
	            'two' => array(
	                'label' => 'Fixed',
	                'value' => 'fixed'
	            )
	        )
	    ), array(
	        'label' => 'Background Image Size',
	        'desc' => '',
	        'id' => $prefix . 'img_size',
	        'type' => 'select',
	        'options' => array(
	            'one' => array(
	                'label' => 'Auto',
	                'value' => 'auto'
	            ),
	            'two' => array(
	                'label' => 'Cover',
	                'value' => 'cover'
	            )
	        )
	    ),  array(  
	        'label'=> 'Content Above the post Title',  
	        'desc'  => 'Content above the post title (optional)',  
	        'id'    => $prefix.'above_title',  
	        'type'  => 'textarea' 
	    ),  array(  
	        'label'=> 'Header code',  
	        'desc'  => 'Custom code will be inserted in header (optional)',  
	        'id'    => 'page_head_tag',  
	        'type'  => 'textarea' 
	    )
	);// The Callback  
	function show_single_custom_meta_box() {
	    global $single_custom_meta_fields, $post;
	// Use nonce for verification  
	    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
	// Begin the field table and loop  
	    echo '<table class="form-table">';
	    foreach ($single_custom_meta_fields as $field) {
	// get value of this field if it exists for this post  
	        $meta = get_post_meta($post->ID, $field['id'], true);
	// begin a table row with  
	        echo '<tr> 
	                <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th> 
	                <td>';
	        switch ($field['type']) {
	// case items will go here  
	
	           // checkbox  
	            case 'checkbox':
	                echo '<input type="checkbox" name="' . $field['id'] . '" id="' . $field['id'] . '" ', $meta ? ' checked="checked"' : '', '/> 
	        <label for="' . $field['id'] . '">' . $field['desc'] . '</label>';
	                break;
	// text  
	            case 'text':
	                if ($field['id'] == 'post_title_color') {
	                    echo '<div id="colorTitleSelector"><div></div></div>
	                      <input style="display:none" type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="50" /> 
	                        <br /><span class="description">' . $field['desc'] . '</span>';
	                }
	                elseif ($field['id'] == 'post_background_color') {
	                    echo '<div id="colorBackgroundSelector"><div></div></div>
	                      <input style="display:none" type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="50" /> 
	                        <br /><span class="description">' . $field['desc'] . '</span>';
	                }
					 elseif ($field['id'] == 'post_date_color') {
	                    echo '<div id="colorDateSelector"><div></div></div>
	                      <input style="display:none" type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="50" /> 
	                        <br /><span class="description">' . $field['desc'] . '</span>';
	                }
	                else {
	                    echo '<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="50" /> 
	        <br /><span class="description">' . $field['desc'] . '</span>';
	                }
	                break;
	// select  
	            case 'select':
	                echo '<select name="' . $field['id'] . '" id="' . $field['id'] . '">';
	                foreach ($field['options'] as $option) {
	                    echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="' . $option['value'] . '">' . $option['label'] . '</option>';
	                }
	                echo '</select><br /><span class="description">' . $field['desc'] . '</span>';
	                break;
	// textarea  
				case 'textarea':  
				echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea> 
						<br /><span class="description">'.$field['desc'].'</span>';  
				break;
					
	        } //end switch  
	        echo '</td></tr>';
	    } // end foreach  
	    echo '</table>'; // end table  
	}
	// Save the Data  
	function save_single_custom_meta($post_id) {
	    global $single_custom_meta_fields;
	// verify nonce  
	    if (isset($_POST['custom_meta_box_nonce'])) {
	        if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) {
	            return $post_id;
	        }
	    }
	// check autosave  
	// Stop WP from clearing custom fields on autosave
	    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	        return;
	// Prevent quick edit from clearing custom fields
	    if (defined('DOING_AJAX') && DOING_AJAX)
	        return;
	// check permissions  
	    if (isset($_POST['post_type']) && 'post' == $_POST['post_type']) {
	        if (!current_user_can('edit_page', $post_id))
	            return $post_id;
	    } elseif (!current_user_can('edit_post', $post_id)) {
	        return $post_id;
	    }
	// loop through fields and save the data  
	    foreach ($single_custom_meta_fields as $field) {
	        $old = get_post_meta($post_id, $field['id'], true);
	        $new = null;
	        if (isset($_POST[$field['id']])) {
	            $new = $_POST[$field['id']];
	        }
	        if ($new && $new != $old) {
	            update_post_meta($post_id, $field['id'], $new);
	        } elseif ('' == $new && $old) {
	            delete_post_meta($post_id, $field['id'], $old);
	        }
	    } // end foreach  
	}
	add_action('save_post', 'save_single_custom_meta');


	// Add the Meta Box to "default" Page"
	function add_custom_meta_box() {
	    add_meta_box(
	            'custom_meta_box', // $id  
	            'Page Preference', // $title   
	            'show_custom_meta_box', // $callback  
	            'page', // $page  
	            'normal', // $context  
	            'high'); // $priority  
	}
	add_action('add_meta_boxes', 'add_custom_meta_box');
	// Field Array Post Page 
	$prefix = 'page_';
	$custom_meta_fields = array(
		array(
	        'label' => 'Show Section Title',
	        'desc' => 'Display/hide section title.',
	        'id' => $prefix . 'title_custom',
	        'type' => 'select',
	        'options' => array(
	            'one' => array(
	                'label' => 'YES',
	                'value' => 'yes'
	            ),
	            'two' => array(
	                'label' => 'NO',
	                'value' => 'no'
	            )
	        )
	    ),
	    array(
	        'label' => 'Section Title',
	        'desc' => '',
	        'id' => $prefix . 'title_description',
	        'type' => 'text'
	    ),
	     array(
	        'label' => 'Section Title Color',
	        'desc' => '',
	        'id' => $prefix . 'title_color',
	        'type' => 'text'
	    ),
	    array(
	        'label' => 'Page Background Color',
	        'desc' => '',
	        'id' => $prefix . 'background_color',
	        'type' => 'text'
	    ),
	    array(
	        'label' => 'Page Background Image URL',
	        'desc' => '',
	        'id' => $prefix . 'background_img',
	        'type' => 'text'
	    ),
	    array(
	        'label' => 'Background Image Position',
	        'desc' => '',
	        'id' => $prefix . 'img_position',
	        'type' => 'select',
	        'options' => array(
	            'one' => array(
	                'label' => 'Left Top',
	                'value' => 'left top'
	            ),
	            'two' => array(
	                'label' => 'Left Center',
	                'value' => 'left center'
	            ),
	            'three' => array(
	                'label' => 'Left Bottom',
	                'value' => 'left bottom'
	            ),
	            'four' => array(
	                'label' => 'Center Top',
	                'value' => 'center top'
	            ),
	            'five' => array(
	                'label' => 'Center Top-55px',
	                'value' => '50% 55px'
	            ),
	            'six' => array(
	                'label' => 'Center Center',
	                'value' => 'center center'
	            ),
	            'seven' => array(
	                'label' => 'Center Bottom',
	                'value' => 'center bottom'
	            ),
	            'eight' => array(
	                'label' => 'Right Top',
	                'value' => 'right top'
	            ),
	            'nine' => array(
	                'label' => 'Right Center',
	                'value' => 'right center'
	            ),
	            'ten' => array(
	                'label' => 'Right Bottom',
	                'value' => 'right bottom'
	            )
	        )
	    ),
	    array(
	        'label' => 'Background Image Repeat',
	        'desc' => '',
	        'id' => $prefix . 'img_repeat',
	        'type' => 'select',
	        'options' => array(
	            'one' => array(
	                'label' => 'No Repeat',
	                'value' => 'no-repeat'
	            ),
	            'two' => array(
	                'label' => 'Repeat-X',
	                'value' => 'repeat-x'
	            ),
	            'three' => array(
	                'label' => 'Repeat-Y',
	                'value' => 'repeat-y'
	            ),
	            'four' => array(
	                'label' => 'Repeat All',
	                'value' => 'repeat'
	            )
	        )
	    ), array(
	        'label' => 'Background Image Attachment',
	        'desc' => '',
	        'id' => $prefix . 'img_attachment',
	        'type' => 'select',
	        'options' => array(
	            'one' => array(
	                'label' => 'Scroll',
	                'value' => 'scroll'
	            ),
	            'two' => array(
	                'label' => 'Fixed',
	                'value' => 'fixed'
	            )
	        )
	    ), array(
	        'label' => 'Background Image Size',
	        'desc' => '',
	        'id' => $prefix . 'img_size',
	        'type' => 'select',
	        'options' => array(
	            'one' => array(
	                'label' => 'Auto',
	                'value' => 'auto'
	            ),
	            'two' => array(
	                'label' => 'Contain',
	                'value' => 'contain'
	            ),
	            'three' => array(
	                'label' => 'Cover',
	                'value' => 'cover'
	            )
	        )
	    ), array(
	        'label' => 'Page Strucure',
	        'desc' => '* Only in one page mode',
	        'id' => $prefix . 'structure',
	        'type' => 'select',
	        'options' => array(
	            'one' => array(
	                'label' => 'Include in Front page / Include in menu',
	                'value' => '1'
	            ),
	            'two' => array(
	                'label' => 'Include in Front page / Exclude from menu',
	                'value' => '2'
	            ),
				'three' => array(
	                'label' => 'Separated page / Include in menu',
	                'value' => '3'
	            ),
	            'four' => array(
	                'label' => 'Separated page / Exclude from menu',
	                'value' => '4'
	            )
	        )
	    ),  array(  
	        'label'=> 'Header code',  
	        'desc'  => 'Custom code will be inserted in header (optional)',  
	        'id'    => $prefix.'head_tag',  
	        'type'  => 'textarea' 
	    )
	);
	// The Callback  
	function show_custom_meta_box() {
	    global $custom_meta_fields, $post;
	// Use nonce for verification  
	    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
	// Begin the field table and loop  
	    echo '<table class="form-table">';
	    foreach ($custom_meta_fields as $field) {
	// get value of this field if it exists for this post  
	        $meta = get_post_meta($post->ID, $field['id'], true);		
	// begin a table row with  
	        echo '<tr> 
	                <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th> 
	                <td>';
	        switch ($field['type']) {
	// case items will go here  
	// checkbox  
	            case 'checkbox':
	                echo '<input type="checkbox" name="' . $field['id'] . '" id="' . $field['id'] . '" ', $meta ? ' checked="checked"' : '', '/> 
	        <label for="' . $field['id'] . '">' . $field['desc'] . '</label>';
	                break;
	// text  
	            case 'text':
	                if ($field['id'] == 'page_title_color') {
	                    echo '<div id="colorTitleSelector"><div></div></div>
	                      <input style="display:none" type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="50" /> 
	                        <br /><span class="description">' . $field['desc'] . '</span>';
	                }
	                elseif ($field['id'] == 'page_background_color') {
	                    echo '<div id="colorBackgroundSelector"><div></div></div>
	                      <input style="display:none" type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="50" /> 
	                        <br /><span class="description">' . $field['desc'] . '</span>';
	                }
	                else {
	                    echo '<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="50" /> 
	        <br /><span class="description">' . $field['desc'] . '</span>';
	                }
	                break;
	// select  
	            case 'select':
	                echo '<select name="' . $field['id'] . '" id="' . $field['id'] . '">';
	                foreach ($field['options'] as $option) {
	                    echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="' . $option['value'] . '">' . $option['label'] . '</option>';
	                }
	                echo '</select><br /><span class="description">' . $field['desc'] . '</span>';
	                break;
	// textarea  
				case 'textarea':  
				echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea> 
						<br /><span class="description">'.$field['desc'].'</span>';  
				break;
	        } //end switch  
	        echo '</td></tr>';
	    } // end foreach  
	    echo '</table>'; // end table  
	}
	// Save the Data  
	function save_custom_meta($post_id) {
	    global $custom_meta_fields;
	// verify nonce  
	    if (isset($_POST['custom_meta_box_nonce'])) {
	        if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) {
	            return $post_id;
	        }
	    }
	// check autosave  
	// Stop WP from clearing custom fields on autosave
	    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	        return;
	// Prevent quick edit from clearing custom fields
	    if (defined('DOING_AJAX') && DOING_AJAX)
	        return;
	// check permissions  
	    if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
	        if (!current_user_can('edit_page', $post_id))
	            return $post_id;
	    } elseif (!current_user_can('edit_post', $post_id)) {
	        return $post_id;
	    }
	// loop through fields and save the data  
	    foreach ($custom_meta_fields as $field) {
	        $old = get_post_meta($post_id, $field['id'], true);
	        $new = null;
	        if (isset($_POST[$field['id']])) {
	            $new = $_POST[$field['id']];
	        }
	        if ($new && $new != $old) {
	            update_post_meta($post_id, $field['id'], $new);
	        } elseif ('' == $new && $old) {
	            delete_post_meta($post_id, $field['id'], $old);
	        }
	    } // end foreach  
	}
	add_action('save_post', 'save_custom_meta');

	// Contact Form shortcode
	function contact($atts, $content = null) {
	    return '<div class="contact-form">                
	                        <ul id="contact-form">
	                            <li class="name-holder">
	                                <input type="text" id="name" />
	                            </li>
	                            <li class="email-holder">
	                                <input type="text" id="contact-email" />
	                            </li>
	                            <li class="website-holder">
	                                <input type="text" id="website" />
	                            </li>
	                            <li class="message-holder">
	                                <textarea rows="7" cols="50" id="message"></textarea>
	                            </li>
	                            <li class="last-child">
	                                <a class="button dark" onClick="SendMail()" id="send-message">SEND MESSAGE</a>   
	                            </li>
	                        </ul>
	                        <div class="clear"></div>					
	              </div>';
	}
	add_shortcode("contact", "contact");


	// AJAX Handlers
	include('inc/ajax-handlers.php');


	// BR short code
	function br($atts, $content = null) {
	    return '<br />';
	}
	add_shortcode("br", "br");


	// Include admin CSS and JS on "page"
	include('admin/page-custom-admin.php');


	// Theme Options
	include('admin/custom-admin.php');


	// Load custom admin page css
	function load_wp_admin_style() {
	    wp_register_style('wp_custom_admin_css', get_template_directory_uri('template_url') . '/admin/css/custom-admin.css', false, '1.0.0');
	    wp_enqueue_style('wp_custom_admin_css');
	}
	add_action('admin_enqueue_scripts', 'load_wp_admin_style');


	// WP stuff
	function frederick_widgets_init() {
	    unregister_sidebar('sidebar');
	}
	add_action('widgets_init', 'frederick_widgets_init', 11);
	if (function_exists('automatic-feed-links')) {
	    add_theme_support('automatic-feed-links');
	}


	// Wordpress Standard Items
	add_editor_style('css/frederick-editor-style.css');


	// Custom error handler
	add_filter('wp_die_handler', 'get_frederick_die_handler');
	function get_frederick_die_handler() {
	    return 'frederick_die_handler';
	}
	function frederick_die_handler($message, $title = '', $args = array()) {
	    $errorTemplate = get_theme_root() . '/' . get_template() . '/error.php';
	    if (!is_admin() && file_exists($errorTemplate)) {
	        $defaults = array('response' => 500);
	        $r = wp_parse_args($args, $defaults);
	        $have_gettext = function_exists('__');
	        if (function_exists('is_wp_error') && is_wp_error($message)) {
	            if (empty($title)) {
	                $error_data = $message->get_error_data();
	                if (is_array($error_data) && isset($error_data['title']))
	                    $title = $error_data['title'];
	            }
	            $errors = $message->get_error_messages();
	            switch (count($errors)) :
	                case 0 :
	                    $message = '';
	                    break;
	                case 1 :
	                    $message = "<p>{$errors[0]}</p>";
	                    break;
	                default :
	                    $message = "<ul>\n\t\t<li>" . join("</li>\n\t\t<li>", $errors) . "</li>\n\t</ul>";
	                    break;
	            endswitch;
	        } elseif (is_string($message)) {
	            $message = "<p>$message</p>";
	        }
	        if (isset($r['back_link']) && $r['back_link']) {
	            $back_text = $have_gettext ? '&laquo; Back' : '&laquo; Back';
	            $message .= "\n<p><a href='javascript:history.back()'>$back_text</a></p>";
	        }
	        if (empty($title))
	            $title = $have_gettext ? 'WordPress &rsaquo; Error' : 'WordPress &rsaquo; Error';
	        require_once($errorTemplate);
	        die();
	    } else {
	        _default_wp_die_handler($message, $title, $args);
	    }
	}


	// About item short code
	function about_item($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => '',
					"img" => '#',
	                "name" => '',
	                "position" => ''
	                    ), $atts));
	    $return = '<div class="team-item-holder center-text '.$class.'">
					<div class="team">	
	                 <img class="team-image" src="'.$img.'" alt="" />
					</div>		
				
	               <h4 class="team-item-name">' . $name . '</h4>
	                <div class="team-position">'.$position.'</div>	              
	                <div class="team-description">' . do_shortcode($content) . '</div>
	               </div>';			
	    return $return;
	
	}
	add_shortcode("about_item", "about_item");


	// Social item holder short code
	function social($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "class" => '',
					"href" => '#',
	                "img" => '#',
					"type" => ''
	                    ), $atts));
						
		if($type == 'big')
		{
		$return = '<div class="footer-social ' .$class. '">' . do_shortcode($content) . '</div>';
		}
		else{
	    $return = '<div class="team-social top-10 bottom-20 ' .$class. '">' . do_shortcode($content) . '</div>';
		}
	    return $return;
	}
	add_shortcode("social", "social");


	// Social item short code
	function social_item($atts, $content = null) {
	    extract(shortcode_atts(array(
	                "href" => '#',
	                "img" => '#',
					"target" => '_blank'
	                    ), $atts));
	    $return = '<a href="' . $href . '" target="'.$target.'"><img src="' . $img . '" alt="" /></a>';
	    return $return;
	}
	add_shortcode("social_item", "social_item");
 
	
	// Custom Header And Background Support
	if (current_theme_supports('custom-header')) {
	    $default_custom_header_settings = array(
	        'default-image' => '',
	        'random-default' => false,
	        'width' => 0,
	        'height' => 0,
	        'flex-height' => false,
	        'flex-width' => false,
	        'default-text-color' => '',
	        'header-text' => true,
	        'uploads' => true,
	        'wp-head-callback' => '',
	        'admin-head-callback' => '',
	        'admin-preview-callback' => '',
	    );
	    add_theme_support('custom-header', $default_custom_header_settings);
	}
	if (current_theme_supports('custom-background')) {
	    $default_custom_background_settings = array(
	        'default-color' => '',
	        'default-image' => '',
	        'wp-head-callback' => '_custom_background_cb',
	        'admin-head-callback' => '',
	        'admin-preview-callback' => ''
	    );
	    add_theme_support('custom-background', $default_custom_background_settings);
	}


	// Register theme menu
	add_action('init', 'register_wp_show_off_menu');
	function register_wp_show_off_menu() {
	    register_nav_menu('custom_menu', 'Main Menu');
	}


	// Helper
	function encode($input) {
	    $temp = '';
	    $length = strlen($input);
	    for ($i = 0; $i < $length; $i++) {
	        $temp .= '%' . bin2hex($input[$i]);
	    }
	    return $temp;
	}

?>