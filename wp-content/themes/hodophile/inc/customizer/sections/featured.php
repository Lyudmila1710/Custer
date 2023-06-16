<?php
/**
 * Featured Section options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

// Add Featured section
$wp_customize->add_section( 'hodophile_featured_section', array(
	'title'             => esc_html__( 'Featured','hodophile' ),
	'description'       => esc_html__( 'Featured Section options.', 'hodophile' ),
	'panel'             => 'hodophile_front_page_panel',
) );

// Featured content enable control and setting
$wp_customize->add_setting( 'hodophile_theme_options[featured_section_enable]', array(
	'default'			=> 	$options['featured_section_enable'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[featured_section_enable]', array(
	'label'             => esc_html__( 'Featured Section Enable', 'hodophile' ),
	'section'           => 'hodophile_featured_section',
	'on_off_label' 		=> hodophile_switch_options(),
) ) );

// about title setting and control
$wp_customize->add_setting( 'hodophile_theme_options[featured_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['featured_sub_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[featured_sub_title]', array(
	'label'           	=> esc_html__( 'Sub Title', 'hodophile' ),
	'section'        	=> 'hodophile_featured_section',
	'active_callback' 	=> 'hodophile_is_featured_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[featured_sub_title]', array(
		'selector'            => '#hodophile_featured_section .wrapper .entry-header p',
		'settings'            => 'hodophile_theme_options[featured_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_featured_sub_title_partial',
    ) );
}


// about pages drop down chooser control and setting
$wp_customize->add_setting( 'hodophile_theme_options[featured_content_page]', array(
	'sanitize_callback' => 'hodophile_sanitize_page',
) );

$wp_customize->add_control( new Hodophile_Dropdown_Chooser( $wp_customize, 'hodophile_theme_options[featured_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'hodophile' ),
	'section'           => 'hodophile_featured_section',
	'choices'			=> hodophile_page_choices(),
	'active_callback'	=> 'hodophile_is_featured_section_enable',
) ) );


for ( $i = 1; $i <= 2; $i++ ) :
	$wp_customize->add_setting( 'hodophile_theme_options[featured_btn_image_'.$i.']', array(
		'sanitize_callback' => 'hodophile_sanitize_image'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hodophile_theme_options[featured_btn_image_'.$i.']',
			array(
			'label'       		=> esc_html__( 'Button Image ', 'hodophile' ).$i,
			'section'     		=> 'hodophile_featured_section',
			'active_callback'	=> 'hodophile_is_featured_section_enable',
	) ) );

	$wp_customize->add_setting( 'hodophile_theme_options[featured_btn_link_'.$i.']', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'hodophile_theme_options[featured_btn_link_'.$i.']', array(
		'label'           	=> esc_html__( 'Button Link ', 'hodophile' ).$i,
		'section'        	=> 'hodophile_featured_section',
		'active_callback' 	=> 'hodophile_is_featured_section_enable',
		'type'				=> 'url',
	) );

endfor;
