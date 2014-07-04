<?php if ($comments) : ?>  
    <ol>
        <li><span class="comment-separator block"><?php comments_number('None'); ?></span></li>        
        <?php wp_list_comments(array('max_depth' => 4, 'avatar_size' => 48, 'callback' => 'frederick_theme_comment')); ?>  
    </ol>  
<div id="comments-pagination">&nbsp;</div>
    <span class="comment-separator block">Leave a Comment</span>
<?php else : ?>      
    <span class="comment-separator no-comments block">No comments yet, be the first one who will leave the comment.</span>
    <span class="block">&nbsp;</span>      
<?php endif; ?>  
<?php
if (!isset($aria_req)) {
	$aria_req = '';
}
comment_form(
        array('fields' => array(
                'author' => '<p class="comment-form-author">' .
                '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="20"' . $aria_req . ' /></p>',
                'email' => '<p class="comment-form-email">' .
                '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="20"' . $aria_req . ' /></p>'
            ),
            'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="6" aria-required="true"></textarea></p>',
            'title_reply' => '',
            'title_reply_to' => 'Leave a reply to %s - ',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'label_submit' => 'Add Comment'));
			
function frederick_theme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="single-comment-holder">
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php echo('Your comment is awaiting moderation.') ?></em>
                <br /> <br />
            <?php endif; ?>
            <div class="left vcard">
                <?php if ($args['avatar_size'] != 0)
                    echo get_avatar($comment, $args['avatar_size']); ?>
            </div>
            <div class="comment-author left">
                <?php echo comment_author(); ?>
            </div>
            <span class="comment-line-separator left">-</span>
            <div class="comment-date left">
                <?php comment_date('M j, Y'); ?> at <?php comment_date('g:i a'); ?>
            </div>			
            <div class="comment-text ">
                <?php comment_text() ?>
            </div>
			<div class="comment-reply right">
			 <?php comment_reply_link(array_merge($args, array('add_below' => '', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div> 
        </div>
        <div class="clear">&nbsp;</div>       
    
    <?php
}
?>    