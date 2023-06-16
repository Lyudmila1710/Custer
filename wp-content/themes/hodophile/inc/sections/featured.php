<?php
/**
 * featured section
 *
 * This is the template for the content of featured section
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */
if ( ! function_exists( 'hodophile_add_featured_section' ) ) :
    /**
    * Add featured section
    *
    *@since Hodophile 1.0.0
    */
    function hodophile_add_featured_section() {
    	$options = hodophile_get_theme_options();
        // Check if featured is enabled on frontpage
        $featured_enable = apply_filters( 'hodophile_section_status', true, 'featured_section_enable' );

        if ( true !== $featured_enable ) {
            return false;
        }
        // Get featured section details
        $section_details = array();
        $section_details = apply_filters( 'hodophile_filter_featured_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render featured section now.
        hodophile_render_featured_section( $section_details );
    }
endif;

if ( ! function_exists( 'hodophile_get_featured_section_details' ) ) :
    /**
    * featured section details.
    *
    * @since Hodophile 1.0.0
    * @param array $input featured section details.
    */
    function hodophile_get_featured_section_details( $input ) {
        $options = hodophile_get_theme_options();
        
        $content = array();

        $page_id = ! empty( $options['featured_content_page'] ) ? $options['featured_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    
       
        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['excerpt']   = hodophile_trim_content( 35 );
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : get_template_directory_uri().'./assets/uploads/no-featured-image-590x650.jpg';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// featured section content details.
add_filter( 'hodophile_filter_featured_section_details', 'hodophile_get_featured_section_details' );


if ( ! function_exists( 'hodophile_render_featured_section' ) ) :
  /**
   * Start featured section
   *
   * @return string featured content
   * @since Hodophile 1.0.0
   *
   */
   function hodophile_render_featured_section( $content_details = array() ) {
        $options = hodophile_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } 
        foreach ( $content_details as $content ) : ?>

            <div id="hodophile_featured_section" class="relative page-section same-background">
                <div class="wrapper">
                    <div class="download-data-wrapper">
                        <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');"></div>
                        <div class="entry-container">
                            <header class="entry-header">
                                <?php if ( !empty( $options['featured_sub_title'] ) ): ?>
                                    <p class="subtitle"><?php echo esc_html( $options['featured_sub_title'] ) ?></p>
                                <?php endif ?>
                               
                                <h2 class="entry-title"><?php echo esc_html( $content['title'] ); ?></h2>
                            </header>
                            <div class="entry-content">
                                <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                            </div>

                            <div class="discover-now">
                                <?php if ( !empty( $options['featured_btn_image_1'] ) && !empty( $options['featured_btn_link_1'] ) ): ?>
                                    <a href="<?php echo esc_url( $options['featured_btn_link_1'] ) ?>"><img src="<?php echo esc_url( $options['featured_btn_image_1'] ) ?>"></a>
                                <?php endif ?>
                                <?php if ( !empty( $options['featured_btn_image_2'] ) && !empty( $options['featured_btn_link_2'] ) ): ?>
                                    <a href="<?php echo esc_url( $options['featured_btn_link_2'] ) ?>"><img src="<?php echo esc_url( $options['featured_btn_image_2'] ) ?>"></a>
                                <?php endif ?>
                            </div>
                        </div>
                        
                    </div>
                </div><!-- .wrapper -->
            </div>
          
        <?php endforeach;
    }
endif;

