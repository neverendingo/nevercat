<?php
/**
 * The template to show when no content is found
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 */
?>
<section>
	<header class="page-header">
		<h1 class="page-title nothing-found"><?php _e( 'Nothing Found', 'nevercat' ); ?></h1>
	</header>
	
	<div class="page-content">
		<div data-alert class="alert-box alert">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	
		<?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'nevercat' ), admin_url( 'post-new.php' ) ); ?>
		</div>
		<?php elseif ( is_search() ) : ?>
	
		<?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nevercat' ); ?>
		</div>
		<?php get_search_form(); ?>
	
		<?php else : ?>
	
		<?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'nevercat' ); ?>
		</div>
		<?php get_search_form(); ?>
	
		<?php endif; ?>
		
	</div>
</section>