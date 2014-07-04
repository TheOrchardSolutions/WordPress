<?php get_header(); ?>
<?php
$first_page = 0;
$show_on_front = get_option('show_on_front');

 if (have_posts()) : 
         while (have_posts()) : the_post(); 	
    $first_page++;
	$option = $post->post_content;
    //Get custom field value
    $page_background_color = get_post_meta($post->ID, "post_background_color", true);
    $page_background_img = get_post_meta($post->ID, "post_background_img", true);    
    $page_title_color = get_post_meta($post->ID, "post_title_color", true);
    $page_date_color = get_post_meta($post->ID, "post_date_color", true);
	$site_url = home_url();
	    if ($first_page == '1') {
        ?>
         <!--Navigation Menu-->
        <div class="main-menu">        
            <nav class="center-relative">       
                <?php
                $menu_name = 'custom_menu';
                if (has_nav_menu($menu_name)) {
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object($locations[$menu_name]);
                    $menu_items = wp_get_nav_menu_items($menu->term_id);
                    $menu_list = '<ul id="menu-' . $menu_name . '" class="main-menu">';
                    $menu_counter = 0;
                    global $menu_counter;
                    foreach ((array) $menu_items as $key => $menu_item) {
                        $menu_counter++;
                        $title = $menu_item->title;
                        $url = $menu_item->url;
						$type = $menu_item->type;
                        if ($type != 'custom') {						
						$slug = get_page_by_title($title);
						$slug = $slug->ID;  

						$page_structure = get_post_meta($slug, "page_structure", true);
												
						if($show_on_front == 'posts'){				
						if(($page_structure == 1) || ($page_structure == 2) || ($page_structure == ''))
						{						
							$menu_list .= '<li><a href="'.$site_url.'/#np-' . $slug . '">' . $title . '</a></li>';						
						}
						else{	
							if($post->ID == $slug)
								{						
								$menu_list .= '<li><a href="#np-'.$slug.'">' . $title . '</a></li>';
								}
								else
								{
								$menu_list .= '<li><a href="'.$url.'">' . $title . '</a></li>';
								}
						}
                        }
							else{
						
						if($post->ID == $slug)
						{
						$menu_list .= '<li><a href="#np-'.$slug.'">' . $title . '</a></li>';						
						}
						else{
						$menu_list .= '<li><a href="'.$url.'">' . $title . '</a></li>';						
						}						
						} 
						
						}
						else {
                            $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
                        }
                    }
                    $menu_list .= '</ul>';
                } else {
                    $menu_list = '<ul>';
                    $pages_list = get_pages(array('sort_column' => 'menu_order', 'order'=>'ASC', 'hierarchical' => '0'));
                    foreach ($pages_list as $custom_page) {                        
						$slug = $custom_page->ID;						
						$page_structure = get_post_meta($custom_page->ID, "page_structure", true);
												
						if($show_on_front == 'posts')
						{							
						switch($page_structure){
						case 1:						
						$menu_list .= '<li><a href="'.$site_url.'/#np-' . $slug . '">' . $custom_page->post_title . '</a></li>';						
						break;
						
						case 2:						
                        break;
						
						case 3:
						if($post->ID == $slug)
						{
						$menu_list .= '<li><a href="#np-'.$slug.'">' . $custom_page->post_title . '</a></li>';
						}
						else
						{
						$menu_list .= '<li><a href="'.get_permalink($slug).'">' . $custom_page->post_title . '</a></li>';
						}
						break;
						
						case 4:						
                        break;			

						default:
						$menu_list .= '<li><a href="'.$site_url.'/#np-' . $slug . '">' . $custom_page->post_title . '</a></li>';
						}
						}						
						else
						{
						
						if($post->ID == $slug)
						{
						$menu_list .= '<li><a href="#np-'.$slug.'">' . $custom_page->post_title . '</a></li>';
						}else
						{
						$menu_list .= '<li><a href="'.get_permalink($custom_page->ID).'">' . $custom_page->post_title . '</a></li>';
						}
						
						}
                    }
                    $menu_list .='</ul>';
                }
                echo $menu_list;
                ?>
            </nav>
        </div> 		
		<?php } //end if ?>
    <?php
	$slug = $post->ID;
	
	//Check value for custom fields
    if ($page_background_color == '') {
        $page_background_color = '#ffffff';
    }    
	if ($page_title_color == '') {
        $page_title_color = '#191b1f';
    }    
	if ($page_date_color == '') {
        $page_date_color = '#9da1a4';
    }    
	
	
	//Section holder
    if ($page_background_img != ''):
	?>	
	 <div id="np-<?php echo $slug;?>" <?php post_class('section'); ?> style="background-color: <?php echo $page_background_color; ?>;
                        background-image:url( <?php echo $page_background_img;?> ); 
                        background-repeat: <?php echo get_post_meta($post->ID, "post_img_repeat", true); ?>;
                        background-position: <?php echo get_post_meta($post->ID, "post_img_position", true); ?>;
                        background-attachment: <?php echo get_post_meta($post->ID, "post_img_attachment", true); ?>;
						background-size: <?php echo get_post_meta($post->ID, "post_img_size", true); ?>;
                        ">
	<?php else: ?>
        <div id="np-<?php echo $slug; ?>" <?php post_class('section');?> style="background-color:<?php echo $page_background_color;?> " >
	<?php endif;
    
	echo '<div class="block content-960 center-relative"> ';
	
	if(get_post_meta($post->ID, "post_above_title", true) != '')
	{	
	$above_title = (get_post_meta($post->ID, "post_above_title", true));	  
    echo do_shortcode($above_title);
	}
	
	echo '<div class="single-title crete-round-font bottom-30 top-50"><h3 class="single-title" style="color: '.$page_title_color.'">'.get_the_title().'</h3></div>
                <p class="blog-date-holder bottom-30 center-text" style="color: '.$page_date_color.'">'.get_the_date('d-M').' / '. drop_cats($post->ID) .''.get_comments_number('0').' COMMENTS</p>
              ';
	
	 if (has_post_thumbnail($post->ID)) {
            $portfolio_post_thumb = get_the_post_thumbnail();
			echo '<div class="post-thumb-holder center-text bottom-30">'.$portfolio_post_thumb.'</div>';
        }
	
	the_content();
	echo '<div class="clear"></div>';
	wp_link_pages();
    echo '<div class="clear bottom-50"></div>';
	$posttags = get_the_tags();
	if ($posttags) {
	foreach($posttags as $tag) {
		echo $tag->name . ' '; 
	}
	}
	
 
		if (comments_open()) : ?>
                    <div class="comments-holder clear">
                        <?php comments_template(); ?>
                    </div>
                    <div class="comments-pagination-wrapper">
                        <div class="comments-pagination">
                            <?php paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;')); ?> 
                        </div>
                    </div>
                <?php endif;
		
    echo '</div>';
	echo '<div class="clear"></div>';
    echo '</div>';                  
			endwhile;
			endif;	
			?>    
			
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar(1)) : ?><?php endif; ?>    
            <?php get_footer(); ?>