<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package azandmag
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area mainView">
	<div class="commentInner">
		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) :
			?>
			<div class="generalHeading"><h2 class="comments-title">دیدگاه ها</h2><!-- .comments-title --></div>
			<?php the_comments_navigation(); ?>
			<ol class="comment-list">
				<?php
				wp_list_comments(
					array(
						'style'      => 'ol',
						'short_ping' => true,
					)
				);
				?>
			</ol><!-- .comment-list -->
			<?php
			the_comments_navigation();
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
				?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'azandmag' ); ?></p>
				<?php
			endif;
		endif; // Check for have_comments().?>
		<div class="generalHeading"><h2 class="comments-title">دیدگاهتان را بنویسید</h2><!-- .comments-title --></div><?php
		comment_form();
		?>
	</div>
</div><!-- #comments -->
