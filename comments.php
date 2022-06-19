<?php
/**
 * The template for displaying comments
 * 
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	if ( have_comments() ) : ?>
		<h2 class="comments-title"><?php _e( 'Comments', 'levy52' ); ?></h2>

		<?php the_comments_navigation(); ?>

		<ul class="comment-list">
			<?php
			wp_list_comments( array(
				'short_ping' => true,
			) );
			?>
		</ul>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed', 'levy52' ); ?></p>
		<?php
		endif;

	endif;

	$comments_args = array(
        // change the title of send button 
        'label_submit'=> __( 'Send', 'levy52' ),
        // change the title of the reply section
        'title_reply'=>__( 'Write a Reply or Comment', 'levy52' ),
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<span class="comment-form-comment"><label for="comment">' . __( 'Comment', 'levy52' ) . '</label><textarea id="comment" name="comment" aria-required="true"></textarea></span>',
); 

comment_form($comments_args);
	?>

</div>