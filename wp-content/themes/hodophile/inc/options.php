<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function hodophile_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'hodophile' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function hodophile_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'hodophile' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of trips for post choices.
 * @return Array Array of post ids and name.
 */
function hodophile_trip_choices() {
    $posts = get_posts( array( 'post_type' => 'itineraries', 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'hodophile' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}


function hodophile_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'hodophile' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}


if ( ! function_exists( 'hodophile_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function hodophile_selected_sidebar() {
        $hodophile_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'hodophile' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'hodophile' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'hodophile' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'hodophile' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'hodophile' ),
        );

        $output = apply_filters( 'hodophile_selected_sidebar', $hodophile_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'hodophile_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function hodophile_site_layout() {
        $hodophile_site_layout = array(
            'wide-layout'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
            'frame-layout' => get_template_directory_uri() . '/assets/images/framed.png',
        );

        $output = apply_filters( 'hodophile_site_layout', $hodophile_site_layout );
        return $output;
    }
endif;


if ( ! function_exists( 'hodophile_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function hodophile_global_sidebar_position() {
        $hodophile_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'hodophile_global_sidebar_position', $hodophile_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'hodophile_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function hodophile_sidebar_position() {
        $hodophile_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'hodophile_sidebar_position', $hodophile_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'hodophile_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function hodophile_pagination_options() {
        $hodophile_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'hodophile' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'hodophile' ),
        );

        $output = apply_filters( 'hodophile_pagination_options', $hodophile_pagination_options );

        return $output;
    }
endif;


if ( ! function_exists( 'hodophile_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function hodophile_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'hodophile' ),
            'off'       => esc_html__( 'Disable', 'hodophile' )
        );
        return apply_filters( 'hodophile_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'hodophile_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function hodophile_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'hodophile' ),
            'off'       => esc_html__( 'No', 'hodophile' )
        );
        return apply_filters( 'hodophile_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'hodophile_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function hodophile_sortable_sections() {
        $sections = array(
            'hero_banner'                       => esc_html__( 'Hero Banner', 'hodophile' ),
            'trip_search'                       => esc_html__( 'Trip Search', 'hodophile' ),
            'popular_destination'               => esc_html__( 'Popular Destination', 'hodophile' ),
            'about'                             => esc_html__( 'About', 'hodophile' ),
            'featured'                          => esc_html__( 'Featured', 'hodophile' ),
            'blog'                              => esc_html__( 'Blog', 'hodophile' ),
            'gallery'                           => esc_html__( 'Gallery', 'hodophile' ),
            'cta'                               => esc_html__( 'CTA', 'hodophile' ),
        );
        return apply_filters( 'hodophile_sortable_sections', $sections );
    }
endif;

if ( ! function_exists( 'hodophile_featured_content_type' ) ) :
    /**
     * featured Options
     * @return array site featured options
     */
    function hodophile_featured_content_type() {
        $hodophile_featured_content_type = array(
            'category'  => esc_html__( 'Category', 'hodophile' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $hodophile_featured_content_type = array_merge( $hodophile_featured_content_type, array(
                'trip-types'    => esc_html__( 'Trip Types', 'hodophile' ),
                'destination'   => esc_html__( 'Destination', 'hodophile' ),
                'activity'      => esc_html__( 'Activity', 'hodophile' ),
                ) );
        }

         if ( class_exists( 'WooCommerce' ) ) {

            $hodophile_featured_content_type = array_merge( $hodophile_featured_content_type, array(
                'product_cat'       => esc_html__( 'Product Category', 'hodophile' ),
                ) );
    
        }

        $output = apply_filters( 'hodophile_featured_content_type', $hodophile_featured_content_type );


        return $output;
    }
endif;



if ( ! function_exists( 'hodophile_hero_banner_content_type' ) ) :
    /**
     * hero_banner Options
     * @return array site hero_banner options
     */
    function hodophile_hero_banner_content_type() {
        $hodophile_hero_banner_content_type = array(
            'category'  => esc_html__( 'Category', 'hodophile' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $hodophile_hero_banner_content_type = array_merge( $hodophile_hero_banner_content_type, array(
                'trip-types'    => esc_html__( 'Trip Types', 'hodophile' ),
                ) );
        }

        $output = apply_filters( 'hodophile_hero_banner_content_type', $hodophile_hero_banner_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'hodophile_popular_destination_content_type' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function hodophile_popular_destination_content_type() {
        $hodophile_popular_destination_content_type = array(
            'category'  => esc_html__( 'Category', 'hodophile' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $hodophile_popular_destination_content_type = array_merge( $hodophile_popular_destination_content_type, array(
                'trip-types'    => esc_html__( 'Trip Types', 'hodophile' ),
                ) );
        }

        $output = apply_filters( 'hodophile_popular_destination_content_type', $hodophile_popular_destination_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'hodophile_heading_tags' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function hodophile_heading_tags() {
        
        $hodophile_heading_tags = array(
			'h1'	=> esc_html__('H1', 'hodophile'),
			'h2'	=> esc_html__('H2', 'hodophile'),
			'h3'	=> esc_html__('H3', 'hodophile'),
			'h4'	=> esc_html__('H4', 'hodophile'),
			'h5'	=> esc_html__('H5', 'hodophile'),
			'h6'	=> esc_html__('H6', 'hodophile'),
			'p'		=> esc_html__('Paragraph', 'hodophile'),
		);

        $output = apply_filters( 'hodophile_heading_tags', $hodophile_heading_tags );


        return $output;
    }
endif;
