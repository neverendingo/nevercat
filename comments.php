<?php
/**
 * Show comments box
 * 
 * @package Wordpress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 */
?>

<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!', 'nevercat'));

	if ( post_password_required() ) { ?>
		<section id="comments">
			<div class="notice alert-box">
				<?php _e('This post is password protected. Enter the password to view comments.', 'nevercat'); ?>
			</div>
		</section>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	<section id="comments">
		<h3><?php comments_number(__('No Responses to', 'nevercat'), __('One Response to', 'nevercat'), __('% Responses to', 'nevercat') ); ?> &#8220;<?php the_title(); ?>&#8221;</h3>
		<ol class="commentlist">
			<?php wp_list_comments('type=comment&callback=nevercat_comments'); ?>
		</ol>
		<footer>
			<nav id="comments-nav">
				<div class="comments-previous"><?php previous_comments_link( __( '&larr; Older comments', 'nevercat' ) ); ?></div>
				<div class="comments-next"><?php next_comments_link( __( 'Newer comments &rarr;', 'nevercat' ) ); ?></div>
			</nav>
		</footer>
	</section>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<section id="respond">
		<?php do_action( 'nevercat_respond_start' ); ?>
		<h3><?php comment_form_title( __('Leave a Response', 'nevercat'), __('Leave a Response to %s', 'nevercat') ); ?></h3>
		<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p><?php printf( __('You must be <a href="%s">logged in</a> to post a response.', 'nevercat'), wp_login_url( get_permalink() ) ); ?></p>
		<?php else : ?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<?php if ( is_user_logged_in() ) : ?>
					<p><?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'nevercat'), get_option('siteurl'), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'nevercat'); ?>"><?php _e('Log out &raquo;', 'nevercat'); ?></a></p>
				<?php else : ?>
					<p>
						<label for="author"><?php _e('Name', 'nevercat'); if ($req) _e(' (required)', 'nevercat'); ?></label>
						<input type="text" class="five" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>
					</p>
					<p>
						<label for="email"><?php _e('Email (will not be published)', 'nevercat'); if ($req) _e(' (required)', 'nevercat'); ?></label>
						<input type="text" class="five" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
					</p>
					<p>
						<label for="url"><?php _e('Website', 'nevercat'); ?></label>
						<input type="text" class="five" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3">
					</p>
				<?php endif; ?>
				<p>
					<label for="comment"><?php _e('Comment', 'nevercat'); ?></label>
					<textarea name="comment" id="comment" tabindex="4"></textarea>
				</p>
				<p id="allowed_tags" class="small"><strong>XHTML:</strong> <?php _e('You can use these tags:','nevercat'); ?> <code><?php echo allowed_tags(); ?></code></p>
				<p><input name="submit" class="button" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Submit Comment', 'nevercat'); ?>"></p>
				<?php comment_id_fields(); ?>
				<?php do_action('comment_form', $post->ID); ?>
			</form>
		<?php endif; // If registration required and not logged in ?>
		<?php do_action( 'nevercat_respond_end' ); ?>
	</section>
<?php endif; ?>
