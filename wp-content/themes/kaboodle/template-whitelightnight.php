<?php
/*
Template Name: White Light Night
*/
?>
<head>
<style>
body{
	font-family:Helvetica, sans-serif;
}

a:hover {cursor:pointer!important;}

#header-container {
	display:none;
}

#holder {
	width:960px;
	margin:0 auto 42px;

}

#myheader {
	background:;
	background-repeat:no-repeat;
	background-position:54% 50%;
	height:110px;
	padding:4px 0 0 0;
}
#country {
	background:url('https://www.theorchardsolutions.com/media/logos/crmlogo.jpg');
	background-repeat:no-repeat;
	margin:-110px 0 0 20px;
	height:106px;
	width:49%;
	float:left;
	padding:0 0 25px 0px;
}

#mcg {
	background:url('https://www.theorchardsolutions.com/media/logos/mcg-horiz.jpg');
	background-repeat:no-repeat;
	height:106px;
	width:40%;
	float:right;
	background-position:right;
	margin:-100px 20px 0 0;
}

body {
	background:#FFFFFF!important;
}
#content {
	background:#FFFFFF!important;
	width:999px;
	margin-top:-25px!important;
	border-left:solid 22px #275881!important;
	border-right:solid 22px #275881!important;
	border-bottom:solid 22px #275881!important;
	border-top:solid 22px #275881!important;
}

#main.fullwidth, #main.col-full {
	margin-left:48px;
	width:840px!important;
}
.entry img, img.thumbnail {
	border:0px!important;
	-webkit-box-shadow:none!important;
	padding:0px!important;
	box-shadow:none!important;
}
h3 {
	color:#007c90!important;
	font-size:42px!important;
}
#title-container, #breadcrumbs {
	display:none;
}

#luxury, .email_input {
	border-bottom:solid 5px #c69b31;
	padding-bottom:25px;
}

.name_box {
	padding-top:25px;
}

.email_input, .name_box {

}
.email_input {
	margin-top:-10px;
}

input {cursor:pointer!important;font-size:16px!important}

input[type="radio"] {
	cursor:pointer!important;
	margin-top:30px!important;
	margin-bottom:-10px!important;
	margin-left:30px!important;
	position:relative;
	z-index:100;
}

#input_1_3 {
margin: 30px 0px 0px -120px;
}
#field_1_5, #field_1_6, #field_1_3 {

}
#content-header {
	display:none!important;
}
.ginput_container img:hover {
	cursor:pointer!important;
}
.gform_wrapper {
	width:100%!important;
	margin-bottom:0px!important;
}
.gform_heading {
	display:none;
}
.gf_left_half .gfield_label {
	width:200px!important;
}

[id="input_13_8"].gfield_checkbox {
	width:100%;
}

[id="gform_fields_13"] .gfield_label {
	width:823px!important;
}

#winipod {
	width:840px;
	height:512px;
	background:url('/wp-content/uploads/2011/11/iPod_touch.jpg') no-repeat;
}
#winipod2 {
	width: 460px;
	height:512px;
	float:right;
	text-align:center;
	padding:15px 0 0 0;
}
.line1, .line3 {
	font-weight:bold;
	font-size:32px;
	line-height:40px;
}
.line2 {
	font-size:24px;
	line-height:32px;
}
.line4 {
	font-weight:bold;
	font-size:18px;
}
.line5, .line6 {
	font-weight:bolder;
	font-size:64px;
	line-height:72px;
	color:red;
	
}
.line8 {
	font-weight:bold;
}

.post-2782 {
	margin:auto;
}

.checkboxes .gfield_label {
width:0px!important;
padding:0px!important;}
.gform_wrapper .top_label li.gfield.gf_right_half {
width: 49%;
}

</style>
<div id="holder"><div id="myheader"></div>		
<div id="country"></div>
<div id="mcg"></div></div>
<?php get_header(); ?> 
</head>
	<div id="title-container" class="col-full post">
		<h1 class="title"><?php the_title(); ?></h1>
		<?php include( get_template_directory() . '/search-form.php' ); ?>
	</div>

    <div id="content" class="page col-full">
	<div id="winipod"><div id="winipod2"> <br/><span class="line1">November 18, 2011</span><br/><span class="line2">Mid City Merchants'</span><br/><span class="line3">WHITE LIGHT NIGHT</span><br/><span class="line4">enter here to</span><br/><span class="line5">WIN AN</span><br/><span class="line6">IPOD TOUCH!</span><br/><span class="line7">With Compliments of the Mac Consulting Group, Inc. and Country Roads magazine.</span><br/><br/><span class="line8">Sign up to receive Country Roads e-newsletters</span><br/><span class="line8">while visiting the Mac Consulting Group, Inc. in the</span><br/><span class="line8">Goodwood Shopping Center (662 Jefferson Hwy)</span><br/><span class="line8">and you'll be entered to win!</span></div>
	</div> <!--winipod-->

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
	        
			</div>
			<!-- /#main -->
			
		</div><!-- /#inner -->
		
    </div><!-- /#content -->
