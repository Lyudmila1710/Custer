<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

if ( ! function_exists( 'hodophile_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function hodophile_posted_on( $id = '' ) {
		if ( false === hodophile_archive_meta_option( 'hide_date' ) ) {
			return;
		}

		$id = ! empty( $id ) ? $id : get_the_id();

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U', $id ) !== get_the_modified_time( 'U', $id ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			get_the_date( DATE_W3C, $id ),
			get_the_date( '', $id ),
			get_the_modified_date( DATE_W3C, $id ),
			get_the_modified_date( '', $id )
		);

		$year = get_the_date( 'Y' );
		$month = get_the_date( 'm' );

		// Wrap the time string in a link, and preface it with 'Posted on'.
		printf(
			/* translators: %s: post date */
			__( '<span class="posted-on"><span class="screen-reader-text">Posted on</span> %s', 'hodophile' ),
			__('Posted On: ', 'hodophile') . $time_string . '</span>'
		);
	}
endif;

if ( ! function_exists( 'hodophile_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function hodophile_entry_footer() {
		$options = hodophile_get_theme_options();

		if ( ! $options['single_post_hide_category'] ) :
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ' ', 'hodophile' ) );
			if ( $categories_list && hodophile_categorized_blog() ) {
				printf( '<span class="post-categories"><span class="cat-links">' . esc_html__( 'Categories: ', 'hodophile' ) . '%1$s' . '</span></span>', $categories_list ); // WPCS: XSS OK.
			}
		endif;

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			if ( ! $options['single_post_hide_tags'] ) :
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list();
				if ( $tags_list ) {
					printf( '<span class="tags-links">%1$s</span>', $tags_list ); // WPCS: XSS OK.
				}
			endif;
		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'hodophile' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * articles meta
 *  @param [id] $id post id
 *  @param [html] $authro author template
 */
function hodophile_author_meta( $id = '' ) { 
	$id = ! empty( $id ) ? $id : get_the_id();
	$options = hodophile_get_theme_options();

	if ( ! hodophile_archive_meta_option( 'hide_author' ) ) {
		return;
	}

	if ( 'post' !== get_post_type( $id ) ) { 
		return;
	}
	$output = '';
	
	$author = sprintf(
		/* translators: %s: post author */
		__( 'Posted By: %s', 'hodophile' ),
		'<span class="author vcard">' . get_the_author() . '</span>'
	);
    $output .= '<span class="byline">' . $author . '</span><!-- .byline -->'; 

    return $output;
}


/**
 * articles meta
 *  @param [id] $id post id
 *  @param [html] $authro author template
 */
function hodophile_article_header_meta( $id = '' ) { 
	$id = ! empty( $id ) ? $id : get_the_id();

	if ( 'post' !== get_post_type( $id ) ) { 
		return;
	}
	$output = '';
	
	if ( true === hodophile_archive_meta_option( 'hide_category' ) ) {
	    $categories_list = get_the_category_list( '', '', $id );
		if ( $categories_list && hodophile_categorized_blog() ) {
			$output .= '<span class="cat-links">' . $categories_list . '</span>'; // WPCS: XSS OK.
		}
	}

    return $output;
}


/**
 * Checks to see if meta option is hide enabled in archive/blog
 */
function hodophile_archive_meta_option( $option = '' ) {
	$options = hodophile_get_theme_options();
	if ( is_archive() || is_search() || is_home() ) :
		if ( true === $options[$option] )
			return false;
		else
			return true;
	else :
		return true;
	endif;
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function hodophile_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'hodophile_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'hodophile_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so hodophile_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so hodophile_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in hodophile_categorized_blog.
 */
function hodophile_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'hodophile_categories' );
}
add_action( 'edit_category', 'hodophile_category_transient_flusher' );
add_action( 'save_post',     'hodophile_category_transient_flusher' );
