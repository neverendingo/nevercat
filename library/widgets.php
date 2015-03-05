<?php
/**
  * Support for Widget Areas
  *
  * @package WordPress
  * @subpackage NeverCat
  * @since NeverCat 1.0
  */
 
add_action( 'widgets_init', 'nevercat_sidebarwidgets' );
function nevercat_sidebarwidgets() {


	/*
	 * The most obvious widget region is in the sidebar
	 */
	register_sidebar( array(
		'id'            => 'sidebar-widgets',
		'name'          => __('Sidebar Widgets', 'nevercat'),
		'description'   => __('Sidebar for the main content area', 'nevercat'),
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
		'after_widget'  => '</div></article>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>'
	));

	/*
	 * widget area above the top bar
	 */
	register_sidebar( array(
		'id'            => 'topbar-widgets',
		'name'          => __('Topbar Widgets', 'nevercat'),
		'description'   => __('Widgets above the topbar area', 'nevercat'),
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
		'after_widget'  => '</div></article>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>'
	));
	
	/*
	 * widget area below the content and comment area
	 */
	register_sidebar( array(
		'id'            => 'bottom-content-widgets',
		'name'          => __('Bottom Widgets', 'nevercat'),
		'description'   => __('Widgets below the content', 'nevercat'),
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
		'after_widget'  => '</div></article>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>'
	));
	
	/*
	 * widget area in the footer, before the body is closed
	 */
	register_sidebar( array(
		'id'            => 'bottom-widgets',
		'name'          => __('Page Bottom Widgets', 'nevercat'),
		'description'   => __('Widgets at the page bottom', 'nevercat'),
		'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="small-12 medium-4 large-3 columns">',
		'after_widget'  => '</div></article>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>'
	));
	
	/*
	 * The Hero Unit can have its own widgets
	 */
	register_sidebar( array(
		'id'            => 'herounit-widgets',
		'name'          => __('Hero Unit Widgets', 'nevercat'),
		'description'   => __('Sidebar for the hero unit on the frontpage', 'nevercat'),
		'before_widget' => get_header_image() ?
			'<article id="%1$s" class="small-7 columns widget %2$s">' : '<article id="%1$s" class="small-12 columns widget %2$s">',
		'class'			=> get_header_image() ? 'small-9 columns' : '',
		'after_widget'  => '</article>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>'
	));
}

/**
 * Hook our widget areas into the theme
 */
 
function nevercat_widgets_in_header() {
	if ( is_active_sidebar( 'topbar-widgets' ) ) { ?>
		<aside class="header-widgets widget-area" role="complementary">
			<?php dynamic_sidebar( 'topbar-widgets' ); ?>
		</aside>
	<?php }
}
add_action( 'nevercat_layout_start', 'nevercat_widgets_in_header' );

function nevercat_widgets_in_sidebar() {
	if ( is_active_sidebar( 'sidebar-widgets' ) ) { ?>
		<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php }
}
add_action( 'nevercat_sidebar_start', 'nevercat_widgets_in_sidebar' );


function nevercat_widgets_below_content() {
	if ( is_active_sidebar( 'bottom-content-widgets' ) ) { ?>
		<?php dynamic_sidebar( 'bottom-content-widgets' ); ?>
	<?php }
}
add_action( 'nevercat_content_end', 'nevercat_widgets_below_content' );

function nevercat_widgets_bottom() {
	if ( is_active_sidebar( 'bottom-widgets' ) ) { ?>
		<?php dynamic_sidebar( 'bottom-widgets' ); ?>
	<?php }
}
add_action( 'nevercat_page_footer', 'nevercat_widgets_bottom' );

function nevercat_widgets_in_herounit() {
	if ( is_active_sidebar( 'herounit-widgets' ) ) { ?>
		<aside class="herounit-widgets widget-area" role="complementary">
			<?php dynamic_sidebar( 'herounit-widgets' ); ?>
		</aside>
	<?php }
}
add_action( 'nevercat_herounit', 'nevercat_widgets_in_herounit' );

function search_form_no_filters() {
  // look for local searchform template
  $search_form_template = locate_template( 'searchform.php' );
  if ( '' !== $search_form_template ) {
    // searchform.php exists, remove all filters
    remove_all_filters('get_search_form');
  }
}
add_action('pre_get_search_form', 'search_form_no_filters');
