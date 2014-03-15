<?php
/*
Template Name: Bomgar Refer
*/
?>
<head>
	<style>
.gform_wrapper .top_label .gfield_label { display:block!important;float:none!important; padding-right:20px; padding-bottom:10px;width: 100%!important; margin: 5px 0px 4px !important; }
.gfield_checkbox{margin-left:10px!important}
.gfield_description {margin-bottom:10px}
.gform_wrapper li, .gform_wrapper form li {
	margin-bottom:30px;
}
.gform_wrapper .top_label li.gfield.gf_right_half {
width: 49%!important;
}
	</style>
	</head>
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
	
	            <?php if (have_posts()) : $count = 0; ?>
	            <?php while (have_posts()) : the_post(); $count++; ?>
	                                                                        
	                <div <?php post_class(); ?>>
	                    
	                    <div class="entry">
		                	<?php the_content(); ?>
		               	</div><!-- /.entry -->
	
						<?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>
	
	                </div><!-- /.post -->
	                                                    
				<?php endwhile; else: ?>
					<div <?php post_class(); ?>>
	                	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ) ?></p>
	                </div><!-- /.post -->
	            <?php endif; ?>  
	        
			</div><!-- /#main -->
			
		</div><!-- /#inner -->
    </div><!-- /#content -->
		
<?php get_footer(); ?>