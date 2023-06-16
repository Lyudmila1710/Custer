<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Real Estate Pack
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function real_estate_pack_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'real_estate_pack_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function real_estate_pack_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'real_estate_pack_pingback_header');



if (!function_exists('real_estate_pack_general_style')) :
	function real_estate_pack_general_style()
	{
		$style = '';

		$real_estate_pack_dfimgh = get_template_directory_uri() . '/assets/img/real-banner.jpg';
		$real_estate_pack_intro_img = get_theme_mod('real_estate_pack_intro_img', $real_estate_pack_dfimgh);

		if ($real_estate_pack_intro_img) {
			$style .= 'section.home-intro{background-image:url(' . $real_estate_pack_intro_img . ')}';
		}
		wp_add_inline_style('real-estate-pack-main-style', $style);
	}
endif;
add_action('wp_enqueue_scripts', 'real_estate_pack_general_style');
