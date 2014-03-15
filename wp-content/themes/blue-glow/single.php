<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="post">
			<!-- <div class="date">
						<?php the_time('M'); ?><br /><span class="day"><?php the_time('d'); ?></span></div> -->
			<h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<!-- Posted under <?php the_category(', '); ?> by <?php the_author(); ?> -->
				<?php the_content('Read the rest of this entry &raquo;'); ?>
				<div class="postinfo">
					<div class="alignleft"><?php previous_post_link('%link', '<span class="meta-nav">&laquo;</span> %title') ?></div>
					<div class="alignright"><?php next_post_link('%link', '%title <span class="meta-nav">&raquo;</span>') ?></a></div>
				</div>
			</div>
			
	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<h1 class="title">Not Found</h1>
		<p>I'm Sorry, I am really embarrased, I dont know how to say this, I actually hate to say this. But no other go, I must tell you and tell you now itself..that..  YOU are looking for something that ISN'T HERE. I swear. It was never here</p>

<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>