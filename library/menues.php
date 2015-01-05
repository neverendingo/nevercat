<?php
/**
 * Register our custom menues
 * 
 * @package Wordpress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 * 
 */

require_once 'menu-walker.php';
 
register_nav_menus(array(
	'top-bar-right' => 'Right Top Bar',
	'top-bar-left'  => 'Left Top Bar',
	'off-canvas'    => 'Off Canvas'
));

if ( ! function_exists( 'nevercat_top_bar_right' ) ) {
	function nevercat_top_bar_right() {
		wp_nav_menu(array(
			'container' => false,
			'container_class' => '',
			'menu' => '',
			'menu_class' => 'top-bar-menu right',
			'theme_location' => 'top-bar-right',
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 5,
			'fallback_cb' => false,
			'walker' => new top_bar_walker()
		));
	}
}

if ( ! function_exists( 'nevercat_top_bar_left' ) ) {
	function nevercat_top_bar_left() {
		wp_nav_menu(array( 
			'container' => false,
			'container_class' => '',
			'menu' => '',
			'menu_class' => 'top-bar-menu left',
			'theme_location' => 'top-bar-left',
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 5,
			'fallback_cb' => false,
			'walker' => new top_bar_walker()
		));
	}
}

if ( ! function_exists( 'NeverCat_mobile_off_canvas' ) ) {
	function nevercat_mobile_off_canvas() {
		wp_nav_menu(array( 
			'container' => false,
			'container_class' => '',
			'menu' => '',
			'menu_class' => 'off-canvas-list',
			'theme_location' => 'off-canvas',
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 5,
			'fallback_cb' => false,
			'walker' => new top_bar_walker()
		));
	}
}
