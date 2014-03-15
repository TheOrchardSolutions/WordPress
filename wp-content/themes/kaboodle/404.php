<?php get_header(); ?>

	<div id="title-container" class="col-full post">
		<h1 class="title"><?php _e( 'Error 404 - Page not found!', 'woothemes' ) ?></h1>
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
			           		                                                                                
	            <div class="page">
	
	                <div class="entry">
	                	<p><?php _e( 'The page you trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for.', 'woothemes' ) ?></p>
	                </div>
	
	            </div><!-- /.post -->
	                                                
	        </div><!-- /#main -->
	
	        <?php get_sidebar(); ?>
	
		</div><!-- /#inner -->
    </div><!-- /#content -->	
	
<?php get_footer(); ?>