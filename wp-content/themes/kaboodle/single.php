<?php get_header(); ?>
<?php global $woo_options; ?>

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
				
			<div id="post-entries">
	            <div class="nav-prev fl"><?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title' ) ?></div>
	            <div class="nav-next fr"><?php next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>' ) ?></div>
	            <div class="fix"></div>
	        </div><!-- #post-entries -->

	        <div class="fix"></div>
	        
    	</div><!-- #content-header   -->  	
		<?php } ?>  	

	    <div id="inner" class="col-full">
	    
		    <div id="main" class="col-left">
	    
	        <?php if (have_posts()) : $count = 0; ?>
	        <?php while (have_posts()) : the_post(); $count++; ?>
	        
				<div <?php post_class(); ?>>
				
	                <h1 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
	                                
	                <?php woo_post_meta(); ?>
	
					<?php echo woo_embed( 'width=580' ); ?>
	                <?php if ( $woo_options[ 'woo_thumb_single' ] == "true" && !woo_embed( '')) woo_image( 'width='.$woo_options[ 'woo_single_w' ].'&height='.$woo_options[ 'woo_single_h' ].'&class=thumbnail '.$woo_options[ 'woo_thumb_single_align' ]); ?>
	                                
	                <div class="entry">
	                	<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
					</div>
										
					<?php the_tags( '<p class="tags">'.__( 'Tags: ', 'woothemes' ), ', ', '</p>' ); ?>
	                                
	            </div><!-- .post -->
	
					<?php if ( $woo_options[ 'woo_post_author' ] == "true" ) { ?>
					<div id="post-author">
						<div class="profile-image"><?php echo get_avatar( get_the_author_meta( 'ID' ), '70' ); ?></div>
						<div class="profile-content">
							<h3 class="title"><?php printf( esc_attr__( 'About %s', 'woothemes' ), get_the_author() ); ?></h3>
							<?php the_author_meta( 'description' ); ?>
							<div class="profile-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'woothemes' ), get_the_author() ); ?>
								</a>
							</div><!-- #profile-link	-->
						</div><!-- .post-entries -->
						<div class="fix"></div>
					</div><!-- #post-author -->
					<?php } ?>
	
					<?php woo_subscribe_connect(); ?>
	
		        <?php $comm = $woo_options[ 'woo_comments' ]; if ( ($comm == "post" || $comm == "both") ) : ?>
	                <?php comments_template( '', true); ?>
	            <?php endif; ?>
	                                                
			<?php endwhile; else: ?>
				<div <?php post_class(); ?>>
	            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ) ?></p>
				</div><!-- .post -->             
	       	<?php endif; ?>  
	        
			</div><!-- #main -->
	
	        <?php get_sidebar(); ?>

		</div><!-- /#inner -->
    </div><!-- #content -->
		
<?php get_footer(); ?>