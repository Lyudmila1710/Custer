<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'hodophile_menu', array(
	'title'             => esc_html__('Header Menu','hodophile'),
	'description'       => esc_html__( 'Header Menu options.', 'hodophile' ),
	'panel'             => 'nav_menus',
) );


$wp_customize->add_setting( 'hodophile_theme_options[primary_menu_header_button_enable]',
	array(
		'sanitize_callback' => 'hodophile_sanitize_switch_control',
		'default'           => $options['primary_menu_header_button_enable'],
	)
);

$wp_customize->add_control( new  hodophile_Switch_Control( $wp_customize,
	'hodophile_theme_options[primary_menu_header_button_enable]',
		array(
			'label'             => esc_html__( 'Show Header Button', 'hodophile' ),
			'description'       => esc_html__( 'Show Header Button in Primary menu', 'hodophile' ),
			'section'           => 'hodophile_menu',
			'on_off_label' 		=> hodophile_switch_options(),
		)
	)
);

$wp_customize->add_setting('hodophile_theme_options[menu_first_btn_label]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['menu_first_btn_label'],
    )
);

$wp_customize->add_control('hodophile_theme_options[menu_first_btn_label]',
    array(
        'section'			=> 'hodophile_menu',
        'label'				=> esc_html__( 'First Button Label:', 'hodophile' ),
        'type'          	=>'text',
		'active_callback'	=> 'hodophile_is_primary_menu_header_button_enable',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[menu_first_btn_label]',
		array(
			'selector'            => '#masthead .header-button .first a',
			'settings'            => 'hodophile_theme_options[menu_first_btn_label]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'hodophile_menu_first_btn_label_partial',
		)
	);
}

// ads link setting and control
$wp_customize->add_setting( 'hodophile_theme_options[menu_first_btn_url]',
	array(
		'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'hodophile_theme_options[menu_first_btn_url]',
	array(
		'label'           	=> esc_html__( 'First Button URL', 'hodophile' ),
		'section'        	=> 'hodophile_menu',
		'type'				=> 'url',
		'active_callback'	=> 'hodophile_is_primary_menu_header_button_enable',

	)
);

$wp_customize->add_setting('hodophile_theme_options[menu_second_btn_label]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['menu_second_btn_label'],
    )
);

$wp_customize->add_control('hodophile_theme_options[menu_second_btn_label]',
    array(
        'section'			=> 'hodophile_menu',
        'label'				=> esc_html__( 'Second Button Label:', 'hodophile' ),
		'active_callback'	=> 'hodophile_is_primary_menu_header_button_enable',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[menu_second_btn_label]',
		array(
			'selector'            => '#masthead .header-button .second a',
			'settings'            => 'hodophile_theme_options[menu_second_btn_label]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'hodophile_menu_second_btn_label_partial',
		)
	);
}

$wp_customize->add_setting('hodophile_theme_options[menu_second_btn_url]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
    )
);

$wp_customize->add_control('hodophile_theme_options[menu_second_btn_url]',
    array(
        'section'			=> 'hodophile_menu',
        'label'				=> esc_html__( 'Second Button URL:', 'hodophile' ),
        'type'          	=>'text',
		'active_callback'	=> 'hodophile_is_primary_menu_header_button_enable',
    )
);