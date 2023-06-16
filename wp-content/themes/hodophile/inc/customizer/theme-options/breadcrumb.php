<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

$wp_customize->add_section( 'hodophile_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','hodophile' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'hodophile' ),
	'panel'             => 'hodophile_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'hodophile' ),
	'section'          	=> 'hodophile_breadcrumb',
	'on_off_label' 		=> hodophile_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'hodophile_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'hodophile' ),
	'active_callback' 	=> 'hodophile_is_breadcrumb_enable',
	'section'          	=> 'hodophile_breadcrumb',
) );
