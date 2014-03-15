<?php
/*
Template Name: Agreement
*/
?>
<style>

body {
color:#333333!important;
font-family:Helvetica, sans-serif!important;
font-size:16px!important;
}

ul {line-height:20px;}

table td, table th {
padding:1px 10px 5px 5px;
vertical-align:top;
width:480px;
font-size:16px;
}

table th {
text-align:left;
}
.cellblock {
	width:300px;
	height:80px;
}
#separator {border-top:1px dotted #CCCCCC;margin-bottom:20px;}

.gform_wrapper span.ginput_product_price_label {
	margin-left:-20px;
}

.monitoredinput {
	position:absolute;
	z-index:0;
	width:400px;
	margin:-850px 0 0 200px;
}

.patchinput {
	position:absolute;
	z-index:0;
	width:400px;
	margin:-850px 0 0 550px;
}

.personalsupportprice, .premiersupportprice {
	position:absolute!important;
	margin-left:540px;
	margin-top:-315px!important;
	width:42%;
}

.monthlyprepaidprice {
	position:absolute!important;
	margin-left:540px;
	margin-top:-265px!important;
	width:42%;
}

.monitoredprice	{
	position:absolute!important;
	margin-left:540px;
	margin-top:-200px!important;
	width:42%;
}

.monitoredfamilyprice {
	position:absolute!important;
	margin-left:540px;
	margin-top:-155px!important;
	width:42%;
}

.monitoredbusinessprice {
	position:absolute!important;
	margin-left:540px;
	margin-top:-85px!important;
	width:42%;
}

.managedcompprice {
	margin-left:540px;
	width:42%;
}

.managedmacprice {
	margin-left:540px;
	width:42%;
}

.managedwinprice {
	margin-left:540px;
	width:42%;
}
.discounthour input, .phonesupport input, .premierphonesupport input, .prepaidhours input, .prepaidhours2 input, .monitoredcomp input, .managedcomp input, .managedmac input, .managedwin input, .product_discount input{
	display:none;
}
.discounthour .gfield_description {background-color:#FFFFFF; color:#06266F;font-size:16px;font-style:normal;}
.discounthour {position:relative; margin-top:-52px; margin-left:315px;z-index:7;text-decoration:blink!important;}
.phonesupport .gfield_description {background-color:#FFFFFF; color:#06266F;font-size:16px;font-style:normal;width:300px;line-height:17px;}
.phonesupport {position:relative; margin-top:-46px; margin-left:315px;z-index:8;}
.premierphonesupport .gfield_description {background-color:#FFFFFF; color:#06266F;font-size:16px;font-style:normal;}
.premierphonesupport {position:relative; margin-top:-36px; margin-left:315px;z-index:8;}
.prepaidhours .gfield_description {background-color:#FFFFFF; color:#06266F;font-size:16px;font-style:normal;}
.prepaidhours {position:relative; margin-top:-44px; margin-left:315px;z-index:9;}
.prepaidhours2 .gfield_description {background-color:#FFFFFF; color:#06266F;font-size:16px;font-style:normal;}
.prepaidhours2 {position:relative; margin-top:-42px; margin-left:315px;z-index:10;}
.monitoredcomp .gfield_description {background-color:#FFFFFF; color:#06266F;font-size:16px;font-style:normal;width:220px; height:40px;}
.monitoredcomp {position:absolute; margin-top:-295px; margin-left:315px;z-index:10;width: 220px;}
.managedcomp .gfield_description {background-color:#FFFFFF; color:#06266F;font-size:16px;font-style:normal;width:220px; height:40px;line-height:17px;}
.managedcomp {position:absolute; margin-top:-251px; margin-left:315px;z-index:10;}
.managedmac .gfield_description {background-color:#FFFFFF; color:#06266F;font-size:16px;font-style:normal;width:220px; height:40px;line-height:17px;}
.managedmac {position:absolute; margin-top:-208px; margin-left:315px;z-index:10;}
.managedwin .gfield_description {background-color:#FFFFFF; color:#06266F;font-size:16px;font-style:normal;width:220px; height:40px;line-height:17px;}
.managedwin {position:absolute; margin-top:-148px; margin-left:315px;z-index:10;}
.product_discount .gfield_description {background-color:#FFFFFF; color:#06266F;font-size:16px;font-style:normal;width:400px; height:55px;line-height:17px;}
.product_discount {position:absolute; margin-top:-417px; margin-left:315px;z-index:10;}
.supportinput {
margin-left: 500px;
position: absolute;
z-index: 100;
margin-top: -553px;
}
.monthlyinput {
margin-left: 500px;
position: absolute;
z-index: 100;
margin-top: -465px;
}

#gform_2 .gform_heading {
	visibility:hidden;
}
[name="MULTIPLE_18[]"] {
margin-left: -20px;
position: absolute;
margin-top: -58px;
}

}


.managedinput {
	position:absolute;
	z-index:0;
	margin-top:-246px;
}

.managedmacinput {
	position:absolute;
	z-index:0;
	margin-top:-204px;
}

.managedwininput {
	position:absolute;
	z-index:0;
	margin-top:-144px;
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
				<h2>Thank You for Choosing the Mac Consulting Group,
				Inc.</h2>
				<p>This Support Agreement sign-up form creates an agreement between the Mac Consulting
				Group, Inc. and you, the Client.</p><br/>
				<div id="separator"></div>


				<!-- Begin Benefits Table -->
				<table cellspacing="0">
					<legend><strong>Preventative Maintenance and Monitoring for Your Computers</legend></th><br/>

				<!-- Maintenance -->
				<tr>
				    <td>Workstations</td>
				    <td><div class="cellblock"></div></td>
					<td><div class="cellblock"></div></td>
				</tr>
				<tr>
				 	<td>Servers</td>
					<td><div class="cellblock"></div></td>
					<td><div class="cellblock"></div></td>
				</tr>
				<!-- In-house Repair Benefit Row -->
				<tr width="50%">
					<td>Out of warranty in-house hardware repair</td>
				<td><div id="default_repair" class="defaultterm">•$120 per hour</div>
					</td>
					<td></td>
				</tr>
<tr><td><br/></td></tr>
					<th><strong>Sales and Training</strong></th>


				<!-- Training Benefit Row -->
				<tr>
					<td>We carry the full line of Apple Computers, iPads, iPods, and AppleTV.<br/>We offer training classes at levels suitable from beginners to professionals.</br></td>
					<td><div id="default_sales" class="defaultterm">•Mac desktop, laptop, iPad, and <br/>&nbsp any other product we sell, at the <br/> &nbsp manufacturer's recommended price.<br/></div>
					</td>	
					<td></td>
				</tr>
				</tr>
<tr><td><br/></td></tr>
					<th><strong>Maintenance and Monitoring</strong></th>

				<!--Checking for Issues Benefit Row-->
				<tr>	
					<td >&nbsp &nbsp Inspection of your computer for known &nbsp &nbsp issues & back up status</td>
				    <td> <div id="monitored_check">•Performed as needed,<br/>  &nbsp billed at our hourly rate</div></td>
					<td></td>
				</tr>

				<!--Automated Update Benefit Row-->
				<tr>
					<td>&nbsp &nbsp Software updates & patches</td>
					<td><div id="managedcomp_updates">•Performed as needed,<br/>  &nbsp billed at our hourly rate</div>
					</td>
					<td></td>
				</tr>


				<!--Verification Benefit Row-->
				<tr  >	
					<td >&nbsp &nbsp Preventative maintenance and<br/> &nbsp &nbsp Macintosh server performance<br/> &nbsp &nbsp verification</td>
						<td><div id="managedmac_verification" >•Performed as needed,<br/>  &nbsp billed at our hourly rate</div>
						</td>
						<td></td>
				</tr>
				<tr  >	
					<td >&nbsp &nbspPreventative maintenance and <br/> &nbsp &nbsp Windows server performance <br/> &nbsp &nbsp verification</td>
						<td>
						<div id="managedwin_verification" >•Performed as needed,<br/> &nbsp billed at our hourly rate</div>
						</td>
						<td></td>
				</tr>

				</table>
				<!--End Benefits Table-->
				<br/>
				
		
	
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