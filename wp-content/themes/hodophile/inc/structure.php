<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

$options = hodophile_get_theme_options();


if ( ! function_exists( 'hodophile_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Hodophile 1.0.0
	 */
	function hodophile_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'hodophile_doctype', 'hodophile_doctype', 10 );


if ( ! function_exists( 'hodophile_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Hodophile 1.0.0
	 *
	 */
	function hodophile_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'hodophile_before_wp_head', 'hodophile_head', 10 );

if ( ! function_exists( 'hodophile_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Hodophile 1.0.0
	 *
	 */
	function hodophile_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'hodophile' ); ?></a>

		<?php
	}
endif;
add_action( 'hodophile_page_start_action', 'hodophile_page_start', 10 );

if ( ! function_exists( 'hodophile_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Hodophile 1.0.0
	 *
	 */
	function hodophile_header_start() {
		?>
		<div class="menu-overlay"></div>
		<header id="masthead" class="site-header" role="banner">
		<?php
	}
endif;
add_action( 'hodophile_header_action', 'hodophile_header_start', 20 );

if ( ! function_exists( 'hodophile_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Hodophile 1.0.0
	 *
	 */
	function hodophile_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'hodophile_page_end_action', 'hodophile_page_end', 10 );

if ( ! function_exists( 'hodophile_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Hodophile 1.0.0
	 *
	 */
	function hodophile_site_branding() {
		$options  = hodophile_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		
		?>
		<div class="wrapper">
		<div class="site-branding">
			<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php } 
			if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
				<div id="site-identity">
					<?php
					if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
						if ( hodophile_is_latest_posts() || hodophile_is_frontpage() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;
					} 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
						<?php
						endif; 
					}?>
				</div>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<?php
	}
endif;
add_action( 'hodophile_header_action', 'hodophile_site_branding', 20 );

if ( ! function_exists( 'hodophile_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Hodophile 1.0.0
	 *
	 */
	function hodophile_site_navigation() {
		$options = hodophile_get_theme_options();
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php
					echo hodophile_get_svg( array( 'icon' => 'menu' ) );
					echo hodophile_get_svg( array( 'icon' => 'close' ) );
				?>					
			</button>

			<?php  
				$first_btn_label = !empty( $options['menu_first_btn_label'] ) ? $options['menu_first_btn_label'] : '';
				$first_btn_url = !empty( $options['menu_first_btn_url'] ) ? $options['menu_first_btn_url'] : '#';

				$second_btn_label = !empty( $options['menu_second_btn_label'] ) ? $options['menu_second_btn_label'] : '';
				$second_btn_url = !empty( $options['menu_second_btn_url'] ) ? $options['menu_second_btn_url'] : '#';
				$header_btn = '';
				if ( $options['primary_menu_header_button_enable'] ) :            	
					$header_btn .= '<li class="header-button"><ul>';
					
					if ( !empty( $first_btn_label ) ) {
						$header_btn .= '<li class="first"><a href="'. esc_url( $first_btn_url ) .'" class="btn">'. esc_html( $first_btn_label ).'</a></li>';
					}
					if ( !empty( $second_btn_label ) ) {
						$header_btn .= '<li class="second"><a href="'. esc_url( $second_btn_url ) .'" class="btn">'. esc_html( $second_btn_label ) .'</a></li>';
					}
					
					$header_btn .= '</ul></li>';
                endif;
        	
        		wp_nav_menu( array(
        			'theme_location' => 'primary',
        			'container' => 'div',
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'primary-menu',
        			'echo' => true,
        			'fallback_cb' => 'hodophile_menu_fallback_cb',
        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $header_btn . '</ul>',
        		) );
        	?>
		</nav><!-- #site-navigation -->
		</div><!-- .wrapper -->
		<?php
	}
endif;
add_action( 'hodophile_header_action', 'hodophile_site_navigation', 30 );


if ( ! function_exists( 'hodophile_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Hodophile 1.0.0
	 *
	 */
	function hodophile_header_end() {
		?>
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'hodophile_header_action', 'hodophile_header_end', 50 );

if ( ! function_exists( 'hodophile_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Hodophile 1.0.0
	 *
	 */
	function hodophile_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'hodophile_content_start_action', 'hodophile_content_start', 10 );

if ( ! function_exists( 'hodophile_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Hodophile 1.0.0
	 *
	 */
	function hodophile_header_image() {
		if ( hodophile_is_frontpage() )
			return;
		$header_image = get_header_image();
		$class = '';
		if ( is_singular() ) :
			$class = ( has_post_thumbnail() || ! empty( $header_image ) ) ? '' : 'header-media-disabled';
		else :
			$class = ! empty( $header_image ) ? '' : 'header-media-disabled';
		endif;
		
		if ( is_singular() && has_post_thumbnail() ) : 
			$header_image = get_the_post_thumbnail_url( get_the_id(), 'full' );
    	endif; ?>

    	<div id="page-site-header" class="relative <?php echo esc_attr( $class ); ?>" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="header-wrapper">
	            <div class="wrapper">
	                <header class="page-header">
	                    <?php hodophile_custom_header_banner_title(); ?>
	                </header>

	                <?php hodophile_add_breadcrumb(); ?>
	            </div><!-- .wrapper -->
            </div><!-- .header-wrapper -->
        </div><!-- #page-site-header -->

	<?php
	}
endif;
add_action( 'hodophile_header_image_action', 'hodophile_header_image', 10 );

if ( ! function_exists( 'hodophile_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Hodophile 1.0.0
	 */
	function hodophile_add_breadcrumb() {
		$options = hodophile_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( hodophile_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * hodophile_simple_breadcrumb hook
				 *
				 * @hooked hodophile_simple_breadcrumb -  10
				 *
				 */
				do_action( 'hodophile_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;

if ( ! function_exists( 'hodophile_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Hodophile 1.0.0
	 *
	 */
	function hodophile_content_end() {
		?>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'hodophile_content_end_action', 'hodophile_content_end', 10 );

if ( ! function_exists( 'hodophile_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Hodophile 1.0.0
	 *
	 */
	function hodophile_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'hodophile_footer', 'hodophile_footer_start', 10 );

if ( ! function_exists( 'hodophile_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Hodophile 1.0.0
	 *
	 */
	function hodophile_footer_site_info() {
		$options = hodophile_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );
        $options['powered_by_text'] = str_replace( $search, $replace, $options['powered_by_text'] );

		$copyright_text = $options['copyright_text']; 
		$powered_by_text = $options['powered_by_text'];
		?>
		<div class="site-info">
            <div class="wrapper">
                <span>
                	<?php 
                	echo hodophile_santize_allow_tag( $copyright_text ); 
                	if ( function_exists( 'the_privacy_policy_link' ) ) {
						the_privacy_policy_link( ' | ' );
					}
					echo hodophile_santize_allow_tag( $powered_by_text );
                	?>
            	</span>
            </div><!-- .wrapper -->    
        </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'hodophile_footer', 'hodophile_footer_site_info', 40 );

if ( ! function_exists( 'hodophile_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Hodophile 1.0.0
	 *
	 */
	function hodophile_footer_scroll_to_top() {
		$options  = hodophile_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo hodophile_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'hodophile_footer', 'hodophile_footer_scroll_to_top', 40 );

if ( ! function_exists( 'hodophile_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Hodophile 1.0.0
	 *
	 */
	function hodophile_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'hodophile_footer', 'hodophile_footer_end', 100 );


if ( ! function_exists( 'hodophile_infinite_loader_spinner' ) ) :
	/**
	 *
	 * @since Hodophile 1.0.0
	 *
	 */
	function hodophile_infinite_loader_spinner() { 
		global $post;
		$options = hodophile_get_theme_options();
		if ( $options['pagination_type'] == 'infinite' ) :
			if ( count( $post ) > 0 ) {
				echo '<div class="blog-loader">' . hodophile_get_svg( array( 'icon' => 'spinner-umbrella' ) ) . '</div>';
			}
		endif;
	}
endif;
add_action( 'hodophile_infinite_loader_spinner_action', 'hodophile_infinite_loader_spinner', 10 );
