<?php
/*
 * Main Theme Setup
 * 
 * @package WordPress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 */

add_action( 'after_setup_theme', 'nevercat_setup' );
function nevercat_setup() {

	//Add translation support directory
	load_theme_textdomain( 'nevercat', get_template_directory() . '/lang' );

	// Automatic feed output in the head
	add_theme_support( 'automatic-feed-links' );

	// Let Wordpress handle page title
	add_theme_support( 'title-tag' );

	// Add menu support
	add_theme_support( 'menus' );

	// Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
	add_theme_support( 'post-thumbnails' );
	// set_post_thumbnail_size(150, 150, false);

	// Add post formarts support: http://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

	// Switch to html5 output for search and comment form and comments
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// In case infinite scrolling is preferred
	add_theme_support( 'infinite-scroll', array( 'container' => 'content', ) );
}
