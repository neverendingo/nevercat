<?php
/**
 * The sidebar containing widgets
 * 
 * the widgets are added via a custom hook
 * 
 * @package Wordpress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 */
?>

<aside class="small-12 large-4 columns">
	<div id="sidebar">
		<?php do_action( 'nevercat_sidebar_start' ); ?>
		<?php do_action( 'nevercat_sidebar_end' ); ?>
	</div>
</aside>
