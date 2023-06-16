<?php
/**
 * Typography options
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */


// Typography Section
$wp_customize->add_section( 'hodophile_section_typography',
	array(
		'title'      		=> esc_html__( 'Typography', 'hodophile' ),
		'priority'   		=> 600,
		'panel'      		=> 'hodophile_theme_options_panel',
	)
);

$wp_customize->add_setting( 'hodophile_theme_options[theme_menu_typography]',
	array(
		'sanitize_callback'	=> 'hodophile_sanitize_select',
	)
);
$wp_customize->add_control( 'hodophile_theme_options[theme_menu_typography]',
    array(
		'label'       		=> esc_html__( 'Choose Menu Typography', 'hodophile' ),
		'section'     		=> 'hodophile_section_typography',
		'settings'    		=> 'hodophile_theme_options[theme_menu_typography]',
		'type'		  		=> 'select',
		'choices'			=> hodophile_typography_options(),
    )
);

$wp_customize->add_setting( 'hodophile_theme_options[theme_site_title_typography]',
	array(
		'sanitize_callback'	=> 'hodophile_sanitize_select',
	)
);
$wp_customize->add_control( 'hodophile_theme_options[theme_site_title_typography]',
    array(
		'label'       		=> esc_html__( 'Choose Site Title Typography', 'hodophile' ),
		'section'     		=> 'hodophile_section_typography',
		'settings'    		=> 'hodophile_theme_options[theme_site_title_typography]',
		'type'		  		=> 'select',
		'choices'			=> hodophile_typography_options(),
    )
);

$wp_customize->add_setting( 'hodophile_theme_options[theme_site_description_typography]',
	array(
		'sanitize_callback'	=> 'hodophile_sanitize_select',
	)
);
$wp_customize->add_control( 'hodophile_theme_options[theme_site_description_typography]',
    array(
		'label'       		=> esc_html__( 'Choose Site Description Typography', 'hodophile' ),
		'section'     		=> 'hodophile_section_typography',
		'settings'    		=> 'hodophile_theme_options[theme_site_description_typography]',
		'type'		  		=> 'select',
		'choices'			=> hodophile_typography_options(),
    )
);



$wp_customize->add_setting( 'hodophile_theme_options[theme_head_typography]',
	array(
		'sanitize_callback'	=> 'hodophile_sanitize_select',
	)
);

$wp_customize->add_control( 'hodophile_theme_options[theme_head_typography]',
    array(
		'label'       		=> esc_html__( 'Choose Heading Typography', 'hodophile' ),
		'section'     		=> 'hodophile_section_typography',
		'settings'    		=> 'hodophile_theme_options[theme_head_typography]',
		'type'		  		=> 'select',
		'choices'			=> hodophile_typography_options(),
    )
);

$wp_customize->add_setting( 'hodophile_theme_options[theme_body_typography]',
	array(
		'sanitize_callback'	=> 'hodophile_sanitize_select',
	)
);

$wp_customize->add_control( 'hodophile_theme_options[theme_body_typography]',
    array(
		'label'       		=> esc_html__( 'Choose Body Typography', 'hodophile' ),
		'section'     		=> 'hodophile_section_typography',
		'settings'    		=> 'hodophile_theme_options[theme_body_typography]',
		'type'		  		=> 'select',
		'choices'			=> hodophile_typography_options(),
    )
);