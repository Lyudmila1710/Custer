<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'hodophile_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','hodophile' ),
	'description'       => esc_html__( 'Archive section options.', 'hodophile' ),
	'panel'             => 'hodophile_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'hodophile_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'hodophile' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'hodophile' ),
	'section'           => 'hodophile_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'hodophile_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[hide_btn]', array(
	'default'           => $options['hide_btn'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[hide_btn]', array(
	'label'             => esc_html__( 'Hide Read More', 'hodophile' ),
	'section'           => 'hodophile_archive_section',
	'on_off_label' 		=> hodophile_hide_options(),
) ) );


$wp_customize->add_setting( 'hodophile_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Category', 'hodophile' ),
	'section'           => 'hodophile_archive_section',
	'on_off_label' 		=> hodophile_hide_options(),
) ) );


// Archive category setting and control.
$wp_customize->add_setting( 'hodophile_theme_options[hide_content]', array(
	'default'           => $options['hide_content'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[hide_content]', array(
	'label'             => esc_html__( 'Hide Conetnt', 'hodophile' ),
	'section'           => 'hodophile_archive_section',
	'on_off_label' 		=> hodophile_hide_options(),
) ) );

$wp_customize->add_setting( 'hodophile_theme_options[hide_image]', array(
	'default'           => $options['hide_image'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[hide_image]', array(
	'label'             => esc_html__( 'Hide Featured Image', 'hodophile' ),
	'section'           => 'hodophile_archive_section',
	'on_off_label' 		=> hodophile_hide_options(),
) ) );
