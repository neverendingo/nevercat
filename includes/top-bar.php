<?php
/**
 * Includes the top navigation
 * can either be left or right aligned
 * 
 * @package Wordpress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 */
?>

<?php do_action( 'nevercat_layout_start' ); ?>
<div class="top-bar-container contain-to-grid sticky">
	<nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
		<ul class="title-area">
			<li class="name">
				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			</li>
			<?php if( empty( $off_canvas ) ) : ?>
				<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
			<?php endif ; ?>
		</ul>
		<section class="top-bar-section">
			<?php NeverCat_top_bar_left(); ?>
			<?php NeverCat_top_bar_right(); ?>
		</section>
	</nav><!--.top-bar-->
</div><!--.top-bar-container-->
