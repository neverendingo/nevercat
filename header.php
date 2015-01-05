<?php
/**
 * The template for displaying the header
 *
 * Shows head section and the top menu containers, either in off-canvas version or plain.
 *
 * @package WordPress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

	<script>(function(){ document.documentElement.className='js' })();</script>
</head>
<body <?php body_class(); ?>>
	<?php do_action( 'nevercat_body_start' ); ?>
	
	<?php $off_canvas = get_theme_mod( 'off_canvas' ); ?>

	<?php if( ! empty( $off_canvas ) ) : ?>
		<?php get_template_part( 'includes/off-canvas-menu' ); ?>
	<?php else : ?>
		<?php get_template_part( 'includes/top-bar' ); ?>
	<?php endif; ?>
