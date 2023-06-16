<?php
/**
 * Popular Destination Section options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

// Add Popular Destination section
$wp_customize->add_section( 'hodophile_popular_destination_section', array(
	'title'             => esc_html__( 'Popular Destination','hodophile' ),
	'description'       => esc_html__( 'Popular Destination Section options.', 'hodophile' ),
	'panel'             => 'hodophile_front_page_panel',
) );

// Popular Destination content enable control and setting
$wp_customize->add_setting( 'hodophile_theme_options[popular_destination_section_enable]', array(
	'default'			=> 	$options['popular_destination_section_enable'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[popular_destination_section_enable]', array(
	'label'             => esc_html__( 'Popular Destination Section Enable', 'hodophile' ),
	'section'           => 'hodophile_popular_destination_section',
	'on_off_label' 		=> hodophile_switch_options(),
) ) );


// popular destination title setting and control
$wp_customize->add_setting( 'hodophile_theme_options[popular_destination_sub_title]', array(
	'default'			=> $options['popular_destination_sub_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[popular_destination_sub_title]', array(
	'label'           	=> esc_html__( 'Section Sub Title', 'hodophile' ),
	'section'        	=> 'hodophile_popular_destination_section',
	'active_callback' 	=> 'hodophile_is_popular_destination_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[popular_destination_sub_title]', array(
		'selector'            => '#hodophile_popular_destination_section .section-header p',
		'settings'            => 'hodophile_theme_options[popular_destination_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_popular_destination_sub_title_partial',
    ) );
}

// popular destination title setting and control
$wp_customize->add_setting( 'hodophile_theme_options[popular_destination_title]', array(
	'default'			=> $options['popular_destination_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[popular_destination_title]', array(
	'label'           	=> esc_html__( 'Section Title', 'hodophile' ),
	'section'        	=> 'hodophile_popular_destination_section',
	'active_callback' 	=> 'hodophile_is_popular_destination_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[popular_destination_title]', array(
		'selector'            => '#hodophile_popular_destination_section .section-header h2.section-title',
		'settings'            => 'hodophile_theme_options[popular_destination_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_popular_destination_title_partial',
    ) );
}

$wp_customize->add_setting( 'hodophile_theme_options[popular_destination_btn_label]', array(
	'default'			=> $options['popular_destination_btn_label'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[popular_destination_btn_label]', array(
	'label'           	=> esc_html__( 'Button Label', 'hodophile' ),
	'section'        	=> 'hodophile_popular_destination_section',
	'active_callback' 	=> 'hodophile_is_popular_destination_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[popular_destination_btn_label]', array(
		'selector'            => '#hodophile_popular_destination_section .book-now a',
		'settings'            => 'hodophile_theme_options[popular_destination_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_popular_destination_btn_label_partial',
    ) );
}

$wp_customize->add_setting( 'hodophile_theme_options[popular_destination_alt_btn_label]', array(
	'default'			=> $options['popular_destination_alt_btn_label'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[popular_destination_alt_btn_label]', array(
	'label'           	=> esc_html__( 'Button Label', 'hodophile' ),
	'section'        	=> 'hodophile_popular_destination_section',
	'active_callback' 	=> 'hodophile_is_popular_destination_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[popular_destination_alt_btn_label]', array(
		'selector'            => '#hodophile_popular_destination_section .view-more a',
		'settings'            => 'hodophile_theme_options[popular_destination_alt_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_popular_destination_alt_btn_label_partial',
    ) );
}

$wp_customize->add_setting( 'hodophile_theme_options[popular_destination_alt_btn_link]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'hodophile_theme_options[popular_destination_alt_btn_link]', array(
	'label'           	=> esc_html__( 'Alt Button Link', 'hodophile' ),
	'section'        	=> 'hodophile_popular_destination_section',
	'active_callback' 	=> 'hodophile_is_popular_destination_section_enable',
	'type'				=> 'url',
) );



// Popular Destination content type control and setting
$wp_customize->add_setting( 'hodophile_theme_options[popular_destination_content_type]', array(
	'default'          	=> $options['popular_destination_content_type'],
	'sanitize_callback' => 'hodophile_sanitize_select',
) );

$wp_customize->add_control( 'hodophile_theme_options[popular_destination_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'hodophile' ),
	'section'           => 'hodophile_popular_destination_section',
	'type'				=> 'select',
	'active_callback' 	=> 'hodophile_is_popular_destination_section_enable',
	'choices'			=> hodophile_popular_destination_content_type(),
) );
	

// Add dropdown category setting and control.
$wp_customize->add_setting(  'hodophile_theme_options[popular_destination_content_category]', array(
	'sanitize_callback' => 'hodophile_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Hodophile_Dropdown_Taxonomies_Control( $wp_customize,'hodophile_theme_options[popular_destination_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'hodophile' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'hodophile' ),
	'section'           => 'hodophile_popular_destination_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'hodophile_is_popular_destination_section_content_category_enable'
) ) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'hodophile_theme_options[popular_destination_content_trip_types]', array(
	'sanitize_callback' => 'absint',
) ) ;

$wp_customize->add_control( new Hodophile_Dropdown_Taxonomies_Control( $wp_customize,'hodophile_theme_options[popular_destination_content_trip_types]', array(
	'label'             => esc_html__( 'Select Trip Types', 'hodophile' ),
	'section'           => 'hodophile_popular_destination_section',
	'taxonomy'			=> 'itinerary_types',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'hodophile_is_popular_destination_section_content_trip_types_enable'
) ) );

