<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'nevercat_post_start' ); ?>
	<header class="entry-header">
		<?php
			if ( is_single() || is_page() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content( sprintf(
				__( 'Continue reading %s', 'nevercat' ),
				the_title( '<span class="hide">', '</span>', false )
			) );
	
			wp_link_pages( array(
				'before'      => '<div class="pagination-centered"><span>'. __( 'Pages:', 'nevercat' ) . '</span><ul class="pagination" role="menubar" aria-label="Pagination">',
				'after'       => '</ul></div>',
				'link_before' => '',
				'link_after'  => '',
				'pagelink'         => '<li>%</li>',
			) );
		?>
	</div>
	<?php if( ! is_page() ) : ?>
		<footer class="panel">
			<?php nevercat_entry_meta(); ?>
		</footer>
	<?php endif; ?>
	<?php do_action( 'nevercat_post_end' ); ?>
</article>

<?php get_template_part( 'includes/author' ); ?>

<?php do_action( 'nevercat_post_comments_start' ); ?>
<?php comments_template(); ?>
<?php do_action( 'nevercat_post_comments_end' ); ?>

