<?php

/**
 * NeverCat Includes
 * 
 * Functions are separated in files to be able to keep overview
 * 
 * @package WordPress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 */
 
$includes = array(
	// necessary theme support and settings
	'library/init.php',
	// set up menues
	'library/menues.php',
	// handle comments
	'library/comments.php',
	// we have some scripts and styles to enqueue
	'library/queue.php',
	// of course we also support some widget areas
	'library/widgets.php',
	
	'library/meta.php',
	// customization code
	'library/customize.php'
);

/*
 * Loop over our include files and require them
 */
foreach ( $includes as $file ) {
	if ( !$filepath = locate_template( $file ) ) {
		trigger_error( sprintf( __( 'Error: %s not found', 'nevercat' ), $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
