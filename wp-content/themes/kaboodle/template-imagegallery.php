<?php
/*
Template Name: Image Gallery
*/
?>

<?php get_header(); ?>
       
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
			           		
			<div id="main" class="fullwidth">
	
	            <div <?php post_class(); ?>>
	                
					<div class="entry">
	
			            <?php if (have_posts()) : the_post(); ?>
		            	<?php the_content(); ?>
			            <?php endif; ?>  
	
	                <?php query_posts( 'showposts=60' ); ?>
	                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>				
	                    <?php $wp_query->is_home = false; ?>
	
	                    <?php woo_image( 'single=true&class=thumbnail alignleft' ); ?>
	                
	                <?php endwhile; endif; ?>	
	                </div>
	
	            </div><!-- /.post -->
	            <div class="fix"></div>                
	                                                            
			</div><!-- /#main -->
				
		</div><!-- /#inner -->
    </div><!-- /#content -->
		
<?php get_footer(); ?>