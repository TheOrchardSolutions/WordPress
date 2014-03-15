<?php
/*
Template Name: Top Label Form 2
*/
?>
<style>
.gform_wrapper .top_label .gfield_label {
position:relative!important;
width:100%!important;
}
#billing_notes {
font-size:18px;
display:block;
width:350px;
position: absolute;
margin: -3099px 0 0 600px;
}

ul {
list-style:disc!important;
}

ol {
list-style:decimal!important;
}
</style>

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
	            
	            
	             <div id="billing_notes">
    
    <p><strong>Billing Notes for specific customers</strong></p>
    <br/>
   	 <ul>
   		<li>Diane Allen
   			<ol><li>Send $0 value invoices to Daniel only</li>
   				<li>cc Diane on monthly Support invoices</li>		
   			</ol>
   		</li>
   	<br/>
   		<li>Harris Deville
   			<ol><li>$100 per hour prepaid</li>
   			</ol>
   		</li>
    </ul>
    
    
    
    
    </div>
	        
			</div><!-- /#main -->
			
		</div><!-- /#inner -->
    </div><!-- /#content -->
		
<?php get_footer(); ?>