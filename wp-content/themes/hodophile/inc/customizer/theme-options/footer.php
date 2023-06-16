<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'hodophile_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'hodophile' ),
		'priority'   			=> 900,
		'panel'      			=> 'hodophile_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'hodophile_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'hodophile_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'hodophile_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'hodophile' ),
		'section'    			=> 'hodophile_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright p',
		'settings'            => 'hodophile_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_copyright_text_partial',
    ) );
}


// footer text
$wp_customize->add_setting( 'hodophile_theme_options[powered_by_text]',
	array(
		'default'       		=> $options['powered_by_text'],
		'sanitize_callback'		=> 'hodophile_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'hodophile_theme_options[powered_by_text]',
    array(
		'label'      			=> esc_html__( 'Powered By Text', 'hodophile' ),
		'section'    			=> 'hodophile_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'hodophile_theme_options[powered_by_text]', array(
		'selector'            => '.site-info .powered-by p',
		'settings'            => 'hodophile_theme_options[powered_by_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'hodophile_powered_by_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'hodophile_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'hodophile_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Hodophile_Switch_Control( $wp_customize, 'hodophile_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'hodophile' ),
		'section'    			=> 'hodophile_section_footer',
		'on_off_label' 		=> hodophile_switch_options(),
    )
) );