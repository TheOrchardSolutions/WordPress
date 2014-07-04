<?php get_header(); ?>
<style>footer{position: static !important;}</style>
<?php
$first_page = 0;
$show_on_front = get_option('show_on_front');
$args=array('post_type'=>'page', 'posts_per_page'=>'-1', 'orderby'=>'menu_order', 'order'=>'ASC');
$loop = new WP_Query($args);
 
 if ($loop->have_posts()) : 
  while ($loop->have_posts()) : $loop->the_post(); 	
    $first_page++;

    //Get custom field value   
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
						if(($page_structure == 1) || ($page_structure == 2))
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
                    $pages = get_pages(array('sort_column' => 'menu_order'));
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
						$menu_list .= '<li><a href="'.get_permalink($slug).'">' . $page->post_title . '</a></li>';						
						break;
						
						case 4:						
                        break;			

						default:
						$menu_list .= '<li><a href="#np-' . $slug . '">' . $page->post_title . '</a></li>';
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
		<?php } //end if 
		endwhile;
		endif;
		?>  <div>      
            <h2 style="padding: 150px 0;" class="center-text">404 - Page Not Found</h2>
			</div>
<?php get_footer(); ?>