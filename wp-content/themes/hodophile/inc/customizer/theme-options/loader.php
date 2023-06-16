<?php
/**
 * Loader options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

$wp_customize->add_section( 'hodophile_loader', array(
	'title'            		=> esc_html__( 'Loader','hodophile' ),
	'description'      		=> esc_html__( 'Loader section options.', 'hodophile' ),
	'panel'            		=> 'hodophile_theme_options_panel',
) );

// Loader enable setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[loader_enable]', array(
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
	'default'             	=> $options['loader_enable'],
) );

$wp_customize->add_control(  new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[loader_enable]', array(
	'label'               	=> esc_html__( 'Enable loader', 'hodophile' ),
	'section'             	=> 'hodophile_loader',
	'on_off_label' 		=> hodophile_switch_options(),
) ) );

// Loader icons setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[loader_icon]', array(
	'sanitize_callback' 	=> 'hodophile_sanitize_select',
	'default'				=> $options['loader_icon'],
) );

$wp_customize->add_control( 'hodophile_theme_options[loader_icon]', array(
	'label'           		=> esc_html__( 'Icon', 'hodophile' ),
	'section'         		=> 'hodophile_loader',
	'type'					=> 'select',
	'choices'				=> hodophile_get_spinner_list(),
	'active_callback' 		=> 'hodophile_is_loader_enable',
) );
