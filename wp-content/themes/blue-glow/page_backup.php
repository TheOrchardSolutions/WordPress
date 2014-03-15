<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="text">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post">
			<!-- <div class="date">
						<?php the_time('M'); ?><br /><span class="day"><?php the_time('d'); ?></span></div> -->
			<h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<!-- Posted under <?php the_category(', '); ?> by <?php the_author(); ?> -->
				<?php if($post->post_parent)
								$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
							else
								$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
							if ($children) { ?>
						  		<ul class="toclist">
						  		<?php echo $children; ?>
								</ul>
						<?php } ?>
				<?php the_content('Read the rest of this entry &raquo;'); ?>
				<!-- <div class="postinfo"></div> -->
			</div>
			<?php comments_template(); ?>
		<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>