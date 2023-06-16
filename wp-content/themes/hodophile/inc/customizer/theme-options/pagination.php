<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'hodophile_pagination', array(
	'title'               => esc_html__('Pagination','hodophile'),
	'description'         => esc_html__( 'Pagination section options.', 'hodophile' ),
	'panel'               => 'hodophile_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'hodophile' ),
	'section'             => 'hodophile_pagination',
	'on_off_label' 		=> hodophile_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'hodophile_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'hodophile_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'hodophile' ),
	'section'             => 'hodophile_pagination',
	'type'                => 'select',
	'choices'			  => hodophile_pagination_options(),
	'active_callback'	  => 'hodophile_is_pagination_enable',
) );
