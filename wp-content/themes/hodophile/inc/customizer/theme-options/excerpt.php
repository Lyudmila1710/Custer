<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'hodophile_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','hodophile' ),
	'description'       => esc_html__( 'Excerpt section options.', 'hodophile' ),
	'panel'             => 'hodophile_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'hodophile_sanitize_number_range',
	'validate_callback' => 'hodophile_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'hodophile_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'hodophile' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'hodophile' ),
	'section'     		=> 'hodophile_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );
