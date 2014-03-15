<?php global $woo_options; ?>
<div id="slides">
	<div id="slide-box">
	<?php $slides = get_posts('suppress_filters=0&post_type=slide&showposts='.$woo_options[ 'woo_slider_entries' ]); ?>
	<?php if (!empty($slides)) : ?>
		<div class="slides_container col-full" <?php if($woo_options[ 'woo_slider_entries' ] == 1) { echo 'style="display: block;overflow: hidden;position: relative;"'; }?>>  
		<?php foreach($slides as $post) : setup_postdata($post); ?>
			
			<div class="slide" <?php if($woo_options[ 'woo_slider_entries' ] == 1) { echo 'style="display:block;"'; }?>>
			<?php
				$url = get_post_meta($post->ID, 'url', true);
				$slide_content_class = 'entry';
				$has_video = get_post_meta( $post->ID, 'embed', true );
				$has_image = get_post_meta( $post->ID, 'image', true );
				$post_thumb = get_option('woo_post_image_support') == 'true' && has_post_thumbnail();
				$title = $woo_options[ 'woo_slider_title' ] == "true";
				$content = $woo_options[ 'woo_slider_content' ] == "true";
			?>
			<?php if ( $has_video ) { $slide_content_class = 'vid-content'; } else { $slide_content_class = 'slide-content'; } ?>
			
			<?php if ( $has_video || $has_image || $post_thumb ) {	?>
			<?php if ( $title || $content ) { ?>
				<div class="entry <?php echo $slide_content_class; ?> fl">
				
					<?php if ( $title && !$has_video ) { ?><h2 class="title"><a href="<?php if ( $url ) { echo $url; } else { echo '#'; } ?>"><?php the_title(); ?></a></h2><?php } ?>
					
					<?php if ( $content ) { the_content(); } ?>
				
				</div><!-- /.slide-content -->
				<?php } ?>
					
					<?php if ( $has_image || $post_thumb ) { ?>
					<div class="slide-image fl">
					<?php if ( $url ) { ?>
					<a href="<?php echo $url; ?>" title="<?php the_title(); ?>"><?php woo_image('key=image&width=920&height=338&class=slide-img&link=img'); ?></a>
						<?php } else { ?>
						<?php woo_image('key=image&width=920&height=338&class=slide-img&link=img'); } ?>
					</div><!-- /.slide-image -->
					
					<?php } elseif ( $has_video ) {
					
						echo woo_embed('key=embed&width=500&class=video');
						
					  } ?>
								
					<div class="fix"></div>
					
				<?php } else { ?><!-- // End $type IF Statement -->
                
                	<div class="entry">
	                    <?php the_content(); ?>
                    </div>                        
               
                <?php } ?>
	                
			</div><!-- /.slide -->
			
		<?php endforeach; ?>
						
		</div><!-- /.slides_container -->
	<?php endif; ?>
	
	</div><!-- /#slide-box -->
	<?php if ($woo_options[ 'woo_slider_pagination' ] == "true") { ?>
	<div id="line_wrap"><div id="line"></div></div>
	<?php } ?>
</div><!-- /#slides -->
