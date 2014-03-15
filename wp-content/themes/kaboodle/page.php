<?php get_header(); ?>
<?php global $woo_options; ?>

	<div id="title-container" class="col-full post">
		<h1 class="title"><?php the_title(); ?></h1>
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
			
	        <?php if (have_posts()) : $count = 0; ?>
	        <?php while (have_posts()) : the_post(); $count++; ?>
	                                                                    
	            <div <?php post_class(); ?>>
	
	                <div class="entry">
	                	<?php the_content(); ?>
	
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
	               	</div><!-- /.entry -->
	
					<?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>
	                
	            </div><!-- /.post -->
	            
	            <?php $comm = $woo_options[ 'woo_comments' ]; if ( ($comm == "page" || $comm == "both") ) : ?>
	                <?php comments_template(); ?>
	            <?php endif; ?>
	                                                
			<?php endwhile; else: ?>
				<div <?php post_class(); ?>>
	            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ) ?></p>
	            </div><!-- /.post -->
	        <?php endif; ?>  
	        
			</div><!-- /#main -->
	
	        <?php get_sidebar(); ?>
	
		</div><!-- /#inner -->
    </div><!-- /#content -->
		
<?php get_footer(); ?>