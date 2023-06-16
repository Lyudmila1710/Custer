<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'hodophile_single_post_section', array(
	'title'             => esc_html__( 'Single Post','hodophile' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'hodophile' ),
	'panel'             => 'hodophile_theme_options_panel',
) );

// Tourableve date meta setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'hodophile' ),
	'section'           => 'hodophile_single_post_section',
	'on_off_label' 		=> hodophile_hide_options(),
) ) );

// Tourableve author meta setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'hodophile' ),
	'section'           => 'hodophile_single_post_section',
	'on_off_label' 		=> hodophile_hide_options(),
) ) );

// Tourableve author category setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'hodophile' ),
	'section'           => 'hodophile_single_post_section',
	'on_off_label' 		=> hodophile_hide_options(),
) ) );

// Tourableve tag category setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'hodophile' ),
	'section'           => 'hodophile_single_post_section',
	'on_off_label' 		=> hodophile_hide_options(),
) ) );
