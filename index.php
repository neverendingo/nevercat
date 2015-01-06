<?php
/**
 * Main theme file
 * 
 * @package Wordpress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 */
?>

<?php get_header(); ?>
<?php $sidebar = get_theme_mod( 'sidebar_position' ); ?>
<div class="row">
	<?php if( $sidebar ) : ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>
	<main id="main" class="site-main small-12 large-8 columns" role="main">
		<div class="content-wrap" id="content">
			<?php if ( have_posts() ) : ?>
				<?php do_action( 'nevercat_content_start' ); ?>

				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>
				<?php
				// Enter the famous loop.
				while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				endwhile; ?>
				
				<div class="navigation">
					<div class="pagination-centered">
						<?php nevercat_paginate(); ?>
					</div>
				</div>
				
			<?php else :
				get_template_part( 'content', 'none' );
			endif; ?>
			<?php do_action( 'nevercat_content_end' ); ?>
		</div><!-- .content-wrap -->
	</main><!-- .site-main -->
	<?php if( ! $sidebar ) : ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>
</div><!-- .row -->

<?php get_footer(); ?>
