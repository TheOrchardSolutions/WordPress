<?php
/*
Template Name: Portfolio
*/

global $woo_options, $post;
get_header();

/**
 * Setup variables for use in this page template.
 */
 
 $title = get_the_title( $post->ID );
 $description = '';
 
 $fields = array( 'title', 'description' );
 
 foreach ( $fields as $f ) {
 
	 if ( is_array( $woo_options ) && @$woo_options['woo_portfolio_' . $f] ) {
	 	${$f} = $woo_options['woo_portfolio_' . $f];
	 }
 
 }
?>     
	<div id="title-container" class="col-full post">
		<?php if ( $title ) { ?><h1 class="title"><?php echo $title; ?></h1><?php } ?>
		<?php if ( $description ) { ?><span class="blog-title-sep">&bull;</span><span class="description"><?php echo $description; ?></span><?php } ?>
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
		           
		<?php
			/* Get all portfolio items from the database.
			--------------------------------------------------*/
			 
			 if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } elseif ( get_query_var('page') ) { $paged = get_query_var('page'); } else { $paged = 1; }
			 $args = array(
							'post_type' => 'portfolio', 
							'paged' => $paged, 
							'posts_per_page' => -1
						);
			 query_posts( $args );
			 
			 $posts = array();
			 
			/* Remove posts that don't have an image available.
			--------------------------------------------------*/
			 
			 if ( have_posts() ) {
			 	while( have_posts() ) {
			 		the_post();
			 		
			 		if ( ! woo_image( 'key=portfolio-image&return=true' ) ) {} else {
			 			$posts[] = $post;
			 		}
			 	}
			 }
			 
			 rewind_posts();
		?>
		<div id="content-header-border"></div>
		
		<div class="fix"></div>		
		
		<div id="main" class="fullwidth">

			<div id="portfolio" class="col-full">
			
			<!-- Tags -->
			<?php
				$has_tags = false;
				
				if ( $woo_options['woo_portfolio_tags'] ) {
				
				$has_tags = true;
			?>
		    	<div id="port-tags">
		            	<?php
						$tags = explode( ',',$woo_options['woo_portfolio_tags'] ); // Tags to be shown
						foreach ( $tags as $tag ){
							$tag = trim($tag); 
							$displaytag = $tag;
							$tag = str_replace (" ", "-", $tag);	
							$tag = str_replace ("/", "-", $tag);
							$tag = strtolower ( $tag );
							$link_tags[] = '<a href="#'.$tag.'" rel="'.$tag.'">'.$displaytag.'</a>' . "\n"; 
						}
						$new_tags = implode(' ',$link_tags);
						?>
		                <span class="port-cat"><ul><li><a href="#" rel="all"><?php _e( 'All', 'woothemes' ); ?></a></li><li><?php echo $new_tags; ?></li></ul></span>
		      		<div class="fix"></div><!--/.fix-->
		      	</div><!--/#port-tags-->
			<?php } ?>
			<!-- /Tags -->
			
				<ol class="portfolio dribbbles">
				<?php
					/* Display items.
					--------------------------------------------------*/
					if ( count( $posts ) ) {
					
						$count = 0;
					
						foreach ( $posts as $post ) {
							setup_postdata( $post );
							$count++;
							
							// Portfolio tags class
							$porttag = ""; 
							$posttags = get_the_tags(); 
							if ($posttags) { 
								foreach( $posttags as $tag ) { 
									$tag = $tag->name;
									$tag = str_replace (" ", "-", $tag);	
									$tag = str_replace ("/", "-", $tag);
									$tag = strtolower ( $tag );
									$porttag .= $tag . ' '; 
								} 
							}
							
				?>
				<li class="group post portfolio-img <?php echo trim( $porttag ); ?>">
					<div class="dribbble">
						<div class="dribbble-shot">
							<div class="portfolio-img dribbble-img">
								<a href="<?php the_permalink(); ?>" class="dribbble-link"><?php woo_image('key=portfolio-image&width=200&height=150&link=img'); ?></a>
								<a href="<?php the_permalink(); ?>" class="dribbble-over"><strong><?php the_title(); ?></strong> 
									<!-- <span class="dim">Your Player Name</span>  -->
									<em><?php the_time( get_option( 'date_format' ) ); ?></em> 
								</a>
							</div>
						</div>
					</div>
				</li>
				<?php
						if ( $count % 4 == 0 && $count > 1 ) { echo '<div class="fix"></div>' . "\n"; }	
						
							$count++;
						
						} // End FOREACH Loop
					
					} else {
					
						if ( $has_tags ) {
					
				?>
				<div class="post">
	                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
	            </div><!-- /.post -->
				<?php
						}
					
					}
				?>
				</ol><!--/.portfolio dribbbles-->
				<div class="fix"></div>
			    <?php
			    	/* IF WP Dribbble plugin is available, load it.
					--------------------------------------------------*/
					
					if ( function_exists( 'wpDribbble' ) ) {
					
					$dribbble_settings = get_option( 'widget_wpDribbble' );
					
				?>
				<div class="dribbble-shots">
				  <div id="dribbble-header-box">
					<span class="comment-header-border"></span>
						<div id="dribbble-header">
							<h2><?php _e( 'Sweet shots on Dribbble', 'woothemes' ); ?></h2>
								<div class="blurb"><?php printf( __( 'Want to keep up with what we\'re working on? %s', 'woothemes' ), '<a href="http://dribbble.com/' . $dribbble_settings['playerName'] . '">' . __( 'Follow us on Dribbble', 'woothemes' ) . '<span class="meta-nav">&rarr;</span></a>' ); ?></div><!--/.blurb-->
						</div><!--/#dribbble-header-->
					<span class="comment-header-border"></span>
				  </div><!--/#dribbble-header-box-->
					<div class="fix"></div>
				<?php
			    		do_action( 'wp_dribbble' );
			    ?>
			    </div><!--/.dribbble-shots-->
			    <?php		
			    	}
			    ?> 
        	</div><!-- /#portfolio -->
        
		</div><!-- /#main -->
		
	</div><!-- /#inner -->
    </div><!-- /#content -->
		
<?php get_footer(); ?>