<?php get_header(); ?>
<?php $sidebar = get_theme_mod( 'sidebar_position' ); ?>
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

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1 class="entry-title"><?php _e('File Not Found', 'nevercat'); ?></h1>
				</header>
				<div class="entry-content">
					<div class="error">
						<p class="bottom"><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'nevercat'); ?></p>
					</div>
					<p><?php _e('Please try the following:', 'nevercat'); ?></p>
					<ul>
						<li><?php _e('Check your spelling', 'nevercat'); ?></li>
						<li><?php printf(__('Return to the <a href="%s">home page</a>', 'nevercat'), home_url()); ?></li>
						<li><?php _e('Click the <a href="javascript:history.back()">Back</a> button', 'nevercat'); ?></li>
					</ul>
				</div>
			</article>

		</div>
	</main>
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
</div>
<?php get_footer(); ?>
