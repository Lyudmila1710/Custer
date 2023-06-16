<?php
/**
 * Hero Banner Section options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

// Add Hero Banner section
$wp_customize->add_section( 'hodophile_hero_banner_section', array(
	'title'             => esc_html__( 'Hero Banner','hodophile' ),
	'description'       => esc_html__( 'Hero Banner Section options.', 'hodophile' ),
	'panel'             => 'hodophile_front_page_panel',
) );

// Hero Banner content enable control and setting
$wp_customize->add_setting( 'hodophile_theme_options[hero_banner_section_enable]', array(
	'default'			=> 	$options['hero_banner_section_enable'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[hero_banner_section_enable]', array(
	'label'             => esc_html__( 'Hero Banner Section Enable', 'hodophile' ),
	'section'           => 'hodophile_hero_banner_section',
	'on_off_label' 		=> hodophile_switch_options(),
) ) );




$wp_customize->add_setting( 'hodophile_theme_options[hero_banner_sub_title]', array(
	'default'			=> $options['hero_banner_sub_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[hero_banner_sub_title]', array(
	'label'           	=> esc_html__( 'Section Sub Title', 'hodophile' ),
	'section'        	=> 'hodophile_hero_banner_section',
	'active_callback' 	=> 'hodophile_is_hero_banner_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[hero_banner_sub_title]', array(
		'selector'            => '#hodophile_hero_banner p.title',
		'settings'            => 'hodophile_theme_options[hero_banner_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_hero_banner_sub_title_partial',
    ) );
}
// popular destination read more setting and control
$wp_customize->add_setting( 'hodophile_theme_options[hero_banner_title]', array(
	'default'			=> $options['hero_banner_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[hero_banner_title]', array(
	'label'           	=> esc_html__( 'Section Title', 'hodophile' ),
	'section'        	=> 'hodophile_hero_banner_section',
	'active_callback' 	=> 'hodophile_is_hero_banner_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[hero_banner_title]', array(
		'selector'            => '#hodophile_hero_banner .entry-title',
		'settings'            => 'hodophile_theme_options[hero_banner_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_hero_banner_title_partial',
    ) );
}

// popular destination read more setting and control
$wp_customize->add_setting( 'hodophile_theme_options[hero_banner_content]', array(
	'default'			=> $options['hero_banner_content'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[hero_banner_content]', array(
	'label'           	=> esc_html__( 'Section Content', 'hodophile' ),
	'section'        	=> 'hodophile_hero_banner_section',
	'active_callback' 	=> 'hodophile_is_hero_banner_section_enable',
	'type'				=> 'textarea',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[hero_banner_content]', array(
		'selector'            => '#hodophile_hero_banner .entry-content',
		'settings'            => 'hodophile_theme_options[hero_banner_content]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_hero_banner_content_partial',
    ) );
}

// popular destination read more setting and control
$wp_customize->add_setting( 'hodophile_theme_options[hero_banner_btn_label]', array(
	'default'			=> $options['hero_banner_btn_label'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[hero_banner_btn_label]', array(
	'label'           	=> esc_html__( 'Btn Label', 'hodophile' ),
	'section'        	=> 'hodophile_hero_banner_section',
	'active_callback' 	=> 'hodophile_is_hero_banner_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[hero_banner_btn_label]', array(
		'selector'            => '#hodophile_hero_banner .discover-now a',
		'settings'            => 'hodophile_theme_options[hero_banner_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_hero_banner_btn_label_partial',
    ) );
}

$wp_customize->add_setting('hodophile_theme_options[hero_banner_btn_url]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
    )
);

$wp_customize->add_control('hodophile_theme_options[hero_banner_btn_url]',
    array(
        'section'			=> 'hodophile_hero_banner_section',
        'label'				=> esc_html__( 'Button URL', 'hodophile' ),
        'type'          	=>'text',
		'active_callback'	=> 'hodophile_is_hero_banner_section_enable',
    )
);

// Hero Banner content type control and setting
$wp_customize->add_setting( 'hodophile_theme_options[hero_banner_content_type]', array(
	'default'          	=> $options['hero_banner_content_type'],
	'sanitize_callback' => 'hodophile_sanitize_select',
) );

$wp_customize->add_control( 'hodophile_theme_options[hero_banner_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'hodophile' ),
	'section'           => 'hodophile_hero_banner_section',
	'type'				=> 'select',
	'active_callback' 	=> 'hodophile_is_hero_banner_section_enable',
	'choices'			=> hodophile_hero_banner_content_type(),
) );

for ( $i=1; $i <= 5; $i++ ) { 
	// Add dropdown category setting and control.
	$wp_customize->add_setting(  'hodophile_theme_options[hero_banner_content_category_' . $i . ']', array(
		'sanitize_callback' => 'hodophile_sanitize_single_category',
	) ) ;

	$wp_customize->add_control( new Hodophile_Dropdown_Taxonomies_Control( $wp_customize,'hodophile_theme_options[hero_banner_content_category_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Category %d', 'hodophile'), $i ),
		'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'hodophile' ),
		'section'           => 'hodophile_hero_banner_section',
		'type'              => 'dropdown-taxonomies',
		'active_callback'	=> 'hodophile_is_hero_banner_section_content_category_enable'
	) ) );

	// Add dropdown category setting and control.
	$wp_customize->add_setting(  'hodophile_theme_options[hero_banner_content_trip_types_' . $i . ']', array(
		'sanitize_callback' => 'absint',
	) ) ;

	$wp_customize->add_control( new Hodophile_Dropdown_Taxonomies_Control( $wp_customize,'hodophile_theme_options[hero_banner_content_trip_types_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Trip Types %d', 'hodophile'), $i ),
		'section'           => 'hodophile_hero_banner_section',
		'taxonomy'			=> 'itinerary_types',
		'type'              => 'dropdown-taxonomies',
		'active_callback'	=> 'hodophile_is_hero_banner_section_content_trip_types_enable'
	) ) );

	// Hero Banner image enable control and setting
	$wp_customize->add_setting( 'hodophile_theme_options[hero_banner_background_image_' . $i . ']', array(
		'sanitize_callback' => 'hodophile_sanitize_image',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hodophile_theme_options[hero_banner_background_image_' . $i . ']',
			array(
			'label'       		=> sprintf( esc_html__( 'Category Image %d', 'hodophile' ), $i ),
			'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'hodophile' ), 500, 500 ),
			'section'     		=> 'hodophile_hero_banner_section',
			'active_callback'	=> 'hodophile_is_hero_banner_section_content_category_enable',
	) ) );

	// counter hr setting and control
	$wp_customize->add_setting( 'hodophile_theme_options[hero_banner_hr_'. $i .']', array(
		'sanitize_callback' => 'hodophile_sanitize_html',
	) );
}
