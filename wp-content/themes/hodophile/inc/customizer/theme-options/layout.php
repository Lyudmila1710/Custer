<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'hodophile_layout', array(
	'title'               => esc_html__('Layout','hodophile'),
	'description'         => esc_html__( 'Layout section options.', 'hodophile' ),
	'panel'               => 'hodophile_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[site_layout]', array(
	'sanitize_callback'   => 'hodophile_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Hodophile_Custom_Radio_Image_Control ( $wp_customize, 'hodophile_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'hodophile' ),
	'section'             => 'hodophile_layout',
	'choices'			  => hodophile_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'hodophile_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Hodophile_Custom_Radio_Image_Control ( $wp_customize, 'hodophile_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'hodophile' ),
	'section'             => 'hodophile_layout',
	'choices'			  => hodophile_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'hodophile_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Hodophile_Custom_Radio_Image_Control ( $wp_customize, 'hodophile_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'hodophile' ),
	'section'             => 'hodophile_layout',
	'choices'			  => hodophile_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'hodophile_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Hodophile_Custom_Radio_Image_Control( $wp_customize, 'hodophile_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'hodophile' ),
	'section'             => 'hodophile_layout',
	'choices'			  => hodophile_sidebar_position(),
) ) );