<?php get_header(); ?>
<?php
$first_page = 0;
$show_on_front = get_option('show_on_front');
 if (have_posts()) : 
         while (have_posts()) : the_post(); 	
    $first_page++;
	$option = $post->post_content;
    //Get custom field value
    $page_background_color = get_post_meta($post->ID, "page_background_color", true);
    $page_background_img = get_post_meta($post->ID, "page_background_img", true);
    $page_title = get_post_meta($post->ID, "page_title_custom", true);    
    $page_title_color = get_post_meta($post->ID, "page_title_color", true);
    $page_title_description = get_post_meta($post->ID, "page_title_description", true);
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
                    $pages = get_pages(array('sort_column' => 'menu_order', 'order'=>'ASC', 'hierarchical' => '0'));
                    foreach ($pages as $page) {                        
						$slug = $page->ID;						
						$page_structure = get_post_meta($page->ID, "page_structure", true);
						
						if($show_on_front == 'posts')
						{							
						switch($page_structure){
						case 1:						
						$menu_list .= '<li><a href="'.$site_url.'/#np-' . $slug . '">' . $page->post_title . '</a></li>';						
						break;
						
						case 2:						
                        break;
						
						case 3:
						if($post->ID == $slug)
						{
						$menu_list .= '<li><a href="#np-'.$slug.'">' . $page->post_title . '</a></li>';
						}
						else
						{
						$menu_list .= '<li><a href="'.get_permalink($slug).'">' . $page->post_title . '</a></li>';
						}
						break;
						
						case 4:						
                        break;			

						default:
						$menu_list .= '<li><a href="'.$site_url.'/#np-' . $slug . '">' . $page->post_title . '</a></li>';
						}
						}						
						else
						{
						
						if($post->ID == $slug)
						{
						$menu_list .= '<li><a href="#np-'.$slug.'">' . $page->post_title . '</a></li>';
						}else
						{
						$menu_list .= '<li><a href="'.get_permalink($page->ID).'">' . $page->post_title . '</a></li>';
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
	
	//Section holder
    if ($page_background_img != ''):
	?>	
	 <div id="np-<?php echo $slug;?>" <?php post_class('section'); ?> style="background-color: <?php echo $page_background_color; ?>;
                        background-image:url( <?php echo $page_background_img;?> ); 
                        background-repeat: <?php echo get_post_meta($post->ID, "page_img_repeat", true); ?>;
                        background-position: <?php echo get_post_meta($post->ID, "page_img_position", true); ?>;
                        background-attachment: <?php echo get_post_meta($post->ID, "page_img_attachment", true); ?>;
						background-size: <?php echo get_post_meta($post->ID, "page_img_size", true); ?>;
                        ">
	<?php else: ?>
        <div id="np-<?php echo $slug; ?>" <?php post_class('section single-page');?> style="background-color:<?php echo $page_background_color;?> " >
	<?php endif;
    
	echo '<div class="block content-960 center-relative"> ';
    
	//Section title
	if ($page_title != 'no') {
		if(($page_title_description) == '')
			{
				$page_title_description = get_the_title();
			}
        echo '<h2 class="page-section-title" style="color:' . $page_title_color . '">' . $page_title_description . '</h2>
					  <p class="center-text"><img class="separator_x" src="' . get_template_directory_uri() . '/images/separators/separator_x.png" alt="____" /><p>';
    } 
	
	$option = wpautop($option);
   
    echo do_shortcode($option);

		if (comments_open($post->ID)) : ?>
                    <div class="comments-holder clear">
                        <?php comments_template(); ?>
                    </div>
                    <div class="comments-pagination-wrapper">
                        <div class="comments-pagination">
                            <?php paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;')); ?> 
                        </div>
                    </div>
					<div class="clear"></div>
                <?php endif;
    echo '</div>';
	echo '<div class="clear"></div>';
    echo '</div>';                  
			endwhile;
			endif;	
			?>    
			
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar(1)) : ?><?php endif; ?>    
            <?php get_footer(); ?>