<?php
/**
 * gallery Section options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

// Add gallery section
$wp_customize->add_section( 'hodophile_gallery_section', array(
	'title'             => esc_html__( 'Gallery','hodophile' ),
	'description'       => esc_html__( 'Gallery Section options.', 'hodophile' ),
	'panel'             => 'hodophile_front_page_panel',
) );

// gallery content enable control and setting
$wp_customize->add_setting( 'hodophile_theme_options[gallery_section_enable]', array(
	'default'			=> 	$options['gallery_section_enable'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[gallery_section_enable]', array(
	'label'             => esc_html__( 'Gallery Section Enable', 'hodophile' ),
	'section'           => 'hodophile_gallery_section',
	'on_off_label' 		=> hodophile_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[gallery_section_enable]', array(
		'selector'            => '#hodophile_gallery_section .tooltiptext',
		'settings'            => 'hodophile_theme_options[gallery_section_enable]',
    ) );
}


// Title setting and control
$wp_customize->add_setting( 'hodophile_theme_options[gallery_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' => $options['gallery_title'],
	'transport'			=> 'postMessage',
	) );

$wp_customize->add_control( 'hodophile_theme_options[gallery_title]', array(
	'label'             => sprintf( esc_html__( 'Section Title', 'hodophile' ) ),
	'section'        	=> 'hodophile_gallery_section',
	'active_callback' 	=> 'hodophile_is_gallery_section_enable',
	'type'				=> 'text',
	) );

	// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[gallery_title]', array(
		'selector'            => '#hodophile_gallery_section h2.section-title',
		'settings'            => 'hodophile_theme_options[gallery_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_gallery_title_partial',
    ) );
}


// Short Description setting and control
	$wp_customize->add_setting( 'hodophile_theme_options[gallery_short_description]', array(
		'sanitize_callback' => 'wp_kses_post',
		'default' => $options['gallery_short_description'],
		'transport'			=> 'postMessage',
		) );

	$wp_customize->add_control( 'hodophile_theme_options[gallery_short_description]', array(
		'label'             => sprintf( esc_html__( 'Section Short Description', 'hodophile' ) ),
		'section'        	=> 'hodophile_gallery_section',
		'active_callback' 	=> 'hodophile_is_gallery_section_enable',
		'type'				=> 'textarea',
		) );

	// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[gallery_short_description]', array(
		'selector'            => '#hodophile_gallery_section div.section-header p',
		'settings'            => 'hodophile_theme_options[gallery_short_description]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_gallery_short_description_partial',
    ) );
}


$wp_customize->add_setting( 'hodophile_theme_options[gallery_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' => $options['gallery_btn_title'],
	'transport'			=> 'postMessage',
	) );

$wp_customize->add_control( 'hodophile_theme_options[gallery_btn_title]', array(
	'label'             => sprintf( esc_html__( 'Btn Label', 'hodophile' ) ),
	'section'        	=> 'hodophile_gallery_section',
	'active_callback' 	=> 'hodophile_is_gallery_section_enable',
	'type'				=> 'text',
	) );

	// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[gallery_btn_title]', array(
		'selector'            => '#hodophile_gallery_section .view-more a',
		'settings'            => 'hodophile_theme_options[gallery_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_gallery_btn_title_partial',
    ) );
}

$wp_customize->add_setting( 'hodophile_theme_options[gallery_btn_url]', array(
	'sanitize_callback' => 'esc_url_raw',
	) );

$wp_customize->add_control( 'hodophile_theme_options[gallery_btn_url]', array(
	'label'             => sprintf( esc_html__( 'Btn Url', 'hodophile' ) ),
	'section'        	=> 'hodophile_gallery_section',
	'active_callback' 	=> 'hodophile_is_gallery_section_enable',
	'type'				=> 'url',
	) );



for ( $i = 1; $i <= 8; $i++ ) :

	$wp_customize->add_setting( 'hodophile_theme_options[gallery_image_' .$i. ']', array(
		'sanitize_callback' => 'hodophile_sanitize_image'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hodophile_theme_options[gallery_image_' .$i. ']',
			array(
			'label'       		=> esc_html__( 'Gallery Image ', 'hodophile' ).$i,
			'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'hodophile' ), 650, 700 ),
			'section'     		=> 'hodophile_gallery_section',
			'active_callback'	=> 'hodophile_is_gallery_section_enable',
	) ) );

endfor;