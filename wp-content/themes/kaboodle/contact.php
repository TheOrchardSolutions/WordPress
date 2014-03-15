<?php
/*
Template Name: Contact
*/
?>
<title>Contact</title>
<style>
.gchoice_7_0 {
margin-right: 0px!important;
margin-top: 38px!important;
position:absolute!important;
}

.gchoice_7_2 {
margin-left: 180px!important;
margin-top: 38px!important;
position:absolute!important;
z-index:100;
}
.gchoice_7_1 {
margin-left: 75px!important;
margin-top: 38px!important;
position:absolute!important;
}
.should_we .gfield_label {
width: 400px!important;
padding-bottom:35px!important;
}
.reason .gfield_label {
width: 400px!important;
padding-bottom:0px!important;
}
.should_we label {
margin-bottom: 30px!important;
}
#input_5_1, #input_5_2 {
width: 200px;
}
#input_5_6, #input_5_4, #input_5_9{
margin-left: -120px;
margin-top: 30px;
z-index:10;
}
#input_5_8 {
	margin-top:30px;
}
.textarea {
	color:#555555;
	font-size:16px!important;
}
#gform_submit_button_5:hover {
background: #444444!important;
cursor:pointer;
}
[type="radio"]:hover {
	cursor:pointer;
}
input {
	padding:0px!important;
	font-size:16px!important;}
#input_5_1, #input_5_2,#input_5_6, #input_5_4,#input_5_8, #input_5_9 {
	padding:2px!important;
}
#cspc-column-0 {
border-right: 1px solid #CACACA;
}

li .gchoice_7_0, li.gchoice_7_1, li .gchoice_7_2 {
	margin-top:48px!important;
}
.gform_wrapper {
	margin-top:-15px!important;
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
	        
			</div><!-- /#main -->
			
		</div><!-- /#inner -->
    </div><!-- /#content -->
		
<?php get_footer(); ?>