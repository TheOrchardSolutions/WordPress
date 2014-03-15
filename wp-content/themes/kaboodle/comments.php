<?php
	
// Do not delete these lines

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ( 'Please do not load this page directly. Thanks!' );

if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'woothemes' ) ?></p>

<?php return; } ?>

<?php $comments_by_type = &separate_comments($comments); ?>    

<!-- You can start editing here. -->

<div id="comments">

<?php if ( have_comments() ) : ?>

	<?php if ( ! empty($comments_by_type['comment']) ) : ?>
		
		<span class="comment-header-border"></span>
		<div id="comment-header">
		<h3><?php comments_number(__( '0', 'woothemes' ), __( '1', 'woothemes' ), __( '%', 'woothemes' ) );?> <?php _e( 'Awesome Comments So Far', 'woothemes' ) ?></h3><?php _e( 'Don\'t be a stranger, join the discussion ', 'woothemes' ) ?><a href="#reply-header"><?php _e( 'by leaving your own comment ', 'woothemes' ) ?><span class="meta-nav">&rarr;</span></a>
		</div>
		<span class="comment-header-border"></span>

		<ol class="commentlist">
	
			<?php wp_list_comments( 'avatar_size=26&callback=custom_comment&type=comment' ); ?>
		
		</ol>    

		<div class="navigation">
			<div class="fl"><?php previous_comments_link() ?></div>
			<div class="fr"><?php next_comments_link() ?></div>
			<div class="fix"></div>
		</div><!-- /.navigation -->
	<?php endif; ?>
		    
	<?php if ( ! empty($comments_by_type['pings']) ) : ?>
    		
        <h3 id="pings"><?php _e( 'Trackbacks/Pingbacks', 'woothemes' ) ?></h3>
    
        <ol class="pinglist">
            <?php wp_list_comments( 'type=pings&callback=list_pings' ); ?>
        </ol>
    	
	<?php endif; ?>
    	
<?php else : // this is displayed if there are no comments so far ?>

		<?php if ( 'open' == $post->comment_status) : ?>
			<!-- If comments are open, but there are no comments. -->
			<p class="nocomments"><?php _e( 'No comments yet.', 'woothemes' ) ?></p>

		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<p class="nocomments"><?php _e( 'Comments are closed.', 'woothemes' ) ?></p>

		<?php endif; ?>

<?php endif; ?>

</div> <!-- /#comments_wrap -->

<?php if ( 'open' == $post->comment_status) : ?>

<div id="respond">
	
	<span class="comment-header-border"></span>
	<div id="reply-header">
	<h3><?php comment_form_title( __( 'Leave a Comment', 'woothemes' ), __( 'Leave a Comment to %s', 'woothemes' ) ); ?></h3><?php _e( 'Remember to play nicely folks, nobody likes a troll.', 'woothemes' ) ?>
	</div>
	<span class="comment-header-border"></span>
	
	<div class="cancel-comment-reply">
		<small><?php cancel_comment_reply_link(); ?></small>
	</div><!-- /.cancel-comment-reply -->

	<?php if ( get_option( 'comment_registration') && !$user_ID ) : //If registration required & not logged in. ?>

		<p><?php _e( 'You must be', 'woothemes' ) ?> <a href="<?php echo get_option( 'siteurl' ); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e( 'logged in', 'woothemes' ) ?></a> <?php _e( 'to post a comment.', 'woothemes' ) ?></p>

	<?php else : //No registration required ?>
	
		<form action="<?php echo get_option( 'siteurl' ); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( $user_ID ) : //If user is logged in ?>

			<p><?php _e( 'Logged in as', 'woothemes' ) ?> <a href="<?php echo get_option( 'siteurl' ); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(); ?>" title="<?php esc_attr_e( 'Log out of this account', 'woothemes' ) ?>"><?php _e( 'Logout', 'woothemes' ) ?> &raquo;</a></p>

		<?php else : //If user is not logged in ?>
		
			<p class="field">
                <input type="text" name="author" class="txt" id="commentauthor" tabindex="1" value="<?php if ( $comment_author ) echo esc_attr($comment_author); else _e('Name (required)', 'woothemes'); ?>" onfocus="if (this.value == '<?php _e('Name (required)', 'woothemes'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Name (required)', 'woothemes'); ?>';}" />
			</p>

			<p class="field">
                <input type="text" name="email" class="txt" id="email" tabindex="2" value="<?php if ( $comment_author_email ) echo esc_attr($comment_author_email); else _e('Email (required)', 'woothemes'); ?>" onfocus="if (this.value == '<?php _e('Email (required)', 'woothemes'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Email (required)', 'woothemes'); ?>';}" />
			</p>

			<p class="field last">
                <input type="text" name="url" class="txt" id="url" tabindex="3" value="<?php if ( $comment_author_url ) echo esc_attr($comment_author_url); else _e('Website (optional)', 'woothemes'); ?>" onfocus="if (this.value == '<?php _e('Website (optional)', 'woothemes'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Website (optional)', 'woothemes'); ?>';}" />
			</p>

		<?php endif; // End if logged in ?>

		<!--<p><strong>XHTML:</strong> <?php _e( 'You can use these tags', 'woothemes' ); ?>: <?php echo allowed_tags(); ?></p>-->

		<p><textarea name="comment" id="comment" rows="10" cols="50" tabindex="4"></textarea></p>

		<input name="submit" type="submit" id="submit" class="button" tabindex="5" value="<?php esc_attr_e( 'Submit Comment', 'woothemes' ) ?>" />
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		
		<?php comment_id_fields(); ?>
		<?php do_action( 'comment_form', $post->ID); ?>

		</form><!-- /#commentform -->

	<?php endif; // If registration required ?>

	<div class="fix"></div>

</div><!-- /#respond -->

<?php endif; // if you delete this the sky will fall on your head ?>
