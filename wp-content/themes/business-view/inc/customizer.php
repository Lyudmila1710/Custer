<?php

/**
 * Business View Theme Customizer
 *
 * @package Business View
 */



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_view_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    //select sanitization function
    function business_view_sanitize_select($input, $setting)
    {
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control($setting->id)->choices;
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
    function business_view_sanitize_image($file, $setting)
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

    $wp_customize->add_setting('business_view_site_tagline_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('business_view_site_tagline_show', array(
        'label'      => __('Hide Site Tagline Only? ', 'business-view'),
        'section'    => 'title_tagline',
        'settings'   => 'business_view_site_tagline_show',
        'type'       => 'checkbox',

    ));

    $wp_customize->add_panel('business_view_settings', array(
        'priority'       => 50,
        'title'          => __('Business View Theme settings', 'business-view'),
        'description'    => __('All Business View theme settings', 'business-view'),
    ));
    $wp_customize->add_section('business_view_header', array(
        'title' => __('Business View Header Settings', 'business-view'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Business View theme header settings', 'business-view'),
        'panel'    => 'business_view_settings',

    ));
    $wp_customize->add_setting('business_view_main_menu_style', array(
        'default'        => 'style1',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'business_view_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_view_main_menu_style', array(
        'label'      => __('Main Menu Style', 'business-view'),
        'description' => __('You can set the menu style one or two. ', 'business-view'),
        'section'    => 'business_view_header',
        'settings'   => 'business_view_main_menu_style',
        'type'       => 'select',
        'choices'    => array(
            'style1' => __('Style One', 'business-view'),
            'style2' => __('Style Two', 'business-view'),
        ),
    ));

    //Business View Home intro
    $wp_customize->add_section('business_view_hbanner', array(
        'title' => __('Home Intro Settings', 'business-view'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Portfoli profile Intro Settings', 'business-view'),
        'panel'    => 'business_view_settings',

    ));
    $wp_customize->add_setting('business_view_hbanner_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('business_view_hbanner_show', array(
        'label'      => __('Show Home Banner? ', 'business-view'),
        'section'    => 'business_view_hbanner',
        'settings'   => 'business_view_hbanner_show',
        'type'       => 'checkbox',

    ));
    $wp_customize->add_setting('business_view_hbanner_img', array(
        'capability'        => 'edit_theme_options',
        'default'           => get_template_directory_uri() . '/assets/img/banner.jpg',
        'sanitize_callback' => 'business_view_sanitize_image',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'business_view_hbanner_img',
        array(
            'label'    => __('Upload Banner Image', 'business-view'),
            'description'    => __('Image size should be 450px width & 460px height for better view.', 'business-view'),
            'section'  => 'business_view_hbanner',
            'settings' => 'business_view_hbanner_img',
        )
    ));
    $wp_customize->add_setting('business_view_hbanner_subtitle', array(
        'default' => __('WELCOME TO MY WORLD', 'business-view'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_view_hbanner_subtitle', array(
        'label'      => __('Intro Subtitle', 'business-view'),
        'section'    => 'business_view_hbanner',
        'settings'   => 'business_view_hbanner_subtitle',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('business_view_hbanner_title', array(
        'default' => __('Perfect It Solution', 'business-view'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_view_hbanner_title', array(
        'label'      => __('Intro Title', 'business-view'),
        'section'    => 'business_view_hbanner',
        'settings'   => 'business_view_hbanner_title',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('business_view_color_title', array(
        'default' => __('For Your Business', 'business-view'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_view_color_title', array(
        'label'      => __('Intro Color Title', 'business-view'),
        'section'    => 'business_view_hbanner',
        'settings'   => 'business_view_color_title',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('business_view_hbanner_desc', array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_view_hbanner_desc', array(
        'label'      => __('Intro Description', 'business-view'),
        'section'    => 'business_view_hbanner',
        'settings'   => 'business_view_hbanner_desc',
        'type'       => 'textarea',
    ));
    $wp_customize->add_setting('business_view_btn_text_one', array(
        'default' => __('Our Services', 'business-view'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('business_view_btn_text_one', array(
        'label'      => __('Button one text', 'business-view'),
        'section'    => 'business_view_hbanner',
        'settings'   => 'business_view_btn_text_one',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('business_view_btn_url_one', array(
        'default' => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_view_btn_url_one', array(
        'label'      => __('Button one url', 'business-view'),
        'description'      => __('Keep url empty for hide this button', 'business-view'),
        'section'    => 'business_view_hbanner',
        'settings'   => 'business_view_btn_url_one',
        'type'       => 'url',
    ));


    //Business View blog settings
    $wp_customize->add_section('business_view_blog', array(
        'title' => __('Business View Blog Settings', 'business-view'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Business View theme blog settings', 'business-view'),
        'panel'    => 'business_view_settings',

    ));
    $wp_customize->add_setting('business_view_blog_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'business_view_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_view_blog_container', array(
        'label'      => __('Container type', 'business-view'),
        'description' => __('You can set standard container or full width container. ', 'business-view'),
        'section'    => 'business_view_blog',
        'settings'   => 'business_view_blog_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'business-view'),
            'container-fluid' => __('Full width Container', 'business-view'),
        ),
    ));
    $wp_customize->add_setting('business_view_blog_layout', array(
        'default'        => 'fullwidth',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'business_view_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_view_blog_layout', array(
        'label'      => __('Select Blog Layout', 'business-view'),
        'description' => __('Right and Left sidebar only show when sidebar widget is available. ', 'business-view'),
        'section'    => 'business_view_blog',
        'settings'   => 'business_view_blog_layout',
        'type'       => 'select',
        'choices'    => array(
            'rightside' => __('Right Sidebar', 'business-view'),
            'leftside' => __('Left Sidebar', 'business-view'),
            'fullwidth' => __('No Sidebar', 'business-view'),
        ),
    ));
    $wp_customize->add_setting('business_view_blog_style', array(
        'default'        => 'grid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'business_view_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_view_blog_style', array(
        'label'      => __('Select Blog Style', 'business-view'),
        'section'    => 'business_view_blog',
        'settings'   => 'business_view_blog_style',
        'type'       => 'select',
        'choices'    => array(
            'grid' => __('Grid Style', 'business-view'),
            'classic' => __('Classic Style', 'business-view'),
        ),
    ));
    //Business View page settings
    $wp_customize->add_section('business_view_page', array(
        'title' => __('Business View Page Settings', 'business-view'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Business View theme blog settings', 'business-view'),
        'panel'    => 'business_view_settings',

    ));
    $wp_customize->add_setting('business_view_page_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'business_view_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_view_page_container', array(
        'label'      => __('Page Container type', 'business-view'),
        'description' => __('You can set standard container or full width container for page. ', 'business-view'),
        'section'    => 'business_view_page',
        'settings'   => 'business_view_page_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'business-view'),
            'container-fluid' => __('Full width Container', 'business-view'),
        ),
    ));
    $wp_customize->add_setting('business_view_page_header', array(
        'default'        => 'show',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'business_view_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_view_page_header', array(
        'label'      => __('Show Page header', 'business-view'),
        'section'    => 'business_view_page',
        'settings'   => 'business_view_page_header',
        'type'       => 'select',
        'choices'    => array(
            'show' => __('Show all pages', 'business-view'),
            'hide-home' => __('Hide Only Front Page', 'business-view'),
            'hide' => __('Hide All Pages', 'business-view'),
        ),
    ));




    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'business_view_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'business_view_customize_partial_blogdescription',
            )
        );
    }
}
add_action('customize_register', 'business_view_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function business_view_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function business_view_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_view_customize_preview_js()
{
    wp_enqueue_script('business-view-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), BUSINESS_VIEW_VERSION, true);
}
add_action('customize_preview_init', 'business_view_customize_preview_js');
