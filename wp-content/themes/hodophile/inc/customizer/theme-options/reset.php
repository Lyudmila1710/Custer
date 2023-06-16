<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'hodophile_reset_section', array(
	'title'             => esc_html__('Reset all settings','hodophile'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'hodophile' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'hodophile_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'hodophile' ),
	'section'           => 'hodophile_reset_section',
	'type'              => 'checkbox',
) );
