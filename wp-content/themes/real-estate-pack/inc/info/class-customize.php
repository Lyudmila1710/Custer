<?php

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class real_estate_pack_pro_Customize
{

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance()
	{

		static $instance = null;

		if (is_null($instance)) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct()
	{
	}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions()
	{

		// Register panels, sections, settings, controls, and partials.
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the controls.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections($manager)
	{
		$theme = wp_get_theme();
		$xtheme_name = $theme->get('Name');

		// Load custom sections.
		require get_template_directory() . '/inc/info/section-pro.php';

		// Register custom section types.
		$manager->register_section_type('real_estate_pack_pro_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new real_estate_pack_pro_Customize_Section_Pro(
				$manager,
				'real_estate_pack_pro',
				array(
					'title'    => sprintf(esc_html__('Available %1s Pro ', 'real-estate-pack'), $xtheme_name),
					'pro_text' => esc_html__('Go Pro', 'real-estate-pack'),
					'pro_url'  => 'https://wpthemespace.com/product/real-estate-pack-pro/?add-to-cart=8721',
					'priority' => 10,
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts()
	{

		wp_enqueue_script('xblog-pro-customize-controls', trailingslashit(get_template_directory_uri()) . 'inc/info/customize-controls.js', array('customize-controls'));

		wp_enqueue_style('xblog-pro-customize-controls', trailingslashit(get_template_directory_uri()) . 'inc/info/customize-controls.css');
	}
}

// Doing this customizer thang!
real_estate_pack_pro_Customize::get_instance();
