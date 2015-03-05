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
<?php if ( is_front_page() ) : ?>
<div class="hero-unit">
	<div class="row">
		<?php if ( get_header_image() ) : ?>
			<div class="small-5 columns">
				<img class="custom-header" src="<?php header_image(); ?>" alt="" />
			</div>
		<?php endif; ?>
		<?php do_action( 'nevercat_herounit' ); ?>
		
	</div>
</div>
<?php endif; ?>
<div class="row">
	<?php if( $sidebar ) : ?>
		<?php if ( ! is_front_page() ) : ?>
			<?php if ( get_header_image() ) : ?>
				<img class="custom-header" src="<?php header_image(); ?>" alt="" />
			<?php endif; ?>
		<?php endif; ?>
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
				
				<?php nevercat_paginate(); ?>
				
			<?php else :
				get_template_part( 'content', 'none' );
			endif; ?>
			<?php do_action( 'nevercat_content_end' ); ?>
		</div><!-- .content-wrap -->
	</main><!-- .site-main -->
	<?php if( ! $sidebar ) : ?>
		<?php if ( ! is_front_page() ) : ?>
			<?php if ( get_header_image() ) : ?>
				<div class="custom-header small-3 large-4 columns">
					<img src="<?php header_image(); ?>" alt="" />
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>
</div><!-- .row -->

<?php get_footer(); ?>
