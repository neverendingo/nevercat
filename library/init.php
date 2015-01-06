<?php
/*
 * Main Theme Setup
 * 
 * @package WordPress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 */

if (!isset($content_width)) { $content_width = 728; }

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

/**
 * custom searchform
 */
if( ! function_exists( 'nevercat_searchform' ) ) {
	function nevercat_searchform( $form ) {
		$form = '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '">
					<div class="row">
						<div class="large-12 columns">
							<div class="row collapse">
								<div class="small-10 columns">
									<label>
										<span class="screen-reader-text">' . _x( 'Search for:', 'label', 'nevercat' ) . '</span>
										<input type="search" class="search-field" placeholder="' . esc_attr_x( 'Search ...', 'placeholder', 'nevercat' ) .
										'" value="'. get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label' ) . '" />
									</label>
								</div>
								<div class="small-2 columns">
									<input type="submit" class="search-submit button postfix" value="' . esc_attr_x( 'Search', 'submit button', 'nevercat' ) . '" />
								</div>
							</div>
						</div>
					</form>';
			
		return $form;
	}
	add_filter( 'get_search_form', 'nevercat_searchform' );
}
/**
 * make posts page navigation
 */
function nevercat_paginate() {
	global $wp_query;

	$big = 999999999; // need an unlikely integer
	
	$paginated = paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'type' => 'list'
	) );
	
	$paginated = str_replace( "<ul class='page-numbers'>", "<ul class='pagination'>", $paginated );
	$paginated = str_replace( '<li><a class="prev ', '<li class="arrow"><a class="', $paginated);
	$paginated = str_replace( '<li><a class="next ', '<li class="arrow"><a class="', $paginated);
	$paginated = str_replace( "<li><span class='page-numbers current'>", '<li class="current"><a href="#">', $paginated);
	$paginated = str_replace( '</span>', '</a>', $paginated);
	$paginated = str_replace( '<li><span class="page-numbers dots">', "<li><a href='#'>", $paginated );
	if ( $paginated ) { ?>
		<div class="navigation">
			<div class="pagination-centered">
				<?php echo $paginated; ?>
			</div>
		</div>
		<?php
	}
}

