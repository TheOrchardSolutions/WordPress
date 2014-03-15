<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>
<?php global $woo_options; ?>

    <!-- #content Starts -->
	<?php woo_content_before(); ?>

    <?php 
    $blog_title = __('The Blog', 'woothemes');
    if ( is_array( $woo_options ) && @$woo_options['woo_blog_title'] ) {
						$blog_title = $woo_options[ 'woo_blog_title' ];
	}
 	if ( is_array( $woo_options ) && @$woo_options['woo_blog_description'] ) { 
						$blog_description = $woo_options[ 'woo_blog_description' ];
	 }
	?>   
					
	<div id="title-container" class="col-full post">
		<h2 class="title"><?php echo $blog_title ?></h2>
		<?php if ( $blog_description )  { ?>
		<span class="blog-title-sep">&bull;</span><span class="description"><?php echo $blog_description ?></span>
		<?php } ?>
		<?php include( get_template_directory() . '/search-form.php' ); ?>
	</div>

    <div id="content" class="page col-full">

		<?php if ( $woo_options[ 'woo_breadcrumbs_show' ] == 'true' ) { ?>
		<div id="content-header">
		
			<div id="breadcrumbs">
				<?php woo_breadcrumbs(); ?>
			</div><!--/#breadcrumbs -->
				
	        <div class="fix"></div>
	        
    	</div><!-- #content-header   -->  	
		<?php } ?>  	

	    <div id="inner" class="col-full">
			           		
			<div id="main" class="col-left">
	
	        <?php if ( get_query_var( 'paged') ) $paged = get_query_var( 'paged' ); elseif ( get_query_var( 'page') ) $paged = get_query_var( 'page' ); else $paged = 1; ?>
	        <?php query_posts( "post_type=post&paged=$paged" ); ?>
	        <?php if (have_posts()) : $count = 0; while (have_posts()) : the_post(); $count++; 
	                                                                    
	            			$ico_cal = $woo_options[ 'woo_post_calendar' ] == "true";
							$full_content = $woo_options[ 'woo_post_content' ] != "content";
						?>
							<!-- Post Starts -->
						    <div <?php post_class(); ?>>
						    
						    <?php if ( $full_content ) { if ( $ico_cal ) { ?>
						    <div class="ico-cal alignleft"><div class="ico-day"><?php the_time('d'); ?></div><div class="ico-month"><?php the_time('M'); ?></div></div>
						    <?php } else { woo_image( 'width='.$woo_options[ 'woo_thumb_w' ].'&height='.$woo_options[ 'woo_thumb_h' ].'&class=thumbnail '.$woo_options[ 'woo_thumb_align' ]); }} ?>
						    	
						    	<div class="details" <?php if ( $ico_cal && $full_content ) { echo 'style="margin-left:52px;"'; } ?>>
						    	
					        	<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					        	
					            <?php woo_post_meta(); ?>
					            
					            <div class="entry">
					            <?php global $more; $more = 0; ?>
	                    <?php if ( $woo_options[ 'woo_post_content' ] == "content" ) the_content(__( 'Read More...', 'woothemes' )); else the_excerpt(); ?>
	                </div><!-- /.entry -->
	
	                <div class="post-more">      
	                	<?php if ( $woo_options[ 'woo_post_content' ] == "excerpt" ) { ?>
	                    <span class="read-more"><a href="<?php the_permalink() ?>" title="<?php esc_attr_e( 'Continue Reading &rarr;', 'woothemes' ); ?>"><?php _e( 'Continue Reading &rarr;', 'woothemes' ); ?></a></span>
	                    <?php } ?>
	                </div>
					           </div><!-- /.details -->
					        </div><!-- /.post -->
	                                                
	        <?php endwhile; else: ?>
	            <div <?php post_class(); ?>>
	                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ) ?></p>
	            </div><!-- /.post -->
	        <?php endif; ?>  
	    
	            <?php woo_pagenav(); ?>
				<?php wp_reset_query(); ?>                
	
	        </div><!-- /#main -->
	            
			<?php get_sidebar(); ?>
	
		</div><!-- /#inner -->
    </div><!-- /#content -->    
		
<?php get_footer(); ?>