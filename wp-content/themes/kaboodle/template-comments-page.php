<?php
/*
Template Name: Comments Page
*/
?>
<style>
body {
background:#FFFFFF!important;
background-image:none!important;
}

#comments {
width:80%;
}

#comment-header {
display:none;
}
.comment-header-border {
display:none!important;
}
#content {
background:#FFFFFF!important;
height: 10000px;
border:none!important;
}
.blurb {
font-size:18px;
display:block;
margin: 1em 2.5em 0 2.5em;
width:80%;
}

.primary {
margin-top:1em;
}

#reply-header {
display:none;
}

#respond #commentform #submit {
margin:15px 40px 0 0!important;
}

.button {
width:200px!important;
}

#commentform textarea {
background:#ddd!important;
margin: 0 0 0 20px;
}

#sidebar {
width: 220px!important;
padding-right: 20px;
}

#comments .comment-entry p {
font-size:14px;
}

#commentform p {
margin: 0 0 0 20px;
}
</style>

<?php get_header(); ?>
<?php global $woo_options; ?>

		<div id="primary">
			<div id="content" role="main">
			<?php get_sidebar(); ?>
			<span class="blurb">The best advertising is word of mouth. To that end we have gathered comments we've received over the years from our clients.

If you would like to leave your own comments, there is a form at the bottom of the page.</span>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>
<br/><br/><br/>
				<?php endwhile; // end of the loop. ?>
				

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>