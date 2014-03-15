<?php get_header(); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post">
			<!-- <div class="date">
						<?php the_time('M'); ?><br /><span class="day"><?php the_time('d'); ?></span></div> -->
			<h1 class="title"><!-- <a href="<?php the_permalink(); ?>"> --><?php the_title(); ?><!-- </a> --></h1>
				<!-- Posted under <?php the_category(', '); ?> by <?php the_author(); ?> -->
				<ul class="toclist">
					<!-- <?php global $id;
										wp_list_pages("title_li=&child_of=$id&show_date=modified&date_format=$date_format"); ?> -->
				</ul>
				<?php the_content('Read the rest of this entry &raquo;'); ?>
				<!-- <div class="postinfo"></div> -->
			</div>
			<?php comments_template(); ?>
		<?php endwhile; endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>