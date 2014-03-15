<?php
/*
Template Name: Easy_Support
*/
?>
<title>Messages</title>
<style>

body {
color:#333333!important;
font-family:Helvetica, sans-serif!important;
font-size:16px!important;
}

ul {line-height:20px;}

table td, table th {
padding:5px 10px 10px 5px;
vertical-align:top;
width:480px;
font-size:16px;
}

table th {
text-align:left;
}
#separator {border-top:1px dotted #CCCCCC;margin-bottom:20px;}

.gform_title, .gform_description {
	display:none;
}
.gfield_description {
margin-left: 120px;
}
#helpdeskicon {
	background-image:url('wp-content/uploads/2011/08/helpdeskicon.jpg');
	background-repeat:no-repeat;
	height:120px;
	width:155px;
	margin:0;
	position:absolute;

}
#support_text {
	width:800px;
	height:120px;
	margin-left:145px;
}
.should_we .gfield_label {
width: 900px!important;
}
.should_we {
margin-bottom: 40px!important;
}
.gchoice_7_0 {
margin-right: 0px!important;
margin-top: 28px!important;
position:absolute!important;
}

.gchoice_7_2 {
margin-left: 180px!important;
margin-top: 28px!important;
position:absolute!important;
z-index:100;
}
.gchoice_7_1 {
margin-left: 75px!important;
margin-top: 28px!important;
position:absolute!important;
}
.textarea {
	color:#555555;
	font-size:16px!important;
}
#input_4_1,#input_4_2,#input_4_3,#input_4_4,#input_4_5,#input_4_6,#input_4_7,#input_4_8,#input_4_9,#input_4_10,#input_4_11,#input_4_12{
	padding:2px!important;
	font-size:16px!important;
}
.gf_right_half {
margin-left: 290px!important;
position: absolute;
}
#input_4_12 {
width: 455px;
}
#gform_submit_button_4:hover {
background: #444444!important;
cursor:pointer;
}
[type="radio"]:hover {
	cursor:pointer;
}
#input_4_5 {
width: 455px!important;
}
.bullet_enduser {
	display:none!important;
}

.should_we .gfield_label {
	color:#790000;
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
				<h3>Thanks for choosing the Orchard Solutions
				as your support provider.</h3><br/>
<div id="helpdeskicon"></div><div id="support_text"><p>For a more advanced support interface, visit <a href="http://support.theorchardsolutions.com">http://support.theorchardsolutions.com</a> and either enter your previously-created username and password or sign up for a new account.</p>
<br/>					
<p>For easy support, enter your information below.</p></div>

				
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