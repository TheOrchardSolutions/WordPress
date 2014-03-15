<?php
/*
Template Name: Tags
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
			           		
			<div id="main" class="col-left">
	                                                                        
	            <div <?php post_class(); ?>>
	                
		            <?php if (have_posts()) : the_post(); ?>
	            	<div class="entry">
	            		<?php the_content(); ?>
	            	</div>	            	
		            <?php endif; ?>  
		            
	                <div class="tag_cloud">
	        			<?php wp_tag_cloud( 'number=0' ); ?>
	    			</div>
	
	            </div><!-- /.post -->
	        
			</div><!-- /#main -->
			
		</div><!-- /#inner -->
    </div><!-- /#content -->
		
<?php get_footer(); ?>