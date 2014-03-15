<?php
/*
Template Name: Schedule
*/
?>

<style>
body {
	font-family:Helvetica, sans-serif;
}
a {
	color:#777777!important;
}
a:hover {
	color:#444444!important;
}

.mac101 {
	display: block;
	width: 125px;
	height: 94px;
	background: url('https://www.theorchardsolutions.com/media/mac1011.jpg') bottom;
	text-indent:-9999px;
}
.ios {
	display: block;
	width: 125px;
	height: 94px;
	background: url('https://www.theorchardsolutions.com/media/ios1.jpg') bottom;
	text-indent:-9999px;
}
.ilife {
	display: block;
	width: 125px;
	height: 94px;
	background: url('https://www.theorchardsolutions.com/media/ilife1.jpg') bottom;
	text-indent:-9999px;
}
.imovie {
	display: block;
	width: 125px;
	height: 94px;
	background: url('https://www.theorchardsolutions.com/media/imovie1.jpg') bottom;
	text-indent:-9999px;
}
.garageband {
	display: block;
	width: 125px;
	height: 94px;
	background: url('https://www.theorchardsolutions.com/media/garageband1.jpg') bottom;
	text-indent:-9999px;
}
.iphoto{
	display: block;
	width: 125px;
	height: 94px;
	background: url('https://www.theorchardsolutions.com/media/iphoto1.jpg') bottom;
	text-indent:-9999px;
}
.iwork{
	display: block;
	width: 125px;
	height: 94px;
	background: url('https://www.theorchardsolutions.com/media/iwork1.jpg') bottom;
	text-indent:-9999px;
}
.pages{
	display: block;
	width: 125px;
	height: 94px;
	background: url('https://www.theorchardsolutions.com/media/pages1.jpg') bottom;
	text-indent:-9999px;
}
.keynote{
	display: block;
	width: 125px;
	height: 94px;
	background: url('https://www.theorchardsolutions.com/media/keynote1.jpg') bottom;
	text-indent:-9999px;
}
.numbers{
	display: block;
	width: 125px;
	height: 94px;
	background: url('https://www.theorchardsolutions.com/media/numbers1.jpg') bottom;
	text-indent:-9999px;
}
.mac101:hover, .ios:hover, .ilife:hover, .imovie:hover, .garageband:hover, .iphoto:hover, .iwork:hover, .pages:hover, .keynote:hover, .numbers:hover{
	background-position: 0 0;
}

table {
	margin:auto!important;
}

td {
	text-align:center;
}
</style>

<title>Schedule for Everyone</title>

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
				<center><h3>The Mac Consulting Group, Inc. Apple Authorized Training Center</h3>
					<br/><h4>Select an Image Below to Register for a Class</h4></center><br/><br/>
				<div id="table-schedule">
					<table>
						<tr>
							<td></td><td></td><td><a class="mac101" href="https://www.theorchardsolutions.com/mac-101">Mac 101</a></td>
						<td width="100"></td>
						<td><a class="ios" href="https://www.theorchardsolutions.com/ios">iOS</a></td>
						<td width="100"></td>
					</tr>
					<tr><td></td><td></td><td><a href="https://www.theorchardsolutions.com/mac-101">Mac 101</a></td>
						<td width="100"></td>
						<td><a href="https://www.theorchardsolutions.com/ios">iOS</a></center></td>
						<td width="100"></td>
					</tr>
					<tr style="height:25px;"></tr>	
						<tr><td><a class="ilife" href="https://www.theorchardsolutions.com/ilife-101">iLife</a></td>
						<td width="100"></td>
						<td><a class="imovie" href="https://www.theorchardsolutions.com/imovie-201">iMovie</a></td>
						<td width="100"></td>
						<td><a class="garageband" href="https://www.theorchardsolutions.com/garageband-201">GarageBand</a></td>
						<td width="100"></td>
						<td><a class="iphoto" href="https://www.theorchardsolutions.com/iphoto-201">iPhoto</a></td>
					</tr>	
							<tr><td><a href="https://www.theorchardsolutions.com/ilife-101">iLife</a></td>
							<td width="100"></td>
							<td><a href="https://www.theorchardsolutions.com/imovie-101">iMovie</a></td>
							<td width="100"></td>
							<td><a  href="https://www.theorchardsolutions.com/garageband-201">GarageBand</a></td>
							<td width="100"></td>
							<td><a href="https://www.theorchardsolutions.com/iphoto-201">iPhoto</a></td>
						</tr>
					<tr style="height:25px;"></tr>	
						<tr><td><a class="iwork" href="https://www.theorchardsolutions.com/iwork-101">iWork</a></td>
						<td width="100"></td>
						<td><a class="pages" href="https://www.theorchardsolutions.com/pages-201">Pages</a></td>
						<td width="100"></td>
						<td><a class="keynote" href="https://www.theorchardsolutions.com/keynote-201">Keynote</a></td>
						<td width="100"></td>
						<td><a class="numbers" href="https://www.theorchardsolutions.com/numbers-201">Numbers</a></td>
					</tr>
						<tr><td><a href="https://www.theorchardsolutions.com/iwork-101">iWork</a></td>
						<td width="100"></td>
						<td><a href="https://www.theorchardsolutions.com/pages-201">Pages</a></td>
						<td width="100"></td>
						<td><a href="https://www.theorchardsolutions.com/keynote-201">Keynote</a></td>
						<td width="100"></td>
						<td><a href="https://www.theorchardsolutions.com/numbers-201">Numbers</a></td>
					</tr>
						
					</table>
					</div>
	
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