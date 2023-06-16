<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

if ( ! function_exists( 'hodophile_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since Hodophile 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function hodophile_is_loader_enable( $control ) {
		return $control->manager->get_setting( 'hodophile_theme_options[loader_enable]' )->value();
	}
endif;

if ( ! function_exists( 'hodophile_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Hodophile 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function hodophile_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'hodophile_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'hodophile_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Hodophile 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function hodophile_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'hodophile_theme_options[pagination_enable]' )->value();
	}
endif;

if ( ! function_exists( 'hodophile_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Hodophile 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function hodophile_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

/**
 * Check if header button section is enabled.
 *
 * @since Hodophile 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function hodophile_is_primary_menu_header_button_enable( $control ) {
	return ( $control->manager->get_setting( 'hodophile_theme_options[primary_menu_header_button_enable]' )->value() );
}


/**
 * Front Page Active Callbacks
 */

/**
 * Check if hero_banner section is enabled.
 *
 * @since Hodophile 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function hodophile_is_hero_banner_section_enable( $control ) {
	return ( $control->manager->get_setting( 'hodophile_theme_options[hero_banner_section_enable]' )->value() );
}


function hodophile_is_hero_banner_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[hero_banner_content_type]' )->value();
	return hodophile_is_hero_banner_section_enable( $control ) && ( 'category' == $content_type );
}


function hodophile_is_hero_banner_section_content_trip_types_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[hero_banner_content_type]' )->value();
	return hodophile_is_hero_banner_section_enable( $control ) && ( 'trip-types' == $content_type );
}


function hodophile_is_hero_banner_section_content_destination_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[hero_banner_content_type]' )->value();
	return hodophile_is_hero_banner_section_enable( $control ) && ( 'destination' == $content_type );
}

function hodophile_is_hero_banner_section_content_product_cat_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[hero_banner_content_type]' )->value();
	return hodophile_is_hero_banner_section_enable( $control ) && ( 'product_cat' == $content_type );
}



function hodophile_is_hero_banner_section_content_activity_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[hero_banner_content_type]' )->value();
	return hodophile_is_hero_banner_section_enable( $control ) && ( 'activity' == $content_type );
}


/**
 * Check if trip_search section is enabled.
 *
 * @since Hodophile 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function hodophile_is_trip_search_section_enable( $control ) {
	return ( $control->manager->get_setting( 'hodophile_theme_options[trip_search_section_enable]' )->value() );
}



/**
 * Check if popular destination section is enabled.
 *
 * @since Hodophile 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function hodophile_is_popular_destination_section_enable( $control ) {
	return ( $control->manager->get_setting( 'hodophile_theme_options[popular_destination_section_enable]' )->value() );
}


function hodophile_is_popular_destination_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[popular_destination_content_type]' )->value();
	return hodophile_is_popular_destination_section_enable( $control ) && ( 'page' == $content_type );
}


function hodophile_is_popular_destination_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[popular_destination_content_type]' )->value();
	return hodophile_is_popular_destination_section_enable( $control ) && ( 'post' == $content_type );
}


function hodophile_is_popular_destination_section_content_trip_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[popular_destination_content_type]' )->value();
	return hodophile_is_popular_destination_section_enable( $control ) && ( 'trip' == $content_type );
}

function hodophile_is_popular_destination_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[popular_destination_content_type]' )->value();
	return hodophile_is_popular_destination_section_enable( $control ) && ( 'category' == $content_type );
}


function hodophile_is_popular_destination_section_content_trip_types_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[popular_destination_content_type]' )->value();
	return hodophile_is_popular_destination_section_enable( $control ) && ( 'trip-types' == $content_type );
}


function hodophile_is_popular_destination_section_content_destination_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[popular_destination_content_type]' )->value();
	return hodophile_is_popular_destination_section_enable( $control ) && ( 'destination' == $content_type );
}


function hodophile_is_popular_destination_section_content_activity_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[popular_destination_content_type]' )->value();
	return hodophile_is_popular_destination_section_enable( $control ) && ( 'activity' == $content_type );
}


/**
 * Check if about section is enabled.
 *
 * @since Hodophile 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function hodophile_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'hodophile_theme_options[about_section_enable]' )->value() );
}


function hodophile_is_about_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[about_content_type]' )->value();
	return hodophile_is_about_section_enable( $control ) && ( 'post' == $content_type );
}


function hodophile_is_about_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[about_content_type]' )->value();
	return hodophile_is_about_section_enable( $control ) && ( 'page' == $content_type );
}


function hodophile_is_about_section_content_custom_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[about_content_type]' )->value();
	return hodophile_is_about_section_enable( $control ) && ( 'custom' == $content_type );
}



/**
 * Check if featured section is enabled.
 *
 * @since Hodophile 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function hodophile_is_featured_section_enable( $control ) {
	return ( $control->manager->get_setting( 'hodophile_theme_options[featured_section_enable]' )->value() );
}


function hodophile_is_featured_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[featured_content_type]' )->value();
	return hodophile_is_featured_section_enable( $control ) && ( 'post' == $content_type );
}


function hodophile_is_featured_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[featured_content_type]' )->value();
	return hodophile_is_featured_section_enable( $control ) && ( 'page' == $content_type );
}


function hodophile_is_featured_section_content_custom_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[featured_content_type]' )->value();
	return hodophile_is_featured_section_enable( $control ) && ( 'custom' == $content_type );
}

/**
 * Check if blog section is enabled.
 *
 * @since Hodophile 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function hodophile_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'hodophile_theme_options[blog_section_enable]' )->value() );
}


function hodophile_is_blog_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[blog_content_type]' )->value();
	return hodophile_is_blog_section_enable( $control ) && ( 'post' == $content_type );
}


function hodophile_is_blog_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[blog_content_type]' )->value();
	return hodophile_is_blog_section_enable( $control ) && ( 'page' == $content_type );
}


function hodophile_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[blog_content_type]' )->value();
	return hodophile_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}


function hodophile_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'hodophile_theme_options[blog_content_type]' )->value();
	return hodophile_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}



/**
 * Check if gallery section is enabled.
 *
 * @since Hodophile 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function hodophile_is_gallery_section_enable( $control ) {
	return ( $control->manager->get_setting( 'hodophile_theme_options[gallery_section_enable]' )->value() );
}

/**
 * Check if cta section is enabled.
 *
 * @since Hodophile 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function hodophile_is_cta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'hodophile_theme_options[cta_section_enable]' )->value() );
}

