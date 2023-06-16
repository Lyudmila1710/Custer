<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Hodophile
	 * @since Hodophile 1.0.0
	 */

	/**
	 * hodophile_doctype hook
	 *
	 * @hooked hodophile_doctype -  10
	 *
	 */
	do_action( 'hodophile_doctype' );

?>
<head>
<?php
	/**
	 * hodophile_before_wp_head hook
	 *
	 * @hooked hodophile_head -  10
	 *
	 */
	do_action( 'hodophile_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<?php
	/**
	 * hodophile_page_start_action hook
	 *
	 * @hooked hodophile_page_start -  10
	 *
	 */
	do_action( 'hodophile_page_start_action' ); 

	/**
	 * hodophile_loader_action hook
	 *
	 * @hooked hodophile_loader -  10
	 *
	 */
	do_action( 'hodophile_before_header' );

	/**
	 * hodophile_header_action hook
	 *
	 * @hooked hodophile_header_start -  10
	 * @hooked hodophile_site_branding -  20
	 * @hooked hodophile_site_navigation -  30
	 * @hooked hodophile_header_end -  50
	 *
	 */
	do_action( 'hodophile_header_action' );

	/**
	 * hodophile_content_start_action hook
	 *
	 * @hooked hodophile_content_start -  10
	 *
	 */
	do_action( 'hodophile_content_start_action' );

	/**
	 * hodophile_header_image_action hook
	 *
	 * @hooked hodophile_header_image -  10
	 *
	 */
	do_action( 'hodophile_header_image_action' );
	if ( hodophile_is_frontpage() ) {
    	$options = hodophile_get_theme_options();

    	$sorted = $sorted = explode( ',' , hodophile_get_homepage_sections() );
		
		foreach ( $sorted as $section ) {
			add_action( 'hodophile_primary_content', 'hodophile_add_'. $section .'_section' );
		}

		do_action( 'hodophile_primary_content' );
	}