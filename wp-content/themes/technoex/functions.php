<?php
/**
 * Theme functions and definitions
 *
 * @package technoex
 */

/**
 * After setup theme hook
 */
function technoex_theme_setup(){
    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'technoex', get_stylesheet_directory() . '/languages' );	
	require get_stylesheet_directory() . '/inc/customizer/technoex-customizer-options.php';	
}
add_action( 'after_setup_theme', 'technoex_theme_setup' );

/**
 * Load assets.
 */

function technoex_theme_css() {
	wp_enqueue_style( 'technoex-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('technoex-child-style', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('technoex-default-css', get_stylesheet_directory_uri() . "/assets/css/theme-default.css" );
    wp_enqueue_style('technoex-bootstrap-smartmenus-css', get_stylesheet_directory_uri() . "/assets/css/bootstrap-smartmenus.css" ); 	
}
add_action( 'wp_enqueue_scripts', 'technoex_theme_css', 99);

/**
 * Import Options From Parent Theme
 *
 */
function technoex_parent_theme_options() {
	$arilewp_mods = get_option( 'theme_mods_arilewp' );
	if ( ! empty( $arilewp_mods ) ) {
		foreach ( $arilewp_mods as $arilewp_mod_k => $arilewp_mod_v ) {
			set_theme_mod( $arilewp_mod_k, $arilewp_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'technoex_parent_theme_options' );

/**
 * Fresh site activate
 *
 */
$fresh_site_activate = get_option( 'fresh_technoex_site_activate' );
if ( (bool) $fresh_site_activate === false ) {
	set_theme_mod( 'designexo_testomonial_background_image', get_stylesheet_directory_uri().'/assets/img/theme-testi-bg.jpg' );
	
	set_theme_mod( 'designexo_theme_color', 'theme-crimson' );
	set_theme_mod( 'designexo_slider_caption_layout', 'designexo_slider_captoin_layout2' );
	set_theme_mod( 'designexo_service_layout', 'designexo_service_layout2' );
	set_theme_mod( 'designexo_project_layout', 'designexo_project_layout1' );
	set_theme_mod( 'designexo_client_layout', 'designexo_client_layout1' );
	set_theme_mod( 'designexo_theme_info_column_layout', '3' );
	set_theme_mod( 'designexo_typography_base_text_transform', 'inherit' );
	set_theme_mod( 'designexo_typography_disabled', true );
	set_theme_mod( 'designexo_typography_h1_font_family', 'Playfair Display' );
	set_theme_mod( 'designexo_typography_h2_font_family', 'Playfair Display' );
	set_theme_mod( 'designexo_typography_h3_font_family', 'Playfair Display' );
	set_theme_mod( 'designexo_typography_h4_font_family', 'Playfair Display' );
	set_theme_mod( 'designexo_typography_h5_font_family', 'Playfair Display' );
	set_theme_mod( 'designexo_typography_h6_font_family', 'Playfair Display' );
	set_theme_mod( 'designexo_typography_widget_title_font_family', 'Playfair Display' );
	set_theme_mod( 'designexo_typography_h1_text_transform', 'inherit' );
	set_theme_mod( 'designexo_typography_h2_text_transform', 'inherit' );
	set_theme_mod( 'designexo_typography_h3_text_transform', 'inherit' );
	set_theme_mod( 'designexo_typography_h4_text_transform', 'inherit' );
	set_theme_mod( 'designexo_typography_h5_text_transform', 'inherit' );
	set_theme_mod( 'designexo_typography_h6_text_transform', 'inherit' );
	set_theme_mod( 'designexo_typography_menu_bar_text_transform', 'capitalize' );
	set_theme_mod( 'designexo_typography_dropdown_bar_text_transform', 'capitalize' );
	set_theme_mod( 'designexo_typography_widget_title_text_transform', 'capitalize' );
	set_theme_mod( 'designexo_typography_h1_letter_spacing', '1px' );
	set_theme_mod( 'designexo_typography_h2_letter_spacing', '1px' );
	set_theme_mod( 'designexo_typography_h3_letter_spacing', '1px' );
	set_theme_mod( 'designexo_typography_h4_letter_spacing', '1px' );
	set_theme_mod( 'designexo_typography_h5_letter_spacing', '1px' );
	set_theme_mod( 'designexo_typography_h6_letter_spacing', '1px' );
	set_theme_mod( 'designexo_typography_menu_bar_letter_spacing', '1px' );
	set_theme_mod( 'designexo_typography_dropdown_bar_letter_spacing', '1px' );
    set_theme_mod( 'designexo_typography_widget_title_letter_spacing', '1px' );
	
	
	update_option( 'fresh_technoex_site_activate', true );
}

/**
 * Custom Theme Script
*/
function technoex_custom_theme_css() {
	$technoex_testomonial_background_image = get_theme_mod('designexo_testomonial_background_image');
	?>
    <style type="text/css">
		<?php if($technoex_testomonial_background_image != null) : ?>
		.theme-testimonial { 
		        background-image: url(<?php echo esc_url( $technoex_testomonial_background_image ); ?>); 
                background-size: cover;
				background-position: center center;
		}
        <?php endif; ?>
    </style>
 
<?php }
add_action('wp_footer','technoex_custom_theme_css');

/**
 * Page header
 *
 */
function technoex_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'technoex_custom_header_args', array(
		'default-image'      => get_stylesheet_directory_uri().'/assets/img/technoex-page-header.jpg',
		'default-text-color' => 'fff',
		'width'              => 1920,
		'height'             => 500,
		'flex-height'        => true,
		'flex-width'         => true,
		'wp-head-callback'   => 'technoex_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'technoex_custom_header_setup' );

/**
 * Custom background
 *
 */
function technoex_custom_background_setup() {
	add_theme_support( 'custom-background', apply_filters( 'technoex_custom_background_args', array(
		'default-color' => '18191b',
		'default-image' => '',
	) ) );
}
add_action( 'after_setup_theme', 'technoex_custom_background_setup' );


if ( ! function_exists( 'technoex_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see technoex_custom_header_setup().
	 */
	function technoex_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) :
				?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php
			// If the user has set a custom color for the text use that.
			else :
				?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?> !important;
			}

			<?php endif; ?>
		</style>
		<?php
	}
endif;