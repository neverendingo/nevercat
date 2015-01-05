<?php
/**
 * Handle comments
 * 
 * @package Wordpress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 */

function nevercat_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>">
			<header class="comment-author vcard">
				<?php echo get_avatar($comment,$size='48'); ?>
				<div class="author-meta">
					<?php printf(__('<cite class="fn">%s</cite>', 'nevercat'), get_comment_author_link()) ?>
					<time datetime="<?php echo comment_date('c') ?>"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s', 'nevercat'), get_comment_date(),  get_comment_time()) ?></a></time>
					<?php edit_comment_link(__('(Edit)', 'nevercat'), '', '') ?>
				</div>
			</header>

			<?php if ($comment->comment_approved == '0') : ?>
				<div class="notice">
					<p class="bottom"><?php _e('Your comment is awaiting moderation.', 'nevercat') ?></p>
				</div>
			<?php endif; ?>

			<section class="comment">
				<?php comment_text() ?>
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</section>

		</article>
<?php }