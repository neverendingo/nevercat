<?php
/**
 * The off canvas menu for mobile devices/small screens
 * 
 * @package Wordpress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 */
?>
<div class="off-canvas-wrap" data-offcanvas>
		<div class="inner-wrap">
			<?php do_action( 'nevercat_layout_start' ); ?>
			<nav class="tab-bar show-for-small-only">
				
				<section class="middle tab-bar-section">
					
					<h1 class="title"><?php bloginfo( 'name' ); ?></h1>
		
				</section>
				<section class="right-small">
					<a class="right-off-canvas-toggle menu-icon" href="#"><span></span></a>
				</section>
			</nav>
			<a class="exit-off-canvas"></a>
			<nav class="right-off-canvas-menu" aria-hidden="true">
				<?php NeverCat_mobile_off_canvas(); ?>
			</nav>
			<div class="top-bar-container contain-to-grid show-for-medium-up">
				<nav class="top-bar" data-topbar role="navigation">
					<ul class="title-area">
						<li class="name">
							<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
						</li>
					</ul>
					<section class="top-bar-section">
						<?php NeverCat_top_bar_left(); ?>
						<?php NeverCat_top_bar_right(); ?>
					</section>
				</nav><!--.top-bar-->
			</div><!--.top-bar-container-->
