<?php
/**
 * Trip Search section
 *
 * This is the template for the content of trip_search section
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */
if ( ! function_exists( 'hodophile_add_trip_search_section' ) ) :
    /**
    * Add trip_search section
    *
    *@since Hodophile 1.0.0
    */
    function hodophile_add_trip_search_section() {
    	$options = hodophile_get_theme_options();
        // Check if trip_search is enabled on frontpage
        $trip_search_enable = apply_filters( 'hodophile_section_status', true, 'trip_search_section_enable' );

        if ( true !== $trip_search_enable || ! class_exists( 'WP_Travel' ) ) {
            return false;
        }

        // Render trip_search section now.
        hodophile_render_trip_search_section();
    }
endif;

if ( ! function_exists( 'hodophile_render_trip_search_section' ) ) :
  /**
   * Start trip_search section
   *
   * @return string trip_search content
   * @since Hodophile 1.0.0
   *
   */
   function hodophile_render_trip_search_section() {
        if ( ! class_exists('WP_Travel') ) 
            return;
                
        $options = hodophile_get_theme_options();

        ?>
        <div id="hodophile_trip_search_section" class="page-section">
          <div class="wrapper">
              <div class="section-header">
                  <?php if ( !empty( $options['trip_search_title'] ) ): ?>
                    <h2 class="section-title"><?php echo esc_html( $options['trip_search_title'] ); ?></h2>
                  <?php endif ?>
                  <?php if ( !empty( $options['trip_search_sub_title'] ) ): ?>
                    <p class="section-subtitle"><?php echo esc_html( $options['trip_search_sub_title'] ); ?></p>
                  <?php endif ?>
                 
              </div>
              <div class="wp-travel-search">
                  <?php wptravel_search_form(); ?> 
              </div><!-- wp-travel-filter -->
          </div><!-- .wrapper -->      
        </div>
    <?php }
endif;