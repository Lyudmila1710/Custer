<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

/**
 * hodophile_footer_primary_content hook
 *
 * @hooked hodophile_add_contact_section -  10
 *
 */
do_action( 'hodophile_footer_primary_content' );

/**
 * hodophile_content_end_action hook
 *
 * @hooked hodophile_content_end -  10
 *
 */
do_action( 'hodophile_content_end_action' );

/**
 * hodophile_content_end_action hook
 *
 * @hooked hodophile_footer_start -  10
 * @hooked hodophile_Footer_Widgets->add_footer_widgets -  20
 * @hooked hodophile_footer_site_info -  40
 * @hooked hodophile_footer_end -  100
 *
 */
do_action( 'hodophile_footer' );

/**
 * hodophile_page_end_action hook
 *
 * @hooked hodophile_page_end -  10
 *
 */
do_action( 'hodophile_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
