<?php
/**
 * cta section
 *
 * This is the template for the content of cta section
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */
if ( ! function_exists( 'hodophile_add_cta_section' ) ) :
    /**
    * Add cta section
    *
    *@since Hodophile 1.0.0
    */
    function hodophile_add_cta_section() {
    	$options = hodophile_get_theme_options();
        // Check if cta is enabled on frontpage
        $cta_enable = apply_filters( 'hodophile_section_status', true, 'cta_section_enable' );

        if ( true !== $cta_enable ) {
            return false;
        }

        // Render cta section now.
        hodophile_render_cta_section( );
    }
endif;



if ( ! function_exists( 'hodophile_render_cta_section' ) ) :
  /**
   * Start cta section
   *
   * @return string cta content
   * @since Hodophile 1.0.0
   *
   */
   function hodophile_render_cta_section( ) {
        $options = hodophile_get_theme_options();
    ?>
        <div id="hodophile_cta_section" >
            <div id="hodophile_get_started" class="relative page-section">
                <div class="wrapper">
                    <div class="section-header">
                        <?php if ( !empty( $options['cta_title'] ) ): ?>
                            <h2 class="section-title"><?php echo esc_html( $options['cta_title'] ); ?></h2>
                        <?php endif ?>
                        <?php if ( !empty( $options['cta_description'] ) ): ?>
                            <p class="section-subtitle"><?php echo esc_html( $options['cta_description'] ); ?></p>
                        <?php endif ?>
                        
                        
                    </div>
                    <?php if ( !empty( $options['cta_btn_title'] ) ): ?>
                        <div class="discover-now">
                            <a href="<?php echo esc_url( $options['cta_btn_title'] ); ?>" class="btn"><?php echo esc_html( $options['cta_btn_title'] ); ?></a>
                        </div>
                    <?php endif ?>
                    
                </div><!-- .wrapper -->
            </div>
            
        </div>
          
    <?php
    }
endif;

