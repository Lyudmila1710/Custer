<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */
if ( ! function_exists( 'hodophile_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since Hodophile 1.0.0
    */
    function hodophile_add_about_section() {
    	$options = hodophile_get_theme_options();
        // Check if about is enabled on frontpage
        $about_enable = apply_filters( 'hodophile_section_status', true, 'about_section_enable' );

        if ( true !== $about_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'hodophile_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render about section now.
        hodophile_render_about_section( $section_details );
    }
endif;

if ( ! function_exists( 'hodophile_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since Hodophile 1.0.0
    * @param array $input about section details.
    */
    function hodophile_get_about_section_details( $input ) {
        $options = hodophile_get_theme_options();

        
        $content = array();

        $page_id = ! empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
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
// about section content details.
add_filter( 'hodophile_filter_about_section_details', 'hodophile_get_about_section_details' );


if ( ! function_exists( 'hodophile_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since Hodophile 1.0.0
   *
   */
   function hodophile_render_about_section( $content_details = array() ) {
        $options = hodophile_get_theme_options();
        $destinations = ! empty( $options['about_content_destination'] ) ? $options['about_content_destination'] : array();
        $product_cats = ! empty( $options['about_content_product_category'] ) ? $options['about_content_product_category'] : array();

        if ( empty( $content_details ) ) {
            return;
        } 
        

        foreach ( $content_details as $content ) : ?>
            <div id="hodophile_about_section" class="about relative page-section">
                <div class="wrapper">
                    <div class="experience-wrapper">
                        <div class="entry-container">
                            <header class="entry-header">
                                <p class="subtitle">Our Experience</p>
                                <h2 class="entry-title"><?php echo esc_html( $content['title'] ); ?></h2>
                            </header>
                            <div class="entry-content">
                                <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                            </div>

                            <?php if ( ! empty( $content['url'] ) && ! empty( $options['about_btn_title'] ) ) : ?>
                                <div class="discover-now">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn">
                                        <span class="screen-reader-text"><?php echo esc_html( $content['title'] ); ?></span>
                                        <?php echo esc_html( $options['about_btn_title'] ); ?>
                                    </a>
                                </div><!-- .read-more -->
                            <?php endif; ?>

                            <div class="counter clear">
                                <div class="col-3">
                                    <?php for( $i=1; $i <= 3 ; $i++ ): ?>
                                        <?php if ( !empty( $options['about_counter_count_'.$i] ) ): ?>
                                            <article>
                                                <div class="counter-item">
                                                    <h2 class="counter-value"><?php echo esc_html( $options['about_counter_count_'.$i] ); ?></h2>
                                                    <h3 class="counter-title"><?php echo esc_html( $options['about_counter_label_'.$i] ); ?></h3>
                                                </div>
                                            </article>
                                        <?php endif ?>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                        <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');"></div>
                    </div>
                </div><!-- .wrapper -->
            </div>
          
        <?php endforeach;
    }
endif;

