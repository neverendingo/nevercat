<?php
/**
 * Handle the various meta informations of a page/post
 *
 *
 * @package WordPress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 */

if ( ! function_exists( 'nevercat_entry_meta ' )) {
	function nevercat_entry_meta() {
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '<div class="sticky-post right"><i class="fi-crown"></i>%s</div>', __( 'Featured', 'nevercat' ) );
		}

		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <small>(<time class="updated" datetime="%3$s">%4$s %5$s</time>)</small>';
			}
	
			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				get_the_date(),
				esc_attr( get_the_modified_date( 'c' ) ),
				__( 'Updated on', 'nevercat' ),
				get_the_modified_date()
			);
	
			printf( '<div class="posted-on"><span class="hide">%1$s </span><i class="fi-calendar"></i><a href="%2$s" rel="bookmark">%3$s</a></div>',
				_x( 'Posted on', 'Used before publish date.', 'nevercat' ),
				esc_url( get_permalink() ),
				$time_string
			);
		}
	
		if ( 'post' == get_post_type() ) {
			$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'nevercat' ) );
			if ( $categories_list && nevercat_categorized_blog() ) {
				printf( '<div class="cat-links"><span class="hide">%1$s </span><i class="fi-folder"></i>%2$s</div>',
					_x( 'Categories', 'Used before category names.', 'nevercat' ),
					$categories_list
				);
			}
	
			$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'nevercat' ) );
			if ( $tags_list ) {
				printf( '<div class="tags-links"><span class="hide">%1$s </span><i class="fi-pricetag-multiple"></i>%2$s</div>',
					_x( 'Tags', 'Used before tag names.', 'nevercat' ),
					$tags_list
				);
			}
		}
	
		if ( is_attachment() && wp_attachment_is_image() ) {
			// Retrieve attachment metadata.
			$metadata = wp_get_attachment_metadata();
	
			printf( '<span class="full-size-link"><span class="hide">%1$s </span><i class="fi-arrows-expand"></i><a href="%2$s" title="%1$s">%3$s &times; %4$s</a></span>',
				_x( 'Full size', 'Used before full size attachment link.', 'nevercat' ),
				esc_url( wp_get_attachment_url() ),
				$metadata['width'],
				$metadata['height']
			);
		}
	
		if ( ! is_single() && ! is_page() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<div class="comments-link">';
			echo ( get_comments_number() > 1 ? '<i class="fi-comments"></i>' : '<i class="fi-comment"></i>' );
			comments_popup_link( __( 'Leave a comment', 'nevercat' ), __( '1 Comment', 'nevercat' ), __( '% Comments', 'nevercat' ) );
			echo '</div>';
		}
	}
}

function nevercat_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'nevercat_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'nevercat_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so twentyfifteen_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so twentyfifteen_categorized_blog should return false.
		return false;
	}
}
