<?php
/**
 * The template for displaying the footer
 *
 * depending on the customizer setting it closes the off canvas wrapper or not.
 *
 * @package WordPress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 */
?>
			<?php do_action('nevercat_layout_end'); ?>
	<?php $off_canvas = get_theme_mod( 'off_canvas' ); ?>
	<?php if( ! empty( $off_canvas ) ) : ?>
		</div> <!-- end inner-wrap -->
	</div> <!-- end off-canvas -->
	<?php endif; ?>
	<footer id="footer">
		<div class="row">
			<?php do_action( 'nevercat_page_footer' ); ?>
		</div>
	</footer>
<?php do_action( 'nevercat_body_end' ); ?>
<?php wp_footer(); ?>
</body>
</html>
