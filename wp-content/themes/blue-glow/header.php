<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<meta http-equiv="imagetoolbar" content="false" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<base href="<?php bloginfo('url'); ?>" />

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/reset.css" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/webstore.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/pushup.css" />

	<!--[if IE]>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/ie.js" type="text/javascript"></script>
	<![endif]-->
	<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie7.css" />
	<![endif]-->
	<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie6.css" />   
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/search.css" id="searchcss" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/dummy.css" id="dummy_css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/datepicker.css" />
	
	<script type="text/javascript">
	//<![CDATA[
		var XLSTemplate = "<?php bloginfo('stylesheet_directory'); ?>/";
	//]]>
	</script>

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>

	<?php wp_enqueue_script( 'jquery' ); ?> 
	<link rel='stylesheet' type='text/css' media='all' href='/wp-content/themes/blue-glow/css/jquery.autocomplete.css' />

	<link href="<?php bloginfo('stylesheet_directory'); ?>/js/listexpander/listexpander.css" rel="stylesheet" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/listexpander/listexpander.js"></script>
	<script type="text/javascript" charset="utf-8">
	jQuery.noConflict();
	jQuery(document).ready(function(){
		jQuery('#nav ul li ul li').has('ul').addClass('haskids');
		// jQuery("dl.faq dd").hide();
		// jQuery("dl.faq dt").click(function () {
		// 	jQuery(this).next("dd").toggle();
		//     	});
     });	
	</script>
</head>
<body>
			<div id="c4_ctl" style="position:absolute;display:inline;"></div>
			<div id="container">
				<div id="header">
					<div id="login" class="rounded {5px bottom transparent}">
						<div class="text">
							<div class="left" style="margin: 0 5px 0 0;">
								Welcome!
							</div>
							<div class="right">
								<a href="<?php bloginfo('rss_url'); ?>" >RSS</a> &nbsp;|&nbsp; <a href="<?php bloginfo('home'); ?>/">Home</a>
								<!-- <a href="#" class="loginbox">Login</a> &nbsp;|&nbsp; <a href="index.php?xlspg=customer_register">Register</a> -->
							</div>
						</div>
					</div>
					<div class="blogname">
						<h1><a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('name');?>"><?php bloginfo('name');?></a></h1>
						<h2><?php bloginfo('description'); ?></h2>
				
				
						<!-- JoomlaWorks "Simple Image Rotator" Module (v1.2) starts here -->
						<noscript>
							<div class="message">Sorry, but Javascript is not enabled in your browser!</div>
						</noscript>
						<script language="javascript" type="text/javascript">
							<!--
								var embedSIRCSS = '<' + 'style type="text/css" media="all">'
								+ '@import "<?php bloginfo('stylesheet_directory'); ?>/rand/mod_jw_sir.css";'
								+ 'ul#jw-sir,ul#jw-sir li#jw-sir-loading {width:494px;height:63px;}'
								+ '</' + 'style>';
								document.write(embedSIRCSS);
							-->
						</script>
						<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/rand/mod_jw_sir.js"></script>
						<script type="text/javascript">var delay=6750;var transition=50;var preLoader='jw-sir-loading';</script>
						<ul id="jw-sir" class="">
							<li id="jw-sir-loading"></li>
							<li><a href="/reseller"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/apple_authorized_reseller_bw.png" title="Apple Representation" alt="Apple Representation" /></a></li>
							<li><a href="/acn" title="Mac Consulting Group"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/apple_consultants_network_bw.gif" title="Apple Representation" alt="Apple Representation" /></a></li>
							<li><a href="/aasp" title="Mac Consulting Group"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/apple_service_provider_bw.gif" title="Apple Representation" alt="Apple Representation" /></a></li>
							<li><a href="/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/apple_specialist_bw.png" title="Apple Representation" alt="Apple Representation" /></a></li>
							<li><a href="/aatc"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/apple_train_ctr.png" title="Apple Training Center" alt="Apple Training Center" /></a></li>
						</ul>
						<!-- JoomlaWorks "Simple Image Rotator" Module (v1.2) ends here -->
					</div>
				</div>
				
				<div id="body">
					<div id="content" class="rounded {5px top-right bottom transparent}">
						<div id="nav" class="rounded {5px top transparent}">
							<ul>
								<li id="products">
									<a href="index.php">Home</a>
								</li>
								<?php wp_list_pages('title_li=&depth=9&exclude=40'); ?>
								<?php get_search_form(); ?>
							</ul>
						</div>
						<div id="c3_ctl" style="display:inline;">
							<div id="c3">
								<div id="breadcrumbs" class="rounded {2px transparent}">
									<a href="https://macconsultinggroup.com" title="Home" id="home_link">
										<img src="<?php bloginfo('stylesheet_directory'); ?>/css/images/breadcrumbs_spinner.png" style="display: block; float: left; margin: 0 10px 0 12px;" />
									</a> 
									<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

								</div>
							</div>
						</div>
						<div id="c17_ctl" style="display:inline;">
							<div id="c17">
								<div style="clear:both; padding-left:30px;">
									<p style="margin-bottom: 15px;"></p>
								</div>
								<div id="main_panel" class="rounded {2px transparent}">
