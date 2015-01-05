<?php

if( ! function_exists('NeverCat_Scripts') ) {
	function NeverCat_Scripts() {
		wp_register_script( 'jquery', get_template_directory_uri() . '/js/vendor/jquery.js', array(), '1.0.0', true );
		wp_register_script( 'nevercat', get_template_directory_uri() . '/js/nevercat.js', array('jquery'), '1.0.0', true );

		wp_enqueue_style('nevercat-fonts','//fonts.googleapis.com/css?family=Bitter:400,400italic|Open+Sans:400,300,600', array(), '' );
		wp_enqueue_style( 'main', get_template_directory_uri() . '/css/nevercat.css', array(), '' );


		wp_enqueue_script('jquery');
		wp_enqueue_script('nevercat');
	}
	add_action( 'wp_enqueue_scripts', 'NeverCat_Scripts' );
}
