<?php

/**
 * About setup
 *
 * @package xblog
 */

if (!function_exists('real_estate_pack_about_setup')) :

	/**
	 * About setup.
	 *
	 * @since 1.0.0
	 */
	function real_estate_pack_about_setup()
	{
		$theme = wp_get_theme();
		$xtheme_name = $theme->get('Name');
		$theme_slug = 'real-estate-pack';



		$config = array(
			// Menu name under Appearance.
			'menu_name'               => sprintf(esc_html__('%s Info', 'real-estate-pack'), $xtheme_name),
			// Page title.
			'page_name'               => sprintf(esc_html__('%s Info', 'real-estate-pack'), $xtheme_name),
			/* translators: Main welcome title */
			'welcome_title'         => sprintf(esc_html__('Welcome to %s! - Version ', 'real-estate-pack'), $theme['Name']),
			// Main welcome content
			// Welcome content.
			'welcome_content' => sprintf(esc_html__('You are now using the %1$s free version on your website. Transform your website and take it to the next level with Real Estate Pack Pro! ', 'real-estate-pack'), $theme['Name']),

			// Tabs.
			'tabs' => array(
				'getting_started' => esc_html__('Getting Started', 'real-estate-pack'),
				'recommended_actions' => esc_html__('Recommended Actions', 'real-estate-pack'),
				'useful_plugins'  => esc_html__('Useful Plugins', 'real-estate-pack'),
				'free_pro'  => esc_html__('Free Vs Pro', 'real-estate-pack'),
			),

			// Quick links.
			'quick_links' => array(
				'update_url' => array(
					'text'   => esc_html__('UPGRADE REAL ESTATE PACK PRO', 'real-estate-pack'),
					'url'    => 'https://wpthemespace.com/product/real-estate-pack-pro/?add-to-cart=8721',
					'button' => 'danger',
				),
				'xmagazine_url' => array(
					'text'   => esc_html__('VIEW DEMO', 'real-estate-pack'),
					'url'    => 'https://akit.fullsitediting.com/restate',
					'button' => 'danger',
				),


			),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__('Demo Content', 'real-estate-pack'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('Demo content is pro feature. To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'real-estate-pack'), esc_html__('One Click Demo Import', 'real-estate-pack')),
					'button_text' => esc_html__('UPGRADE For  Demo Content', 'real-estate-pack'),
					'button_url'  => 'https://wpthemespace.com/product/real-estate-pack-pro/?add-to-cart=8721',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),

				'two' => array(
					'title'       => esc_html__('Theme Options', 'real-estate-pack'),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__('Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'real-estate-pack'),
					'button_text' => esc_html__('Customize', 'real-estate-pack'),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
				),
				'three' => array(
					'title'       => esc_html__('Show Video', 'real-estate-pack'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('You may show Xblog short video for better understanding', 'real-estate-pack'), esc_html__('One Click Demo Import', 'real-estate-pack')),
					'button_text' => esc_html__('Show video', 'real-estate-pack'),
					'button_url'  => 'https://www.youtube.com/watch?v=Cu3eFFQskCs',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),
				'four' => array(
					'title'       => esc_html__('Theme Documentation', 'real-estate-pack'),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__('Please check our full documentation for detailed information on how to setup and customize the theme.', 'real-estate-pack'),
					'button_text' => esc_html__('View Documentation', 'real-estate-pack'),
					'button_url'  => 'http://wpthemespace.com/xblog/doc/',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),
				'five' => array(
					'title'       => esc_html__('Set Widgets', 'real-estate-pack'),
					'icon'        => 'dashicons dashicons-tagcloud',
					'description' => esc_html__('Set widgets in your sidebar, Offcanvas as well as footer.', 'real-estate-pack'),
					'button_text' => esc_html__('Add Widgets', 'real-estate-pack'),
					'button_url'  => admin_url() . '/widgets.php',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'six' => array(
					'title'       => esc_html__('Theme Preview', 'real-estate-pack'),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__('You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized. Theme demo only work in pro theme', 'real-estate-pack'),
					'button_text' => esc_html__('View Demo', 'real-estate-pack'),
					'button_url'  => 'https://wpthemespace.com/product/colorful-blog',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'seven' => array(
					'title'       => esc_html__('Contact Support', 'real-estate-pack'),
					'icon'        => 'dashicons dashicons-sos',
					'description' => esc_html__('Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'real-estate-pack'),
					'button_text' => esc_html__('Contact Support', 'real-estate-pack'),
					'button_url'  => 'https://wpthemespace.com/support/',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
			),

			'useful_plugins'        => array(
				'description' => esc_html__('Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'real-estate-pack'),
				'already_activated_message' => esc_html__('Already activated', 'real-estate-pack'),
				'version_label' => esc_html__('Version: ', 'real-estate-pack'),
				'install_label' => esc_html__('Install and Activate', 'real-estate-pack'),
				'activate_label' => esc_html__('Activate', 'real-estate-pack'),
				'deactivate_label' => esc_html__('Deactivate', 'real-estate-pack'),
				'content'                   => array(
					array(
						'slug' => 'magical-addons-for-elementor',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-products-display',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-blocks'
					),
					array(
						'slug' => 'magical-posts-display'
					),
					array(
						'slug' => 'click-to-top'
					),
					array(
						'slug' => 'gallery-box',
						'icon' => 'svg',
					),
					array(
						'slug' => 'easy-share-solution',
						'icon' => 'svg',
					),
					array(
						'slug' => 'wp-edit-password-protected',
						'icon' => 'svg',
					),
				),
			),
			// Required actions array.
			'recommended_actions'        => array(
				'install_label' => esc_html__('Install and Activate', 'real-estate-pack'),
				'activate_label' => esc_html__('Activate', 'real-estate-pack'),
				'deactivate_label' => esc_html__('Deactivate', 'real-estate-pack'),
				'content'            => array(
					'magical-blocks' => array(
						'title'       => __('Magical Posts Display', 'real-estate-pack'),
						'description' => __('The best part of Magical Addons is that you can design anything without having to touch a single line of code. Magical Addons has a huge collection of premium and highly functional extensions that can be used in an Elementor page builder. This is really a premium plugin that you can get for free.', 'real-estate-pack'),
						'plugin_slug' => 'magical-addons-for-elementor',
						'id' => 'magical-addons-for-elementor'
					),
					'go-pro' => array(
						'title'       => '<a target="_blank" class="activate-now button button-danger" href="https://wpthemespace.com/product/real-estate-pack-pro/?add-to-cart=8721">' . __('UPGRADE REAL ESTATE PACK PRO', 'real-estate-pack') . '</a>',
						'description' => __('You will get more frequent updates and quicker support with the Pro version.', 'real-estate-pack'),
						'id' => 'go-pro'
					),

				),
			),
			// Free vs pro array.
			'free_pro'                => array(
				'free_theme_name'     => $xtheme_name,
				'pro_theme_name'      => $xtheme_name . __(' Pro', 'real-estate-pack'),
				'pro_theme_link'      => 'https://wpthemespace.com/product/real-estate-pack-pro/?add-to-cart=8721',
				/* translators: View link */
				'get_pro_theme_label' => sprintf(__('Get %s', 'real-estate-pack'), 'real-estate-pack'),
				'features'            => array(
					array(
						'title'       => esc_html__('Daring Design for Devoted Readers', 'real-estate-pack'),
						'description' => esc_html__('Real Estate Pack\'s design helps you stand out from the crowd and create an experience that your readers will love and talk about. With a flexible home page you have the chance to easily showcase appealing content with ease.', 'real-estate-pack'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Mobile-Ready For All Devices', 'real-estate-pack'),
						'description' => esc_html__('Real Estate Pack makes room for your readers to enjoy your articles on the go, no matter the device their using. We shaped everything to look amazing to your audience.', 'real-estate-pack'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Home slider', 'real-estate-pack'),
						'description' => esc_html__('Real Estate Pack gives you extra slider feature. You can create awesome home slider in this theme.', 'real-estate-pack'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Widgetized Sidebars To Keep Attention', 'real-estate-pack'),
						'description' => esc_html__('Real Estate Pack comes with a widget-based flexible system which allows you to add your favorite widgets over the Sidebar as well as on offcanvas too.', 'real-estate-pack'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Multiple Header Layout', 'real-estate-pack'),
						'description' => esc_html__('Real Estate Pack gives you extra ways to showcase your header with miltiple layout option you can change it on the basis of your requirement', 'real-estate-pack'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Banner Slider Options', 'real-estate-pack'),
						'description' => esc_html__('Real Estate Pack\'s PRO version comes with more Slider options to display and filter posts. For instance, you can have far more control on setting the source of the posts or how they are displayed, everything to push the content to the right people and promote it by the blink of an eye.', 'real-estate-pack'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Flexible Home Page Design', 'real-estate-pack'),
						'description' => esc_html__('Real Estate Pack\'s PRO version has more controll available to enable you to place widgets on Footer or Below the Post at the end of your articles.', 'real-estate-pack'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Read Time Calculator and total words counter', 'real-estate-pack'),
						'description' => esc_html__('Minimal Lit\'s PRO verison has a feature to let your viewer know the read time of the standared article you have posted on the basis of words per minute which you can control on your customizer .', 'real-estate-pack'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Customizer Options', 'real-estate-pack'),
						'description' => esc_html__('Advance control for each element gives you different way of customization and maintained you site as you like and makes you feel different.', 'real-estate-pack'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Pagination', 'real-estate-pack'),
						'description' => esc_html__('Multiple Option of pagination via customizer can be obtained on your site like Infinite scroll, Ajax Button On Click, Number as well as classical option are available.', 'real-estate-pack'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('One Click Demo install', 'real-estate-pack'),
						'description' => esc_html__('You can import demo site only one click so you can setup your site like demo very easily.', 'real-estate-pack'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Premium Support and Assistance', 'real-estate-pack'),
						'description' => esc_html__('We offer ongoing customer support to help you get things done in due time. This way, you save energy and time, and focus on what brings you happiness. We know our products inside-out and we can lend a hand to help you save resources of all kinds.', 'real-estate-pack'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('No Credit Footer Link', 'real-estate-pack'),
						'description' => esc_html__('You can easily remove the Theme: Real Estate Pack by xblog copyright from the footer area and make the theme yours from start to finish.', 'real-estate-pack'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
				),
			),

		);

		real_estate_pack_About::init($config);
	}

endif;

add_action('after_setup_theme', 'real_estate_pack_about_setup');


/**
 * Pro notice text
 *
 */
function real_estate_pack_pnotice_output()
{

?>
	<div class="mgadin-hero">
		<div class="mge-info-content">
			<div class="mge-info-hello">
				<?php
				$current_theme = wp_get_theme();
				$current_theme_name = $current_theme->get('Name');
				$current_user = wp_get_current_user();
				$pro_link = 'https://wpthemespace.com/product/real-estate-pack-pro/?add-to-cart=8721';
				$demo_link = 'https://wpthemespace.com/product/real-estate-pack-pro/';

				esc_html_e('Hello, ', 'real-estate-pack');
				echo esc_html($current_user->display_name);
				?>

				<?php esc_html_e('👋🏻', 'real-estate-pack'); ?>
			</div>
			<div class="mge-info-desc">
				<div><?php printf(esc_html__('Thanks for choosing %1$s.Introducing the Real Estate Pack Pro WordPress theme. With advanced SEO optimization, lightning-fast speed, and stunning animations, this theme is designed to help you stand out from the crowd and attract more clients to your business. Plus, our advanced form makes it easy to capture leads and grow your business online. Upgrade to Real Estate Pack Pro today and take your real estate business to the next level!', 'real-estate-pack'), $current_theme_name); ?></div>
				<div class="mge-offer"><?php printf(esc_html__('Ready for some serious savings? Our opening price is an unbeatable $21', 'real-estate-pack'), $current_theme_name); ?></div>
			</div>
			<div class="mge-info-actions">
				<a href="<?php echo esc_url($pro_link); ?>" target="_blank" class="button button-primary upgrade-btn">
					<?php esc_html_e('Upgrade Pro', 'real-estate-pack'); ?>
				</a>
				<a href="<?php echo esc_url($demo_link); ?>" target="_blank" class="button button-primary demo-btn">
					<?php esc_html_e('View Demo', 'real-estate-pack'); ?>
				</a>
				<button class="button button-info btnend"><?php esc_html_e('Dismiss this notice', 'real-estate-pack') ?></button>
			</div>

		</div>

	</div>
<?php
}


//Admin notice 
function real_estate_pack_new_optins_texts()
{
	$hide_date = get_option('real_estate_pack_proinfo_hidedate1');
	if (!empty($hide_date)) {
		$clickhide = round((time() - strtotime($hide_date)) / 24 / 60 / 60);
		if ($clickhide < 25) {
			return;
		}
	}

	/* $install_date = get_option('real_estate_pack_theme_install_date');
	if (!empty($install_date)) {
		$install_day = round((time() - strtotime($install_date)) / 24 / 60 / 60);
		if ($install_day < 1) {
			return;
		}
	} */

?>
	<div class="mgadin-notice notice notice-success mgadin-theme-dashboard mgadin-theme-dashboard-notice mge is-dismissible meis-dismissible">
		<?php real_estate_pack_pnotice_output(); ?>
	</div>
<?php

}
add_action('admin_notices', 'real_estate_pack_new_optins_texts');

function real_estate_pack_new_optins_texts_init()
{
	$install_date = get_option('real_estate_pack_theme_install_date');
	if (empty($install_date)) {
		update_option('real_estate_pack_theme_install_date', current_time('mysql'));
	}

	if (isset($_GET['xbnotice']) && $_GET['xbnotice'] == 1) {
		update_option('real_estate_pack_proinfo_hidedate1', current_time('mysql'));
	}
}
add_action('init', 'real_estate_pack_new_optins_texts_init');
