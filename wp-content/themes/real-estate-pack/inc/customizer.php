<?php

/**
 * Real Estate Pack Theme Customizer
 *
 * @package Real Estate Pack
 */


// adctive call back function for header social
if (!function_exists('real_estate_pack_header_social_callback')) :
	function real_estate_pack_header_social_callback()
	{
		if (get_theme_mod('real_estate_pack_header_social_show') == 1 && get_theme_mod('real_estate_pack_headertop_show') == 1) {
			return true;
		} else {
			return false;
		}
	}
endif;
// adctive call back function for header social
if (!function_exists('real_estate_pack_header_top_callback')) :
	function real_estate_pack_header_top_callback()
	{
		if (get_theme_mod('real_estate_pack_headertop_show') == 1) {
			return true;
		} else {
			return false;
		}
	}
endif;
// adctive call back function for header social
if (!function_exists('real_estate_pack_menubar_callback')) :
	function real_estate_pack_menubar_callback()
	{
		if (get_theme_mod('real_estate_pack_menubar_show') == 1) {
			return true;
		} else {
			return false;
		}
	}
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function real_estate_pack_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	//select sanitization function
	function real_estate_pack_sanitize_select($input, $setting)
	{
		$input = sanitize_key($input);
		$choices = $setting->manager->get_control($setting->id)->choices;
		return (array_key_exists($input, $choices) ? $input : $setting->default);
	}
	function real_estate_pack_sanitize_image($file, $setting)
	{
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
			'bmp'          => 'image/bmp',
			'tif|tiff'     => 'image/tiff',
			'ico'          => 'image/x-icon'
		);
		//check file type from file name
		$file_ext = wp_check_filetype($file, $mimes);
		//if file has a valid mime type return it, otherwise return default
		return ($file_ext['ext'] ? $file : $setting->default);
	}

	$wp_customize->add_setting('real_estate_pack_hide_tagline', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  ' ',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_hide_tagline', array(
		'label'      => __('Hide Site Tagline?', 'real-estate-pack'),
		'section'    => 'title_tagline',
		'settings'   => 'real_estate_pack_hide_tagline',
		'type'       => 'checkbox',
	));

	$wp_customize->add_panel('real_estate_pack_settings', array(
		'priority'       => 50,
		'title'          => __('Real Estate Pack Theme settings', 'real-estate-pack'),
		'description'    => __('All Real Estate Pack theme settings', 'real-estate-pack'),
	));
	$wp_customize->add_section('real_estate_pack_header', array(
		'title' => __('Real Estate Pack Header Settings', 'real-estate-pack'),
		'capability'     => 'edit_theme_options',
		'description'     => __('Real Estate Pack theme header settings', 'real-estate-pack'),
		'panel'    => 'real_estate_pack_settings',

	));

	$wp_customize->add_setting('real_estate_pack_headertop_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_headertop_show', array(
		'label'      => __('Show Header Top?', 'real-estate-pack'),
		'section'    => 'real_estate_pack_header',
		'settings'   => 'real_estate_pack_headertop_show',
		'type'       => 'checkbox',
	));
	$wp_customize->add_setting('real_estate_pack_mlogo_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '1',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_mlogo_show', array(
		'label'      => __('Show Header Top Logo?', 'real-estate-pack'),
		'section'    => 'real_estate_pack_header',
		'settings'   => 'real_estate_pack_mlogo_show',
		'type'       => 'checkbox',
		'active_callback' => 'real_estate_pack_header_top_callback',

	));
	$wp_customize->add_setting('real_estate_pack_search_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '1',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_search_show', array(
		'label'      => __('Show Header Search?', 'real-estate-pack'),
		'section'    => 'real_estate_pack_header',
		'settings'   => 'real_estate_pack_search_show',
		'type'       => 'checkbox',
		'active_callback' => 'real_estate_pack_header_top_callback',

	));
	$wp_customize->add_setting('real_estate_pack_header_social_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_header_social_show', array(
		'label'      => __('Show Header Social?', 'real-estate-pack'),
		'section'    => 'real_estate_pack_header',
		'settings'   => 'real_estate_pack_header_social_show',
		'type'       => 'checkbox',
		'active_callback' => 'real_estate_pack_header_top_callback',

	));
	// header social link start
	// Header facebook url
	$wp_customize->add_setting('real_estate_pack_hfacebook_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_hfacebook_link', array(
		'label'      => __('Header Facebook url', 'real-estate-pack'),
		'section'    => 'real_estate_pack_header',
		'settings'   => 'real_estate_pack_hfacebook_link',
		'type'       => 'url',
		'active_callback' => 'real_estate_pack_header_social_callback',
	));
	// Header twitter url
	$wp_customize->add_setting('real_estate_pack_htwitter_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_htwitter_link', array(
		'label'      => __('Header Twitter url', 'real-estate-pack'),
		'section'    => 'real_estate_pack_header',
		'settings'   => 'real_estate_pack_htwitter_link',
		'type'       => 'url',
		'active_callback' => 'real_estate_pack_header_social_callback',
	));
	// Header linkedin url
	$wp_customize->add_setting('real_estate_pack_hlinkedin_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_hlinkedin_link', array(
		'label'      => __('Header Linkedin url', 'real-estate-pack'),
		'section'    => 'real_estate_pack_header',
		'settings'   => 'real_estate_pack_hlinkedin_link',
		'type'       => 'url',
		'active_callback' => 'real_estate_pack_header_social_callback',
	));
	// Header linkedin url
	$wp_customize->add_setting('real_estate_pack_hyoutube_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_hyoutube_link', array(
		'label'      => __('Header Youtube url', 'real-estate-pack'),
		'section'    => 'real_estate_pack_header',
		'settings'   => 'real_estate_pack_hyoutube_link',
		'type'       => 'url',
		'active_callback' => 'real_estate_pack_header_social_callback',
	));
	// Header pinterest url
	$wp_customize->add_setting('real_estate_pack_hpinterest_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_hpinterest_link', array(
		'label'      => __('Header Pinterest url', 'real-estate-pack'),
		'section'    => 'real_estate_pack_header',
		'settings'   => 'real_estate_pack_hpinterest_link',
		'type'       => 'url',
		'active_callback' => 'real_estate_pack_header_social_callback',
	));
	// Header INSTAGRAM url
	$wp_customize->add_setting('real_estate_pack_hinstagram_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_hinstagram_link', array(
		'label'      => __('Header Instagram url', 'real-estate-pack'),
		'section'    => 'real_estate_pack_header',
		'settings'   => 'real_estate_pack_hinstagram_link',
		'type'       => 'url',
		'active_callback' => 'real_estate_pack_header_social_callback',
	));
	// Header Menu bar

	$wp_customize->add_setting('real_estate_pack_menubar_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  1,
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_menubar_show', array(
		'label'      => __('Show Menubar Section?', 'real-estate-pack'),
		'section'    => 'real_estate_pack_header',
		'settings'   => 'real_estate_pack_menubar_show',
		'type'       => 'checkbox',
	));

	$wp_customize->add_setting('real_estate_pack_menubarlogo_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  1,
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_menubarlogo_show', array(
		'label'      => __('Show Menubar Logo?', 'real-estate-pack'),
		'section'    => 'real_estate_pack_header',
		'settings'   => 'real_estate_pack_menubarlogo_show',
		'type'       => 'checkbox',
		'active_callback' => 'real_estate_pack_menubar_callback',

	));
	$wp_customize->add_setting('real_estate_pack_mainmenu_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  1,
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_mainmenu_show', array(
		'label'      => __('Show Main Menu?', 'real-estate-pack'),
		'section'    => 'real_estate_pack_header',
		'settings'   => 'real_estate_pack_mainmenu_show',
		'type'       => 'checkbox',
		'active_callback' => 'real_estate_pack_menubar_callback',

	));
	$wp_customize->add_setting('real_estate_pack_menusearch_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  1,
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_menusearch_show', array(
		'label'      => __('Show Menubar Search Icon?', 'real-estate-pack'),
		'section'    => 'real_estate_pack_header',
		'settings'   => 'real_estate_pack_menusearch_show',
		'type'       => 'checkbox',
		'active_callback' => 'real_estate_pack_menubar_callback',
	));

	// Home intro
	$wp_customize->add_section('real_estate_pack_intro', array(
		'title' => __('Home Intro Settings', 'real-estate-pack'),
		'capability'     => 'edit_theme_options',
		'description'     => __('Home Intro section settings', 'real-estate-pack'),
		'panel'    => 'real_estate_pack_settings',
	));
	$wp_customize->add_setting('real_estate_pack_intro_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '',
		'sanitize_callback' => 'absint',
		'transport'     => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_intro_show', array(
		'label'      => __('Show Intro Section? ', 'real-estate-pack'),
		'section'    => 'real_estate_pack_intro',
		'settings'   => 'real_estate_pack_intro_show',
		'type'       => 'checkbox',
	));
	$wp_customize->add_setting('real_estate_pack_intro_img', array(
		'capability'        => 'edit_theme_options',
		'default'           => get_template_directory_uri() . '/assets/img/real-banner.jpg',
		'sanitize_callback' => 'real_estate_pack_sanitize_image',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control(
		$wp_customize,
		'real_estate_pack_intro_img',
		array(
			'label'    => __('Upload Profile Image', 'real-estate-pack'),
			'description'    => __('Image size should be 450px width & 460px height for better view.', 'real-estate-pack'),
			'section'  => 'real_estate_pack_intro',
			'settings' => 'real_estate_pack_intro_img',
		)
	));
	$wp_customize->add_setting('real_estate_pack_intro_subtitle', array(
		'default' => __('Find Your Dream Home Today', 'real-estate-pack'),
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_intro_subtitle', array(
		'label'      => __('Intro Subtitle', 'real-estate-pack'),
		'section'    => 'real_estate_pack_intro',
		'settings'   => 'real_estate_pack_intro_subtitle',
		'type'       => 'text',
	));
	$wp_customize->add_setting('real_estate_pack_intro_title', array(
		'default' => __('Experience the Finest Real Estate', 'real-estate-pack'),
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_intro_title', array(
		'label'      => __('Intro Title', 'real-estate-pack'),
		'section'    => 'real_estate_pack_intro',
		'settings'   => 'real_estate_pack_intro_title',
		'type'       => 'text',
	));
	$wp_customize->add_setting('real_estate_pack_intro_desc', array(
		'default' => '',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_intro_desc', array(
		'label'      => __('Intro Description', 'real-estate-pack'),
		'section'    => 'real_estate_pack_intro',
		'settings'   => 'real_estate_pack_intro_desc',
		'type'       => 'textarea',
	));
	$wp_customize->add_setting('real_estate_pack_btn_text_one', array(
		'default' => __('LEARN MORE', 'real-estate-pack'),
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('real_estate_pack_btn_text_one', array(
		'label'      => __('Button one text', 'real-estate-pack'),
		'section'    => 'real_estate_pack_intro',
		'settings'   => 'real_estate_pack_btn_text_one',
		'type'       => 'text',
	));

	$wp_customize->add_setting('real_estate_pack_btn_url_one', array(
		'default' => '#',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_btn_url_one', array(
		'label'      => __('Button one url', 'real-estate-pack'),
		'description'      => __('Keep url empty for hide this button', 'real-estate-pack'),
		'section'    => 'real_estate_pack_intro',
		'settings'   => 'real_estate_pack_btn_url_one',
		'type'       => 'url',
	));
	$wp_customize->add_setting('real_estate_pack_btn_text_two', array(
		'default'     => __('EXPLORE MORE', 'real-estate-pack'),
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('real_estate_pack_btn_text_two', array(
		'label'      => __('Button two text', 'real-estate-pack'),
		'section'    => 'real_estate_pack_intro',
		'settings'   => 'real_estate_pack_btn_text_two',
		'type'       => 'text',
	));

	$wp_customize->add_setting('real_estate_pack_btn_url_two', array(
		'default' => '',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_btn_url_two', array(
		'label'      => __('Button two url', 'real-estate-pack'),
		'description'      => __('Keep url empty for hide this button', 'real-estate-pack'),
		'section'    => 'real_estate_pack_intro',
		'settings'   => 'real_estate_pack_btn_url_two',
		'type'       => 'text',
	));


	//Real Estate Pack PLus blog settings
	$wp_customize->add_section('real_estate_pack_blog', array(
		'title' => __('Real Estate Pack Blog Settings', 'real-estate-pack'),
		'capability'     => 'edit_theme_options',
		'description'     => __('Real Estate Pack theme blog settings', 'real-estate-pack'),
		'panel'    => 'real_estate_pack_settings',

	));
	$wp_customize->add_setting('real_estate_pack_blog_container', array(
		'default'        => 'container',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'real_estate_pack_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_blog_container', array(
		'label'      => __('Container type', 'real-estate-pack'),
		'description' => __('You can set standard container or full width container. ', 'real-estate-pack'),
		'section'    => 'real_estate_pack_blog',
		'settings'   => 'real_estate_pack_blog_container',
		'type'       => 'select',
		'choices'    => array(
			'container' => __('Standard Container', 'real-estate-pack'),
			'container-fluid' => __('Full width Container', 'real-estate-pack'),
		),
	));

	$wp_customize->add_setting('real_estate_pack_blog_layout', array(
		'default'        => 'rightside',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'real_estate_pack_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_blog_layout', array(
		'label'      => __('Select Blog Layout', 'real-estate-pack'),
		'description' => __('Right and Left sidebar only show when sidebar widget is available. ', 'real-estate-pack'),
		'section'    => 'real_estate_pack_blog',
		'settings'   => 'real_estate_pack_blog_layout',
		'type'       => 'select',
		'choices'    => array(
			'rightside' => __('Right Sidebar', 'real-estate-pack'),
			'leftside' => __('Left Sidebar', 'real-estate-pack'),
			'fullwidth' => __('No Sidebar', 'real-estate-pack'),
		),
	));
	$wp_customize->add_setting('real_estate_pack_blog_style', array(
		'default'        => 'list',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'real_estate_pack_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_blog_style', array(
		'label'      => __('Select Blog Style', 'real-estate-pack'),
		'section'    => 'real_estate_pack_blog',
		'settings'   => 'real_estate_pack_blog_style',
		'type'       => 'select',
		'choices'    => array(
			'grid' => __('Grid Style', 'real-estate-pack'),
			'list' => __('List Style', 'real-estate-pack'),
			'classic' => __('Classic Style', 'real-estate-pack'),
		),
	));
	//Real Estate Pack page settings
	$wp_customize->add_section('real_estate_pack_page', array(
		'title' => __('Real Estate Pack Page Settings', 'real-estate-pack'),
		'capability'     => 'edit_theme_options',
		'description'     => __('Real Estate Pack theme blog settings', 'real-estate-pack'),
		'panel'    => 'real_estate_pack_settings',

	));
	$wp_customize->add_setting('real_estate_pack_page_container', array(
		'default'        => 'container',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'real_estate_pack_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_page_container', array(
		'label'      => __('Page Container type', 'real-estate-pack'),
		'description' => __('You can set standard container or full width container for page. ', 'real-estate-pack'),
		'section'    => 'real_estate_pack_page',
		'settings'   => 'real_estate_pack_page_container',
		'type'       => 'select',
		'choices'    => array(
			'container' => __('Standard Container', 'real-estate-pack'),
			'container-fluid' => __('Full width Container', 'real-estate-pack'),
		),
	));
	$wp_customize->add_setting('real_estate_pack_page_header', array(
		'default'        => 'show',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'real_estate_pack_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('real_estate_pack_page_header', array(
		'label'      => __('Show Page header', 'real-estate-pack'),
		'section'    => 'real_estate_pack_page',
		'settings'   => 'real_estate_pack_page_header',
		'type'       => 'select',
		'choices'    => array(
			'show' => __('Show all pages', 'real-estate-pack'),
			'hide-home' => __('Hide Only Front Page', 'real-estate-pack'),
			'hide' => __('Hide All Pages', 'real-estate-pack'),
		),
	));




	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'real_estate_pack_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'real_estate_pack_customize_partial_blogdescription',
			)
		);
	}
}
add_action('customize_register', 'real_estate_pack_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function real_estate_pack_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function real_estate_pack_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function real_estate_pack_customize_preview_js()
{
	wp_enqueue_script('real-estate-pack-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), REAL_ESTATE_PACK_VERSION, true);
}
add_action('customize_preview_init', 'real_estate_pack_customize_preview_js');
