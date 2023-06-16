<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

// Add About section
$wp_customize->add_section( 'hodophile_about_section', array(
	'title'             => esc_html__( 'About Us','hodophile' ),
	'description'       => esc_html__( 'About Us Section options.', 'hodophile' ),
	'panel'             => 'hodophile_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'hodophile_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'hodophile_sanitize_switch_control',
) );

$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'hodophile' ),
	'section'           => 'hodophile_about_section',
	'on_off_label' 		=> hodophile_switch_options(),
) ) );

// about title setting and control
$wp_customize->add_setting( 'hodophile_theme_options[about_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_sub_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[about_sub_title]', array(
	'label'           	=> esc_html__( 'Sub Title', 'hodophile' ),
	'section'        	=> 'hodophile_about_section',
	'active_callback' 	=> 'hodophile_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[about_sub_title]', array(
		'selector'            => '#hodophile_about_section .wrapper .entry-header p',
		'settings'            => 'hodophile_theme_options[about_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_about_sub_title_partial',
    ) );
}


// about pages drop down chooser control and setting
$wp_customize->add_setting( 'hodophile_theme_options[about_content_page]', array(
	'sanitize_callback' => 'hodophile_sanitize_page',
) );

$wp_customize->add_control( new Hodophile_Dropdown_Chooser( $wp_customize, 'hodophile_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'hodophile' ),
	'section'           => 'hodophile_about_section',
	'choices'			=> hodophile_page_choices(),
	'active_callback'	=> 'hodophile_is_about_section_enable',
) ) );


// about btn title setting and control
$wp_customize->add_setting( 'hodophile_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'hodophile_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'hodophile' ),
	'section'        	=> 'hodophile_about_section',
	'active_callback' 	=> 'hodophile_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[about_btn_title]', array(
		'selector'            => '#hodophile_about_section .discover-now a',
		'settings'            => 'hodophile_theme_options[about_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_about_btn_title_partial',
    ) );
}


for ( $i = 1; $i <= 3; $i++ ) :
	$wp_customize->add_setting( 'hodophile_theme_options[about_counter_count_'.$i.']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'hodophile_theme_options[about_counter_count_'.$i.']', array(
		'label'           	=> esc_html__( 'Counter Count ', 'hodophile' ).$i,
		'section'        	=> 'hodophile_about_section',
		'active_callback' 	=> 'hodophile_is_about_section_enable',
		'type'				=> 'text',
	) );

	$wp_customize->add_setting( 'hodophile_theme_options[about_counter_label_'.$i.']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'hodophile_theme_options[about_counter_label_'.$i.']', array(
		'label'           	=> esc_html__( 'Counter Label ', 'hodophile' ).$i,
		'section'        	=> 'hodophile_about_section',
		'active_callback' 	=> 'hodophile_is_about_section_enable',
		'type'				=> 'text',
	) );



endfor;
