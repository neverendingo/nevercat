<?php
/**
 * Display author information
 * 
 * @package Wordpress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 * 
 */
?>

<?php
if ( is_single() ) : ?>
<aside class="author-info">
	<header>
		<h2><?php _e( 'Published by', 'nevercat' ); ?></h2>
	</header>
	<div class="vcard">
		<div class="author-avatar right">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 72 ); ?>
		</div>
		<div class="author-description">
			<h3><?php echo get_the_author(); ?></h3>
			<blockquote><?php the_author_meta( 'description' ); ?></blockquote>
			<p>
				<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
					<?php printf( __( 'View all posts by %s', 'nevercat' ), get_the_author() ); ?>
				</a>
			</p>
		</div><!--.author-description-->
	</div><!--.vcard-->
</aside><!-- .author-info -->
<?php endif; ?>