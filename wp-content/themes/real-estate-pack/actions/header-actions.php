<?php

/**
 * The file for header all actions
 *
 *
 * @package Real Estate Pack
 */

function real_estate_pack_header_logo_output()
{
	$real_estate_pack_mlogo_show = get_theme_mod('real_estate_pack_mlogo_show', 1);
	$real_estate_pack_search_show = get_theme_mod('real_estate_pack_search_show', 1);
	$real_estate_pack_header_social_show = get_theme_mod('real_estate_pack_header_social_show');
	$real_estate_pack_hfacebook_link = get_theme_mod('real_estate_pack_hfacebook_link');
	$real_estate_pack_htwitter_link = get_theme_mod('real_estate_pack_htwitter_link');
	$real_estate_pack_hlinkedin_link = get_theme_mod('real_estate_pack_hlinkedin_link');
	$real_estate_pack_hyoutube_link = get_theme_mod('real_estate_pack_hyoutube_link');
	$real_estate_pack_hpinterest_link = get_theme_mod('real_estate_pack_hpinterest_link');
	$real_estate_pack_hinstagram_link = get_theme_mod('real_estate_pack_hinstagram_link');

	if ($real_estate_pack_search_show && $real_estate_pack_header_social_show) {
		$real_estate_pack_logo_col = '4';
		$real_estate_pack_search_col = '5';
		$real_estate_pack_social_col = '3';
	} elseif ($real_estate_pack_header_social_show) {
		$real_estate_pack_logo_col = '8';
		$real_estate_pack_search_col = ' ';
		$real_estate_pack_social_col = '4';
	} elseif ($real_estate_pack_search_show) {
		$real_estate_pack_logo_col = '7';
		$real_estate_pack_search_col = '5';
		$real_estate_pack_social_col = ' ';
	} else {
		$real_estate_pack_logo_col = '12';
		$real_estate_pack_search_col = ' ';
		$real_estate_pack_social_col = ' ';
	}

?>
	<div class="header-middle">
		<div class="container">
			<div class="header-middle-all-content">
				<div class="row">
					<div class="col-lg-<?php echo esc_attr($real_estate_pack_logo_col); ?>">
						<?php
						if ($real_estate_pack_mlogo_show) {
							real_estate_pack_logo_output();
						}
						?>
					</div>
					<?php if ($real_estate_pack_search_show) : ?>
						<div class="col-lg-<?php echo esc_attr($real_estate_pack_search_col); ?>">
							<div class="npaper search-box">
								<?php echo get_search_form(); ?>

							</div>
						</div>
					<?php endif; ?>
					<?php if ($real_estate_pack_header_social_show) : ?>
						<div class="col-lg-<?php echo esc_attr($real_estate_pack_social_col); ?>">
							<div class="header-links">
								<div class="social-links">
									<?php if ($real_estate_pack_hfacebook_link) : ?>
										<a href="<?php echo esc_url($real_estate_pack_hfacebook_link); ?>"><i class="fab fa-facebook-f"></i></a>
									<?php endif; ?>
									<?php if ($real_estate_pack_htwitter_link) : ?>
										<a href="<?php echo esc_url($real_estate_pack_htwitter_link); ?>"><i class="fab fa-twitter"></i></a>
									<?php endif; ?>
									<?php if ($real_estate_pack_hlinkedin_link) : ?>
										<a href="<?php echo esc_url($real_estate_pack_hlinkedin_link); ?>"><i class="fab fa-linkedin-in"></i></a>
									<?php endif; ?>
									<?php if ($real_estate_pack_hyoutube_link) : ?>
										<a href="<?php echo esc_url($real_estate_pack_hyoutube_link); ?>"><i class="fab fa-youtube"></i></a>
									<?php endif; ?>
									<?php if ($real_estate_pack_hpinterest_link) : ?>
										<a href="<?php echo esc_url($real_estate_pack_hpinterest_link); ?>"><i class="fab fa-pinterest"></i></a>
									<?php endif; ?>
									<?php if ($real_estate_pack_hinstagram_link) : ?>
										<a href="<?php echo esc_url($real_estate_pack_hinstagram_link); ?>"><i class="fab fa-instagram"></i></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php
}
add_action('real_estate_pack_header_logo', 'real_estate_pack_header_logo_output');

// Real Estate Pack mene style
function real_estate_pack_main_menu_output()
{
	$real_estate_pack_menubar_show = get_theme_mod('real_estate_pack_menubar_show', 1);
	if (empty($real_estate_pack_menubar_show)) {
		return;
	}

	$real_estate_pack_menubarlogo_show = get_theme_mod('real_estate_pack_menubarlogo_show', 1);
	$real_estate_pack_mainmenu_show = get_theme_mod('real_estate_pack_mainmenu_show', 1);
	$real_estate_pack_menusearch_show = get_theme_mod('real_estate_pack_menusearch_show', 1);

?>
	<div class="menu-bar ">
		<div class="container">
			<div class="menubar-content">
				<?php
				if ($real_estate_pack_menubarlogo_show) {
					real_estate_pack_logo_output();
				}
				?>
				<div class="real-estate-pack-container menu-inner">
					<?php if ($real_estate_pack_mainmenu_show) : ?>
						<nav id="site-navigation" class="main-navigation">
							<?php
							wp_nav_menu(array(
								'theme_location' => 'main-menu',
								'menu_id'        => 'real-estate-pack-menu',
								'menu_class'        => 'real-estate-pack-menu',
							));
							?>
						</nav><!-- #site-navigation -->
					<?php endif; ?>
					<?php if ($real_estate_pack_menusearch_show) : ?>
						<div class="serach-show">
							<div class="besearch-icon">
								<a href="#" id="besearch"><i class="fas fa-search"></i></a>
							</div>
							<div id="bspopup" class="soff">
								<div id="affsearch" class="sopen">
									<?php get_search_form(); ?>
									<button data-widget="remove" id="removeClass" class="sclose" type="button">×</button>

								</div>
							</div>
						</div>
				</div>
			<?php endif; ?>

			</div>

		</div>
	</div>

<?php
}
add_action('real_estate_pack_main_menu', 'real_estate_pack_main_menu_output');



// Real Estate Pack mene style
function real_estate_pack_mobile_menu_output()
{
?>
	<div id="wsm-menu" class="mobile-menu-bar wsm-menu">
		<div class="container">
			<nav id="mobile-navigation" class="mobile-navigation">
				<button id="mmenu-btn" class="menu-btn" aria-expanded="false">
					<span class="mopen"><?php esc_html_e('Menu', 'real-estate-pack'); ?></span>
					<span class="mclose"><?php esc_html_e('Close', 'real-estate-pack'); ?></span>
				</button>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'main-menu',
					'menu_id'        => 'wsm-menu-ul',
					'menu_class'        => 'wsm-menu-has',
				));
				?>
			</nav><!-- #site-navigation -->
		</div>
	</div>

<?php
}
add_action('real_estate_pack_mobile_menu', 'real_estate_pack_mobile_menu_output');


function real_estate_pack_logo_output()
{
	$real_estate_pack_hide_tagline = get_theme_mod('real_estate_pack_hide_tagline');
?>
	<div class="head-logo-sec">
		<?php if (has_custom_logo()) : ?>
			<div class="site-branding brand-logo">
				<?php the_custom_logo(); ?>
			</div>
		<?php endif; ?>
		<?php
		if (display_header_text() == true || (display_header_text() == true && is_customize_preview())) : ?>
			<div class="site-branding brand-text">
				<?php if (display_header_text() == true || (display_header_text() == true && is_customize_preview())) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<?php
					$real_estate_pack_description = get_bloginfo('description', 'display');
					if (($real_estate_pack_description || is_customize_preview()) && empty($real_estate_pack_hide_tagline)) :
					?>
						<p class="site-description"><?php echo $real_estate_pack_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
													?></p>
					<?php endif; ?>
				<?php endif; ?>

			</div><!-- .site-branding -->
		<?php endif; ?>
	</div>
<?php
}
