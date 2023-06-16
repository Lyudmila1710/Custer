<?php
/**
 * Hodophile Customizer.
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hodophile_customize_register( $wp_customize ) {

	$options = hodophile_get_theme_options();

	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/custom-controls.php';

	// Load customize active callback functions.
	require get_template_directory() . '/inc/customizer/active-callback.php';

	// Load partial callback functions.
	require get_template_directory() . '/inc/customizer/partial.php';

	// Load validation callback functions.
	require get_template_directory() . '/inc/customizer/validation.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );

	// Header title color setting and control.
	$wp_customize->add_setting( 'hodophile_theme_options[header_title_color]', array(
		'default'           => $options['header_title_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hodophile_theme_options[header_title_color]', array(
		'priority'			=> 5,
		'label'             => esc_html__( 'Header Title Color', 'hodophile' ),
		'section'           => 'colors',
	) ) );

	// Header tagline color setting and control.
	$wp_customize->add_setting( 'hodophile_theme_options[header_tagline_color]', array(
		'default'           => $options['header_tagline_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hodophile_theme_options[header_tagline_color]', array(
		'priority'			=> 6,
		'label'             => esc_html__( 'Header Tagline Color', 'hodophile' ),
		'section'           => 'colors',
	) ) );

	// Site identity extra options.
	$wp_customize->add_setting( 'hodophile_theme_options[header_txt_logo_extra]', array(
		'default'           => $options['header_txt_logo_extra'],
		'sanitize_callback' => 'hodophile_sanitize_select',
		'transport'			=> 'refresh'
	) );

	$wp_customize->add_control( 'hodophile_theme_options[header_txt_logo_extra]', array(
		'priority'			=> 50,
		'type'				=> 'radio',
		'label'             => esc_html__( 'Site Identity Extra Options', 'hodophile' ),
		'section'           => 'title_tagline',
		'choices'				=> array( 
			'hide-all'     => esc_html__( 'Hide All', 'hodophile' ),
			'show-all'     => esc_html__( 'Show All', 'hodophile' ),
			'title-only'   => esc_html__( 'Title Only', 'hodophile' ),
			'tagline-only' => esc_html__( 'Tagline Only', 'hodophile' ),
			'logo-title'   => esc_html__( 'Logo + Title', 'hodophile' ),
			'logo-tagline' => esc_html__( 'Logo + Tagline', 'hodophile' ),
			)
	) );


	// Add panel for common theme options
	$wp_customize->add_panel( 'hodophile_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','hodophile' ),
	    'description'=> esc_html__( 'Hodophile Theme Options.', 'hodophile' ),
	    'priority'   => 150,
	) );
	
	// breadcrumb
	require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

	// load layout
	require get_template_directory() . '/inc/customizer/theme-options/layout.php';

	// load menu
	require get_template_directory() . '/inc/customizer/theme-options/menu.php';

	// load static homepage option
	require get_template_directory() . '/inc/customizer/theme-options/homepage-static.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/archive.php';
	
	// load single post option
	require get_template_directory() . '/inc/customizer/theme-options/single-posts.php';

	// load pagination option
	require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

	// load footer option
	require get_template_directory() . '/inc/customizer/theme-options/footer.php';

	// load reset option
	require get_template_directory() . '/inc/customizer/theme-options/reset.php';


	// Add panel for front page theme options.
	$wp_customize->add_panel( 'hodophile_front_page_panel' , array(
	    'title'      => esc_html__( 'Front Page','hodophile' ),
	    'description'=> esc_html__( 'Front Page Theme Options.', 'hodophile' ),
	    'priority'   => 140,
	) );

	foreach ( explode( ',', $options['all_sortable'] ) as $list ) {
		require get_template_directory() . '/inc/customizer/sections/'.str_replace( '_', '-', $list).'.php';
	}

}
add_action( 'customize_register', 'hodophile_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hodophile_customize_preview_js() {
	wp_enqueue_script( 'hodophile-customizer', get_template_directory_uri() . '/assets/js/customizer' . hodophile_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hodophile_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function hodophile_customize_control_js() {
	// fontawesome
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome' . hodophile_min() . '.css' );
	
	// Choose from select jquery.
	wp_enqueue_style( 'chosen-css', get_template_directory_uri() . '/assets/css/chosen' . hodophile_min() . '.css' );
	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen.jquery' . hodophile_min() . '.js', array( 'jquery' ), '1.4.2', true );

	wp_enqueue_style( 'hodophile-customize-controls-css', get_template_directory_uri() . '/assets/css/customize-controls.css' );
	wp_enqueue_script( 'hodophile-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls' . hodophile_min() . '.js', array(), '1.0', true );
	$hodophile_reset_data = array(
		'reset_message' => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'hodophile' )
	);
	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'hodophile-customize-controls', 'hodophile_reset_data', $hodophile_reset_data );
}
add_action( 'customize_controls_enqueue_scripts', 'hodophile_customize_control_js' );

if ( !function_exists( 'hodophile_reset_options' ) ) :
	/**
	 * Reset all options
	 *
	 * @since Hodophile 1.0.0
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function hodophile_reset_options() {
		$options = hodophile_get_theme_options();
		if ( true === $options['reset_options'] ) {
			// Reset custom theme options.
			set_theme_mod( 'hodophile_theme_options', array() );
			// Reset custom header and backgrounds.
			remove_theme_mod( 'header_image' );
			remove_theme_mod( 'header_image_data' );
			remove_theme_mod( 'background_image' );
			remove_theme_mod( 'background_color' );
			remove_theme_mod( 'header_textcolor' );
	    }
	  	else {
		    return false;
	  	}
	}
endif;
add_action( 'customize_save_after', 'hodophile_reset_options' );
