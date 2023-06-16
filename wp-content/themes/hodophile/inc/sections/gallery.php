<?php
/**
 * gallery section
 *
 * This is the template for the content of gallery section
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */
if ( ! function_exists( 'hodophile_add_gallery_section' ) ) :
    /**
    * Add gallery section
    *
    *@since Hodophile 1.0.0
    */
    function hodophile_add_gallery_section() {
    	$options = hodophile_get_theme_options();
        // Check if gallery is enabled on frontpage
        $gallery_enable = apply_filters( 'hodophile_section_status', true, 'gallery_section_enable' );

        if ( true !== $gallery_enable ) {
            return false;
        }

        // Render gallery section now.
        hodophile_render_gallery_section( );
    }
endif;

if ( ! function_exists( 'hodophile_render_gallery_section' ) ) :
  /**
   * Start gallery section
   *
   * @return string gallery content
   * @since Hodophile 1.0.0
   *
   */
   function hodophile_render_gallery_section( ) {
        $options = hodophile_get_theme_options();

        $image_count = 8;

        $row_count = $image_count/4;

        if(is_float($row_count)){
            $row_count = intval($row_count) + 1;
        }


    ?>
        <div id="hodophile_gallery_section" class="relative page-section same-background">
            <div class="wrapper">
                <div class="section-header">
                    <?php if ( !empty( $options['gallery_title'] ) ): ?>
                        <h2 class="section-title"><?php echo esc_html( $options['gallery_title'] ); ?></h2>
                    <?php endif ?>
                    <?php if ( !empty( $options['gallery_short_description'] ) ): ?>
                          <p class="section-subtitle"><?php echo esc_html( $options['gallery_short_description'] ); ?></p>
                    <?php endif ?>       
                </div>
            </div>
            <div class="gallery-wrapper clear">
                <?php $col_count = 1; for ($i=1; $i <= $row_count ; $i++) { 
                    if ( $i%2 == 0 ) {
                       $class = 'second-gallery';
                    }else{
                        $class = 'first-gallery';
                    }
                ?>
                    <ul class="<?php echo esc_attr( $class ); ?>">
                        <?php for( $j=$col_count; $j <= $image_count ; $j++ ) { ?>
                            <?php if ( !empty( $options['gallery_image_'.$j] ) ): ?>
                                <li><img src="<?php echo esc_url( $options['gallery_image_'.$j] );?>"></li>
                            <?php endif ?>                            
                        <?php 
                                if( $j%4 == 0 ){
                                    $col_count = $col_count + 4;
                                    break;
                                }
                            } 
                        ?>
                    </ul>
                <?php } ?>
                <?php if ( !empty( $options['gallery_btn_title'] ) && !empty( $options['gallery_btn_url'] ) ): ?>
                    <div class="view-more">
                        <a href="<?php echo esc_url( $options['gallery_btn_url'] ); ?>" class="btn"><?php echo esc_html( $options['gallery_btn_title'] ) ?></a>
                    </div>
                <?php endif ?>
                
            </div>
        </div>            
    <?php }
endif;