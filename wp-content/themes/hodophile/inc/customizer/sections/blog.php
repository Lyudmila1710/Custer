<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'hodophile_blog_section', array(
	'title'             => esc_html__( 'Blog','hodophile' ),
	'description'       => esc_html__( 'Blog Section options.', 'hodophile' ),
	'panel'             => 'hodophile_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'hodophile_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'hodophile' ),
	'section'           => 'hodophile_blog_section',
	'on_off_label' 		=> hodophile_switch_options(),
) ) );

// blog title setting and control
$wp_customize->add_setting( 'hodophile_theme_options[blog_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_sub_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[blog_sub_title]', array(
	'label'           	=> esc_html__( 'Section Sub Title', 'hodophile' ),
	'section'        	=> 'hodophile_blog_section',
	'active_callback' 	=> 'hodophile_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[blog_sub_title]', array(
		'selector'            => '#hodophile_blog_section .section-header p',
		'settings'            => 'hodophile_theme_options[blog_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_blog_sub_title_partial',
    ) );
}

// blog title setting and control
$wp_customize->add_setting( 'hodophile_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Section Title', 'hodophile' ),
	'section'        	=> 'hodophile_blog_section',
	'active_callback' 	=> 'hodophile_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[blog_title]', array(
		'selector'            => '#hodophile_blog_section .section-header h2.section-title',
		'settings'            => 'hodophile_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_blog_title_partial',
    ) );
}



// blog btn title setting and control
$wp_customize->add_setting( 'hodophile_theme_options[blog_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[blog_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'hodophile' ),
	'section'        	=> 'hodophile_blog_section',
	'active_callback' 	=> 'hodophile_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[blog_btn_title]', array(
		'selector'            => '#hodophile_blog_section .entry-content a.read-more',
		'settings'            => 'hodophile_theme_options[blog_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_blog_btn_title_partial',
    ) );
}



// blog btn title setting and control
$wp_customize->add_setting( 'hodophile_theme_options[blog_alt_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_alt_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[blog_alt_btn_title]', array(
	'label'           	=> esc_html__( 'Alt Button Label', 'hodophile' ),
	'section'        	=> 'hodophile_blog_section',
	'active_callback' 	=> 'hodophile_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[blog_alt_btn_title]', array(
		'selector'            => '#hodophile_blog_section .view-more a',
		'settings'            => 'hodophile_theme_options[blog_alt_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_blog_alt_btn_title_partial',
    ) );
}

// blog btn title setting and control
$wp_customize->add_setting( 'hodophile_theme_options[blog_alt_btn_url]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'hodophile_theme_options[blog_alt_btn_url]', array(
	'label'           	=> esc_html__( 'Alt Button Link', 'hodophile' ),
	'section'        	=> 'hodophile_blog_section',
	'active_callback' 	=> 'hodophile_is_blog_section_enable',
	'type'				=> 'url',
) );


// Add dropdown category setting and control.
$wp_customize->add_setting(  'hodophile_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'hodophile_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Hodophile_Dropdown_Taxonomies_Control( $wp_customize,'hodophile_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'hodophile' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'hodophile' ),
	'section'           => 'hodophile_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'hodophile_is_blog_section_enable'
) ) );
