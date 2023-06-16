<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 * @return array An array of default values
 */

function hodophile_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$hodophile_default_options = array(
		// Color Options
		'header_title_color'			=> '#fff',
		'header_tagline_color'			=> '#fff',
		'header_txt_logo_extra'			=> 'show-all',
		

		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide-layout',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		'primary_menu_header_button_enable'				=> false,
		'menu_first_btn_label'			=> esc_html__( 'Log in', 'hodophile' ),
		'menu_second_btn_label'			=> esc_html__( 'Sign Up', 'hodophile' ),


		// excerpt options
		'long_excerpt_length'           => 25,
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'hodophile' ), '[the-year]', '[site-link]' ),
		'powered_by_text'           	=> esc_html__( ' | All Rights Reserved | ', 'hodophile' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'hodophile' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>',
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		'all_sortable'					=> 'hero_banner,trip_search,popular_destination,about,featured,blog,gallery,cta',    

		// homepage sections sortable
		'default_sortable' 				=> 'hero_banner,trip_search,popular_destination,about,featured,blog,gallery,cta',


		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'hodophile' ),
		'hide_btn' 						=> false,
		'hide_category'					=> false,
		'hide_content'					=> false,
		'hide_date'						=> false,
		'hide_image'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// hero_banner
		'hero_banner_sub_title'			=> esc_html__( 'Explore the world', 'hodophile' ),
		'hero_banner_title'				=> esc_html__( 'It’s a Big World Out There, Go Explore it Now!!', 'hodophile' ),
		'hero_banner_content'				=> esc_html__( 'Quitting your job to travel the world is the easy part. Once you pack your bags and set the wheels in motion, thats when things become tricky', 'hodophile' ),
		'hero_banner_btn_label'				=> esc_html__( 'Discover Now', 'hodophile' ),
		'hero_banner_section_enable'	=> true,
		'hero_banner_content_type'		=> 'category',
		'hero_banner_btn_url'			=> '#',
		'hero_banner_top_space_enable'	=> true,
		'hero_banner_bottom_space_enable'	=> false,


		// trip search
		'trip_search_section_enable'	=> true,
		'trip_search_top_space_enable'	=> true,
		'trip_search_bottom_space_enable'	=> false,
		'trip_search_title'				=> esc_html__( 'Search Your Destinations', 'hodophile' ),
		'trip_search_sub_title'				=> esc_html__( 'GET READY FOR THE NEW ADVENTURE.', 'hodophile' ),


		// popular destination
		'popular_destination_section_enable'	=> true,
		'popular_destination_content_type'		=> 'category',
		'popular_destination_count'				=> 3,
		'popular_destination_title'				=> esc_html__( 'Popular Trips', 'hodophile' ),
		'popular_destination_sub_title'			=> esc_html__( 'More than 25+ tour types for you', 'hodophile' ),
		'popular_destination_btn_label'			=> esc_html__( 'Book Now', 'hodophile' ),
		'popular_destination_alt_btn_label'			=> esc_html__( 'View More Trips', 'hodophile' ),
		'popular_destination_top_space_enable'	=> false,
		'popular_destination_bottom_space_enable'	=> true,


		// about
		'about_section_enable'			=> true,
		'about_content_type'			=> 'page',
		'about_title'					=> esc_html__( 'With Our Experience We Will Serve You', 'hodophile' ),
		'about_sub_title'				=> esc_html__( 'Our Experience', 'hodophile' ),
		'about_description'				=> esc_html__( 'Quitting your job to travel the world is the easy part. Once you pack your bags and set the wheel in the motion, thats when things become tricky. Quickly, the realisations hit you like a tsunami.', 'hodophile' ),
		'about_btn_title'				=> esc_html__( 'Explore More', 'hodophile' ),
		'about_top_space_enable'	=> true,
		'about_bottom_space_enable'	=> false,

		// featured
		'featured_section_enable'			=> true,
		'featured_content_type'			=> 'page',
		'featured_sub_title'				=> esc_html__( 'Download Now', 'hodophile' ),
		'featured_title'					=> esc_html__( 'Go places you&#39;ve dreamed of', 'hodophile' ),
		'featured_description'				=> esc_html__( 'Quitting your job to travel the world is the easy part. Once you pack your bags and set the wheel in the motion, thats when things become tricky. Quickly, the realisations hit you like a tsunami.', 'hodophile' ),
		'featured_top_space_enable'	=> false,
		'featured_bottom_space_enable'	=> true,

		// blog
		'blog_section_enable'			=> true,
		'blog_content_type'				=> 'recent',
		'blog_count'					=> 3,
		'blog_title'					=> esc_html__( 'Our recent articles', 'hodophile' ),
		'blog_sub_title'				=> esc_html__( 'Know what’s happening', 'hodophile' ),
		'blog_btn_title'				=> esc_html__( 'Read More', 'hodophile' ),
		'blog_alt_btn_title'			=> esc_html__( 'Show All Aricle', 'hodophile' ),
		'blog_top_space_enable'	=> true,
		'blog_bottom_space_enable'	=> false,


		// gallery
		'gallery_section_enable'	=> true,
		'gallery_count'				=> 4,
		'gallery_title'				=> esc_html__( 'Travel to make memories all around the world', 'hodophile' ),
		'gallery_short_description'	=> esc_html__( 'When on the road, this isn’t always possible, with time, space and convenience restrictions often conspiring against your ideal lifestyle & so on other things. Planes are fastest methods of getting around the world but it is a bit expensive.When on the road, this isn’t always possible, with time, space and convenience restrictions often conspiring against your ideal lifestyle & so on other things.', 'hodophile' ),
		'gallery_btn_title'			=> esc_html__( 'View All Gallery', 'hodophile' ),
		'gallery_top_space_enable'	=> true,
		'gallery_bottom_space_enable'	=> false,


		// cta
		'cta_section_enable'			=> true,
		'cta_title'					=> esc_html__( 'Prepare Yourself & Let’s Explore The Beauty Of The World', 'hodophile' ),
		'cta_description'				=> esc_html__( 'We have many special offers/desrinations especially for you.', 'hodophile' ),
		'cta_btn_title'				=> esc_html__( 'Get Started', 'hodophile' ),


	);

	$output = apply_filters( 'hodophile_default_theme_options', $hodophile_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}