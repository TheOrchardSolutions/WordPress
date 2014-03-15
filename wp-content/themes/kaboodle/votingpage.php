<?php
/*
Template Name: Voting Page
*/
?>
<head>

<style type="text/css" media="all">

body {
	background:#FFFFFF;
}

#wrap {
	background:#FFFFFF;
	width:960px;
	margin:auto;
	padding:10px;
}

#header {
	background:url('http://macconsultinggroup.com/media/logos/and.png');
	background-repeat:no-repeat;
	background-position:54% 50%;
	height:110px;
	padding:4px 0 0 0;
}

#country {
	background:url('http://countryroadsmagazine.com/templates/rt_solarsentinel_j15/images/header/green/logo.jpg');
	background-repeat:no-repeat;
	margin-left:15px;
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
	margin-right:30px;
}

#artmelt {
	background:url('http://macconsultinggroup.com/media/logos/artmelt.png');
	background-repeat:no-repeat;
	height:300px;
}

#title {
	background:url('http://macconsultinggroup.com/media/logos/art-melt-present.jpg');
	height:106px;
}

#main {
	width:802px;
	border-left:69px solid #c69b31;
	border-right:69px solid #c69b31;
	margin-left:10px;
	margin-top-2px
}

h1, h2, h3, h4, h5 {
	font-family:Arial, sans-serif;
}

#footer {
	background:#c69b31;
	height:69px;
	margin-left:10px;
	width:940px;
	margin-top:-2px;
	
}

html .fb_share_link { 
	padding:2px 0 0 20px; 
	height:16px; 
	background:url(http://macconsultinggroup.com/media/icons/facebook_icon_20px.jpg) no-repeat top left; 
	}
#share {
	padding-left:80px;
	font-family:Arial, sans-serif;
}
#share a {
	color:#555555;
}

</style>

<script>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}
</script>

</head>
	<body>
			<div id="wrap">
				<div id="header">
				<div id="country"></div>
				<div id="mcg"></div>
				</div>
				<div id="title"></div>
				<div id="share"><a rel="nofollow" href="http://www.facebook.com/share.php?u=<;url>" onclick="return fbs_click()" target="_blank" class="fb_share_link">Share on Facebook</a>&nbsp &nbsp<a href="http://twitter.com/home?status=An Interesting Article <?php the_permalink(); ?>" title="Send this page to Twitter!" target="_blank"><img src="http://macconsultinggroup.com/media/icons/twitter_icon_20px.jpg">Tweet This!</a></div>
				<div id="artmelt"></div>
				

					<div id="main">
					<?php if (have_posts()) : $count = 0; ?><?php while (have_posts()) : the_post(); $count++; ?><?php the_content(); ?>
					<?php endwhile; else: ?>
					<?php endif; ?>  
					</div>
			<div id="footer"></div>
			</div>

</div>



</body>