<?php get_header(); ?>
<?php global $woo_options; 

	// Determine whether or not the homepage sidebar is enabled (enabled by default).
	// Also determine the various differences in logic if the sidebar is enabled/disabled.
	$has_sidebar = true;
	$content_css_class = ' home-sidebar';
	$main_css_class = 'col-left';
	$mini_features_count = 2;
	
	if ( is_array( $woo_options ) && @$woo_options['woo_home_sidebar'] == 'true' ) {
	$has_sidebar = false;
	$content_css_class = '';
	$main_css_class = 'col-full';
	$mini_features_count = 3;
	}
?>
	
	<?php if ( $woo_options[ 'woo_slider' ] == 'true' && is_home() ) { get_template_part( 'includes/featured' ); } ?>
	
    <div id="content" class="col-full">
    
    <!-- Portfolio --> 
    <?php
       if ($woo_options[ 'woo_portfolio' ] == 'true' && ! is_paged() ) { ?>
    		<div id="carousel-inner">
    			<?php get_template_part( 'includes/portfolio', 'carousel' ); // Carousel of portfolio items. ?>
    		</div>
    		<div id="carousel-content-border"></div>
    <?php } ?>
    <!-- /Portfolio -->
    
    <div id="inner" class="col-full">
		<div id="main" class="<?php echo $main_css_class; ?>">      
                    
            <?php if ( $woo_options['woo_main_page1'] && $woo_options['woo_main_page1'] <> "Select a page:" && ! is_paged() ) { ?>
	        <div id="main-page1">
				<?php query_posts('page_id=' . get_page_id($woo_options['woo_main_page1'])); ?>
	            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>		        					
			    <div class="entry"><?php the_content(); ?></div>
	            <?php endwhile; endif; ?>
	            <div class="fix"></div>
	        </div><!-- /#main-page1 -->
	        <?php } ?>
                    
            <?php if ($woo_options['woo_mini_features'] == "true" && ! is_paged() ): ?>
	        <div id="mini-features">
	        
	        <?php query_posts('post_type=infobox&order=ASC&posts_per_page=20'); ?>
	        <?php if (have_posts()) : $counter = 0; while (have_posts()) : the_post(); $counter++; ?>		        					
	
				<?php 
					$icon = get_post_meta($post->ID, 'mini', true); 
					$excerpt = stripslashes(get_post_meta($post->ID, 'mini_excerpt', true)); 
					$button = get_post_meta($post->ID, 'mini_readmore', true);
				?>
				<div class="block <?php if ($counter % $mini_features_count == 0) { echo ' last'; $counter = 0; } ?>">
					<?php if ( $icon ) { ?>
	                <img src="<?php echo $icon; ?>" alt="" class="home-icon" />				
	                <?php } ?> 
	                                                     
	                <div class="<?php if ( $icon ) echo 'feature'; if ( $counter == 2 ) echo ' last'; ?>">
	                   <h3><?php echo get_the_title(); ?></h3>
	                   <p><?php echo $excerpt; ?></p>
	                   <?php if ( $button ) { ?><a href="<?php echo $button; ?>" class="btn"><?php _e('Read More', 'woothemes'); ?></a><?php } ?>
	                </div>
				</div>
				<?php if ( $counter % $mini_features_count == 0 ) { echo '<div class="fix"></div>'; }  ?>				
	                
	        <?php endwhile; endif; ?>
	
	            <div class="fix"></div>
	        </div><!-- /#mini-features -->
	        <?php endif; ?>	

	        <?php if ( $woo_options['woo_main_page2'] && $woo_options['woo_main_page2'] <> "Select a page:" && ! is_paged() ) { ?>
	        <div id="main-page2">
				<?php query_posts('page_id=' . get_page_id($woo_options['woo_main_page2'])); ?>
	            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>		        					
			    <div class="entry"><?php the_content(); ?></div>
	            <?php endwhile; endif; ?>
	            <div class="fix"></div>
	        </div><!-- /#main-page2 -->
	        <?php } ?>

	        <?php if ($woo_options['woo_latest'] == "true"): ?>
	        <div id="latest-blog-posts">

				<?php
					 $posts = $woo_options['woo_latest_entries'];
					 $enable_pagination = $woo_options['woo_latest_pagination'];
					 if ( $enable_pagination != 'true' ) { $enable_pagination = 'false'; }
					 
					 if ( ! isset( $paged ) ) { $paged = 1; }
					 
					 $args = array();
					 $args['posts_per_page'] = $posts;
					 $args['paged'] = 1;
					 
					 if ( $enable_pagination == 'true' ) {
					 
					 	$entries_per_page = $woo_options['woo_latest_entries_per_page'];
					 	if ( !isset( $entries_per_page ) ) { $entries_per_page = 5; }
					 	
						$args['posts_per_page'] = $entries_per_page;
						$args['paged'] = $paged;
					 
					 }
					 
					 query_posts( $args );
					 
					 if ( have_posts() ) : while ( have_posts() ) : the_post();
					 
					 $ico_cal = $woo_options[ 'woo_post_calendar' ] == "true";
					 $full_content = $woo_options[ 'woo_post_content' ] != "content";
				?>
	
			    <div <?php post_class(); ?>>
			    
				    <?php if ( $full_content ) { if ( $ico_cal ) { ?>
				    <div class="ico-cal alignleft"><div class="ico-day"><?php the_time('d'); ?></div><div class="ico-month"><?php the_time('M'); ?></div></div>
				    <?php } else { woo_image( 'width='.$woo_options[ 'woo_thumb_w' ].'&height='.$woo_options[ 'woo_thumb_h' ].'&class=thumbnail '.$woo_options[ 'woo_thumb_align' ]); }} ?>
				    	
				    	<div class="details" <?php if ( $ico_cal && $full_content ) { echo 'style="margin-left:52px;"'; } ?>>
				    	
			        	<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			        	
			            <?php woo_post_meta(); ?>
			            
			            <div class="entry">
		                    <?php if ( $woo_options[ 'woo_post_content' ] == "content" ) the_content(__( 'Read More...', 'woothemes' )); else the_excerpt(); ?>
		                </div><!-- /.entry -->
	
		           </div><!-- /.details -->
		        </div><!-- /.post -->
				    
				<?php
						endwhile;
							if ( $enable_pagination == 'true' ) { woo_pagenav(); }
					endif;
				?>
				
			</div><!-- /#latest-blog-posts -->	
			<?php endif; ?>	        
        
            <div class="fix"></div>
                                
		</div><!-- /#main -->

        <?php if ( @$woo_options['woo_home_sidebar'] == 'false' ) { get_sidebar(); } ?>
        
	</div><!-- /#inner -->
    </div><!-- /#content -->
		
<?php get_footer(); ?>