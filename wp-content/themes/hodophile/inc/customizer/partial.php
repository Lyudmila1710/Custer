<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Hodophile
* @since Hodophile 1.0.0
*/

// Header btns label

if ( ! function_exists( 'hodophile_menu_first_btn_label_partial' ) ) :
    // slider sub label
    function hodophile_menu_first_btn_label_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['menu_first_btn_label'] );
    }
endif;

if ( ! function_exists( 'hodophile_menu_second_btn_label_partial' ) ) :
    // slider sub label
    function hodophile_menu_second_btn_label_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['menu_second_btn_label'] );
    }
endif;

// Hero Banner

if ( ! function_exists( 'hodophile_hero_banner_sub_title_partial' ) ) :
    function hodophile_hero_banner_sub_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['hero_banner_sub_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_hero_banner_title_partial' ) ) :
    function hodophile_hero_banner_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['hero_banner_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_hero_banner_content_partial' ) ) :
    function hodophile_hero_banner_content_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['hero_banner_content'] );
    }
endif;

if ( ! function_exists( 'hodophile_hero_banner_btn_label_partial' ) ) :
    function hodophile_hero_banner_btn_label_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['hero_banner_btn_label'] );
    }
endif;

// Trip Search

if ( ! function_exists( 'hodophile_trip_search_sub_title_partial' ) ) :
    function hodophile_trip_search_sub_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['trip_search_sub_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_trip_search_title_partial' ) ) :
    function hodophile_trip_search_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['trip_search_title'] );
    }
endif;

// popular Destination 

if ( ! function_exists( 'hodophile_popular_destination_sub_title_partial' ) ) :
    function hodophile_popular_destination_sub_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['popular_destination_sub_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_popular_destination_title_partial' ) ) :
    function hodophile_popular_destination_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['popular_destination_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_popular_destination_btn_label_partial' ) ) :
    function hodophile_popular_destination_btn_label_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['popular_destination_btn_label'] );
    }
endif;

if ( ! function_exists( 'hodophile_popular_destination_alt_btn_label_partial' ) ) :
    function hodophile_popular_destination_alt_btn_label_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['popular_destination_alt_btn_label'] );
    }
endif;

// About Us

if ( ! function_exists( 'hodophile_about_sub_title_partial' ) ) :
    function hodophile_about_sub_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['about_sub_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_about_title_partial' ) ) :
    function hodophile_about_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['about_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_about_description_partial' ) ) :
    function hodophile_about_description_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['about_description'] );
    }
endif;

if ( ! function_exists( 'hodophile_about_btn_title_partial' ) ) :
    function hodophile_about_btn_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['about_btn_title'] );
    }
endif;


// Featured

if ( ! function_exists( 'hodophile_featured_sub_title_partial' ) ) :
    function hodophile_featured_sub_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['featured_sub_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_featured_title_partial' ) ) :
    function hodophile_featured_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['featured_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_featured_description_partial' ) ) :
    function hodophile_featured_description_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['featured_description'] );
    }
endif;


// Blog

if ( ! function_exists( 'hodophile_blog_sub_title_partial' ) ) :
    function hodophile_blog_sub_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['blog_sub_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_blog_title_partial' ) ) :
    function hodophile_blog_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_blog_btn_title_partial' ) ) :
    function hodophile_blog_btn_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['blog_btn_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_blog_alt_btn_title_partial' ) ) :
    function hodophile_blog_alt_btn_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['blog_alt_btn_title'] );
    }
endif;



// Gallery 

if ( ! function_exists( 'hodophile_gallery_title_partial' ) ) :
    function hodophile_gallery_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['gallery_title'] );
    }
endif;


if ( ! function_exists( 'hodophile_gallery_btn_title_partial' ) ) :
    function hodophile_gallery_btn_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['gallery_btn_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_gallery_short_description_partial' ) ) :
    function hodophile_gallery_short_description_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['gallery_short_description'] );
    }
endif;


//cta 

if ( ! function_exists( 'hodophile_cta_title_partial' ) ) :
    // cta title
    function hodophile_cta_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['cta_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_cta_description_partial' ) ) :
    // cta sub title
    function hodophile_cta_description_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['cta_description'] );
    }
endif;


if ( ! function_exists( 'hodophile_cta_btn_title_partial' ) ) :
    // cta sub title
    function hodophile_cta_btn_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['cta_btn_title'] );
    }
endif;



// popular destination
if ( ! function_exists( 'hodophile_popular_destination_title_partial' ) ) :
    // popular destination title
    function hodophile_popular_destination_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['popular_destination_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_popular_destination_sub_title_partial' ) ) :
    // popular destination sub title
    function hodophile_popular_destination_sub_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['popular_destination_sub_title'] );
    }
endif;

//blog 


if ( ! function_exists( 'hodophile_blog_title_partial' ) ) :
    // blog title
    function hodophile_blog_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_blog_sub_title_partial' ) ) :
    // blog title
    function hodophile_blog_sub_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['blog_sub_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_blog_btn_title_partial' ) ) :
    // blog btn title
    function hodophile_blog_btn_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['blog_btn_title'] );
    }
endif;

if ( ! function_exists( 'hodophile_blog_alt_btn_title_partial' ) ) :
    // blog btn title
    function hodophile_blog_alt_btn_title_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['blog_alt_btn_title'] );
    }
endif;


if ( ! function_exists( 'hodophile_copyright_text_partial' ) ) :
    // copyright text
    function hodophile_copyright_text_partial() {
        $options = hodophile_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;

if ( ! function_exists( 'hodophile_powered_by_text_partial' ) ) :
    // powered by text
    function hodophile_powered_by_text_partial() {
        $options = hodophile_get_theme_options();
        return hodophile_santize_allow_tag( $options['powered_by_text'] );
    }
endif;
