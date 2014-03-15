<?php
/*
Template Name: Voting Page 2
*/
?>
<head>
<style>
a:hover {cursor:pointer!important;}

#content {
margin-top:-100px!important;
}

#header-container {
	display:none;
}

#holder {
	width:1164px;
	margin:auto;

}

#myheader {
	background:none;
	background-repeat:no-repeat;
	background-position:54% 50%;
	height:110px;
	padding:4px 0 0 0;
}
#country {
	background:url('http://countryroadsmagazine.com/templates/rt_solarsentinel_j15/images/header/green/logo.jpg');
	background-repeat:no-repeat;
	margin:-110px 0 0 115px;
	height:106px;
	width:49%;
	float:left;
	padding:0 0 25px 0;
}

#mcg {
	background:url('http://macconsultinggroup.com/media/logos/mcg-horiz.jpg');
	background-repeat:no-repeat;
	height:106px;
	width:40%;
	float:right;
	background-position:right;
	margin:-110px 130px 0 0;
}

#artmelt {
	background:url('http://macconsultinggroup.com/media/logos/artmelt.png');
	background-repeat:no-repeat;
	height:340px;
	position:relative;
	z-index:10;
}

#title {
	/*background:url('http://macconsultinggroup.com/media/logos/art-melt-present.jpg');
	background-repeat:no-repeat;
	height:71px;
	margin-left:100px;*/
	display:none;
}
body {
	background:#FFFFFF!important;
}
#content {
	background:#FFFFFF!important;
	width:1024px;
	margin-top:-25px!important;
	border-left:solid 70px #afbd21!important;
	border-right:solid 70px #afbd21!important;
	border-bottom:solid 70px #afbd21!important;
	border-top:none!important;
}

#main.fullwidth, #main.col-full {
	margin-left:-12px;
	width:1024px!important;
}
.entry img, img.thumbnail {
	border:0px!important;
	-webkit-box-shadow:none!important;
	padding:0px!important;
	box-shadow:none!important;
}
h3 {
	color:#000!important;
	font-size:40px!important;
}
#title-container, #breadcrumbs {
	display:none;
}

#luxury, .email_input {
	border-bottom:solid 5px #afbd21;
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

input[type="submit"] {
	color:transparent!important;
	background-color:#FFFFFF!important;
	border:none!important;
	background-image:url('/media/logos/votebutton.png')!important;
	background-repeat:no-repeat;
	-moz-border-radius:none!important;
	-webkit-border-radius:none!important;
	-moz-box-shadow:none!important;
	-webkit-box-shadow:none!important;
	height:120px;
	width:302px;
}
input[type="submit"]:hover {
	cursor:pointer!important;
	color:transparent!important;
	background-color:#FFFFFF!important;
	border:none!important;
	background-image:url('/media/logos/votebutton2.png')!important;
	background-repeat:no-repeat;
	-moz-border-radius:none!important;
	-webkit-border-radius:none!important;
	-moz-box-shadow:none!important;
	-webkit-box-shadow:none!important;
	height:120px;
	width:302px;
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
.gform_wrapper .gform_heading {
	width:100%!important;
	margin-bottom:0px!important;
}

#gform_fields_29 .gfield_label {
display:none!important;
}
</style>
<div id="holder"><div id="myheader"></div>		
<div id="country"></div>
<div id="mcg"></div>
<div id="title"></div>
<div id="artmelt"></div></div>
<?php get_header(); ?> 
</head>
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
	        
			</div>
			<!-- /#main -->
			
		</div><!-- /#inner -->
    </div><!-- /#content -->
		