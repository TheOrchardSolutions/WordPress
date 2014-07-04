	
<?php if ( is_page( 5198 ) ) auth_redirect(); ?>
<?php get_header(); ?>
<?php
$first_page = 0;
$show_on_front = get_option('show_on_front');
if($show_on_front == 'page')
{
	$page_id = get_queried_object_id();
	$args=array('page_id'=>$page_id, 'posts_per_page'=>'1', 'post_type'=>'page');	
}
else
{
	$args=array('post_type'=>'page', 'posts_per_page'=>'-1', 'orderby'=>'menu_order', 'order'=>'ASC');
}	

 $loop = new WP_Query($args);
 
 if ($loop->have_posts()) : 
  while ($loop->have_posts()) : $loop->the_post(); 	
    $first_page++;	
	if($show_on_front == 'page')
	{	
		 $post = get_page($page_id);
	}
	
	$option = $post->post_content;
    //Get custom field value
    $page_background_color = get_post_meta($post->ID, "page_background_color", true);
    $page_background_img = get_post_meta($post->ID, "page_background_img", true);
    $page_title = get_post_meta($post->ID, "page_title_custom", true);    
    $page_title_color = get_post_meta($post->ID, "page_title_color", true);
    $page_title_description = get_post_meta($post->ID, "page_title_description", true);
	
	    if ($first_page == '1') {
        ?>

        <!--Navigation Menu-->
        <div class="remotesupport_icons">	
        	<script src="https://cdn.auth0.com/w2/auth0-widget-4.0.min.js"></script>
<script type="text/javascript">
	
  var widget = new Auth0Widget({
    domain:         'theorchardsolutions.auth0.com',
    clientID:       'QCcahdWzhFDmVfycqL46RrMUpun2fAVa',
    callbackURL:    'https://theorchardsolutions.com/index.php?auth0=1'
  });
  
</script>

        	<center><a href="https://theorchardsolutions.com/remote" style="color:white;">Remote Support</a><br>
        	<a href="https://theorchardsolutions.com/mac"><img src="https://theorchardsolutions.com/wp-content/uploads/2014/04/appleicon.png" alt="apple" height="30" width="30" style="padding-right:10px;"></a>
        	<a href="https://theorchardsolutions.com/win"><img src="https://theorchardsolutions.com/wp-content/uploads/2014/04/windowsicon.png" alt="windows" height="30" width="30"></a>
        	</center>
        </div>
        
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
							$menu_list .= '<li><a href="#np-' . $slug . '">' . $title . '</a></li>';
						}
						else{						
							$menu_list .= '<li><a href="'.$url.'">' . $title . '</a></li>';
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
						$menu_list .= '<li><a href="#np-' . $slug . '">' . $page->post_title . '</a></li>';
						break;
						
						case 2:						
                        break;
						
						case 3:
						$menu_list .= '<li><a href="'.get_permalink($page->ID).'">' . $page->post_title . '</a></li>';
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
        
		<?php } //end if ?>
    <?php
	$slug = $post->ID;
	
	if($show_on_front == 'page')
	{
		$included_on_front = '1==1';
		
	}
	else
	{
		if(get_post_meta($post->ID, 'page_structure', true) != ''){
		$included_on_front = (get_post_meta($post->ID, 'page_structure', true) == 1) || (get_post_meta($post->ID, 'page_structure', true) == 2);
		}
		else
		{
			$included_on_front = '1==1';
		}
	}
	
	if($included_on_front)
	{	
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
        <div id="np-<?php echo $slug; ?>" <?php post_class('section');?> style="background-color:<?php echo $page_background_color;?> " >
	<?php endif;
    
	echo '<div class="block content-960 center-relative"> ';
    
	//Section title
	if ($page_title != 'no') {
		if(($page_title_description) == '')
		{
				$page_title_description = get_the_title();
		}
        echo '<h2 class="section-title" style="color:' . $page_title_color . '">' . $page_title_description . '</h2>
					  <p class="center-text"><img class="separator_x" src="' . get_template_directory_uri() . '/images/separators/separator_x.png" alt="____" /><p>';
    }else
	{
		if($show_on_front == 'page')
		{			
		wp_enqueue_style('fix-for-regular_style');		
		}
	}	
	
	$option = wpautop($option);
   
    echo do_shortcode($option);
  
    echo '</div>';
	echo '<div class="clear"></div>';	
    echo '</div>'; 
}	
			endwhile;
			endif;			 
			?>    
			
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar(1)) : ?><?php endif; ?>    
            <?php get_footer(); ?>






           <script type="text/javascript" src="//assets.zendesk.com/external/zenbox/v2.6/zenbox.js"></script>
<style type="text/css" media="screen, projection">
  @import url(//assets.zendesk.com/external/zenbox/v2.6/zenbox.css);
</style>
<script type="text/javascript">
  if (typeof(Zenbox) !== "undefined") {
    Zenbox.init({
    	
      dropboxID:   "20299526",
      url:         "https://theorchardsolutions.zendesk.com",
      tabTooltip:  "Service",
      tabImageURL: "https://theorchardsolutions.com/wp-content/uploads/2014/04/supporttab.jpg",
      tabColor:    "#62676b",
      tabPosition: "Right"
    });
  }
</script>