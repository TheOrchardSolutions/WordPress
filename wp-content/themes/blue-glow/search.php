<?php get_header(); ?>

	<?php if (have_posts()) : ?>
			
		<h2 class="pagetitle">Search Results</h2>

		<?php while (have_posts()) : the_post(); ?>
	
			<div class="post">
			<!-- <div class="date">
						<?php the_time('M'); ?><br /><span class="day"><?php the_time('d'); ?></span></div> -->
			<h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				Posted under <?php the_category(', '); ?>
				<?php the_content('Read the rest of this entry &raquo;'); ?>
				<div class="postinfo">
					<div class="author"> Posted by <?php the_author(); ?></div>
					<div class="p_comments"><?php comments_popup_link('ADD COMMENTS', '1 COMMENT', '% COMMENTS'); ?></div>
				</div>
			</div>
					
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
		</div> <!-- close: post -->

	<?php else : ?>
		<div class="post">

		<h1 class="title">Not Found</h1>
		<p>Sorry, no post matched your criteria. Try a different search?</p>
		</div> <!-- close: post -->

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>