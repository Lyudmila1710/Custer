<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Travel Ultimate Pro
 *
 * @package Theme Palace
 * @subpackage Travel Ultimate Pro
 * @since Travel Ultimate Pro 1.0.0
 */


require get_template_directory() . '/inc/widgets/editors-choice.php';

require get_template_directory() . '/inc/widgets/social-link-widget.php';

require get_template_directory() . '/inc/widgets/popular-posts-widget.php';



/**
 * Register widgets
 */
function hodophile_register_widgets() {

	register_widget( 'Hodophile_Editors_Choice' );

	register_widget( 'Hodophile_Popular_Post' );

	register_widget( 'Hodophile_Social_Link' );

}
add_action( 'widgets_init', 'hodophile_register_widgets' );