<?php
/**
 * cta Section options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

// Add cta section
$wp_customize->add_section( 'hodophile_cta_section', array(
	'title'             => esc_html__( 'CTA','hodophile' ),
	'description'       => esc_html__( 'CTA Section options.', 'hodophile' ),
	'panel'             => 'hodophile_front_page_panel',
) );

// cta content enable control and setting
$wp_customize->add_setting( 'hodophile_theme_options[cta_section_enable]', array(
	'default'			=> 	$options['cta_section_enable'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[cta_section_enable]', array(
	'label'             => esc_html__( 'CTA Section Enable', 'hodophile' ),
	'section'           => 'hodophile_cta_section',
	'on_off_label' 		=> hodophile_switch_options(),
) ) );

// cta title setting and control
$wp_customize->add_setting( 'hodophile_theme_options[cta_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['cta_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[cta_title]', array(
	'label'           	=> esc_html__( 'Title', 'hodophile' ),
	'section'        	=> 'hodophile_cta_section',
	'active_callback' 	=> 'hodophile_is_cta_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[cta_title]', array(
		'selector'            => '#hodophile_cta_section .wrapper .section-title',
		'settings'            => 'hodophile_theme_options[cta_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_cta_title_partial',
    ) );
}

// cta description setting and control
$wp_customize->add_setting( 'hodophile_theme_options[cta_description]', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'			=> $options['cta_description'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[cta_description]', array(
	'label'           	=> esc_html__( 'Description', 'hodophile' ),
	'section'        	=> 'hodophile_cta_section',
	'active_callback' 	=> 'hodophile_is_cta_section_enable',
	'type'				=> 'textarea',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[cta_description]', array(
		'selector'            => '#hodophile_cta_section .wrapper .section-subtitle',
		'settings'            => 'hodophile_theme_options[cta_description]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_cta_description_partial',
    ) );
}

// cta btn title setting and control
$wp_customize->add_setting( 'hodophile_theme_options[cta_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['cta_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[cta_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'hodophile' ),
	'section'        	=> 'hodophile_cta_section',
	'active_callback' 	=> 'hodophile_is_cta_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[cta_btn_title]', array(
		'selector'            => '#hodophile_cta_section .discover-now a',
		'settings'            => 'hodophile_theme_options[cta_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_cta_btn_title_partial',
    ) );
}

// cta btn link setting and control
$wp_customize->add_setting( 'hodophile_theme_options[cta_btn_link]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'hodophile_theme_options[cta_btn_link]', array(
	'label'           	=> esc_html__( 'Button Link', 'hodophile' ),
	'section'        	=> 'hodophile_cta_section',
	'active_callback' 	=> 'hodophile_is_cta_section_enable',
	'type'				=> 'url',
) );
