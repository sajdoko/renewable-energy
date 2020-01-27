<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Renewable_Energy
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div class="comments-area" id="comments">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

		<h2 class="comments-title">
			
			<?php
				$renewable_energy_comments_number = get_comments_number();
				if ( 1 === (int)$renewable_energy_comments_number ) {
					printf(
						/* translators: %s: post title */
						esc_html_x('One thought on &ldquo;%s&rdquo;', 'comments title', 'renewable-energy'),
						'<span>' . esc_html( get_the_title() ) . '</span>'
					);
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						esc_html( _nx(
							'%1$s thought on &ldquo;%2$s&rdquo;',
							'%1$s thoughts on &ldquo;%2$s&rdquo;',
							$renewable_energy_comments_number,
							'comments title',
							'renewable-energy'
						) ),
						esc_html( number_format_i18n( $renewable_energy_comments_number ) ),
						'<span>' . esc_html( get_the_title() ) . '</span>'
					);
				}
			?>

		</h2><!-- .comments-title -->

		<?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : // are there comments to navigate through. ?>
			
			<nav class="comment-navigation" id="comment-nav-above">
				
				<h1 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'renewable-energy'); ?></h1>
				
				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous"><?php previous_comments_link( __('&larr; Older Comments',
					'renewable-energy') ); ?></div>
				<?php }
					if ( get_next_comments_link() ) { ?>
					<div class="nav-next"><?php next_comments_link( __('Newer Comments &rarr;',
					'renewable-energy') ); ?></div>
				<?php } ?>

			</nav><!-- #comment-nav-above -->

		<?php endif; // check for comment navigation. ?>

		<ol class="comment-list">

			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>

		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : // are there comments to navigate through. ?>
			
			<nav class="comment-navigation" id="comment-nav-below">
				
				<h1 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'renewable-energy'); ?></h1>
				
				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous"><?php previous_comments_link( __('&larr; Older Comments',
					'renewable-energy') ); ?></div>
				<?php }
					if ( get_next_comments_link() ) { ?>
					<div class="nav-next"><?php next_comments_link( __('Newer Comments &rarr;',
					'renewable-energy') ); ?></div>
				<?php } ?>

			</nav><!-- #comment-nav-below -->
			
		<?php endif; // check for comment navigation. ?>

	<?php endif; // endif have_comments(). ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments') ) :
		?>

		<p class="no-comments"><?php esc_html_e('Comments are closed.', 'renewable-energy'); ?></p>

	<?php endif; ?>

	<?php comment_form(); // Render comments form. ?>

</div><!-- #comments -->
