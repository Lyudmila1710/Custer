<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Real Estate Pack
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'real-estate-pack'); ?></a>
		<header class="header" id="header">
			<?php do_action('real_estate_pack_mobile_menu'); ?>

			<?php
			if (get_theme_mod('real_estate_pack_headertop_show')) {
				do_action('real_estate_pack_header_logo');
			}

			?>
			<?php do_action('real_estate_pack_main_menu'); ?>
		</header>
		<?php
		$real_estate_pack_intro_show = get_theme_mod('real_estate_pack_intro_show');
		if ($real_estate_pack_intro_show && (is_home() || is_front_page())) {
			do_action('real_estate_pack_profile_intro');
		}

		?>