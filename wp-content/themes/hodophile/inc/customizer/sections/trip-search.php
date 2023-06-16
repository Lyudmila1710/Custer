<?php
/**
 * Trip Search Section options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

if ( !class_exists( 'WP_Travel' ) ) {
	return;
}

// Add Trip Search section
$wp_customize->add_section( 'hodophile_trip_search_section', array(
	'title'             => esc_html__( 'Trip Search','hodophile' ),
	'panel'             => 'hodophile_front_page_panel',
) );

// Trip Search content enable control and setting
$wp_customize->add_setting( 'hodophile_theme_options[trip_search_section_enable]', array(
	'default'			=> 	$options['trip_search_section_enable'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[trip_search_section_enable]', array(
	'label'             => esc_html__( 'Trip Search Section Enable', 'hodophile' ),
	'section'           => 'hodophile_trip_search_section',
	'on_off_label' 		=> hodophile_switch_options(),
) ) );

$wp_customize->add_setting( 'hodophile_theme_options[trip_search_sub_title]', array(
	'default'			=> $options['trip_search_sub_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[trip_search_sub_title]', array(
	'label'           	=> esc_html__( 'Section Sub Title', 'hodophile' ),
	'section'        	=> 'hodophile_trip_search_section',
	'active_callback' 	=> 'hodophile_is_trip_search_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[trip_search_sub_title]', array(
		'selector'            => '#hodophile_trip_search_section .section-header p',
		'settings'            => 'hodophile_theme_options[trip_search_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_trip_search_sub_title_partial',
    ) );
}
// popular destination read more setting and control
$wp_customize->add_setting( 'hodophile_theme_options[trip_search_title]', array(
	'default'			=> $options['trip_search_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[trip_search_title]', array(
	'label'           	=> esc_html__( 'Section Title', 'hodophile' ),
	'section'        	=> 'hodophile_trip_search_section',
	'active_callback' 	=> 'hodophile_is_trip_search_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[trip_search_title]', array(
		'selector'            => '#hodophile_trip_search_section .section-header h2.section-title',
		'settings'            => 'hodophile_theme_options[trip_search_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_trip_search_title_partial',
    ) );
}

