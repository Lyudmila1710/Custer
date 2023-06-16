<?php
/**
 * Featured section
 *
 * This is the template for the content of featured section
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */
if ( ! function_exists( 'hodophile_add_hero_banner_section' ) ) :
    /**
    * Add featured section
    *
    *@since Hodophile 1.0.0
    */
    function hodophile_add_hero_banner_section() {
    	$options = hodophile_get_theme_options();
        // Check if destination is enabled on frontpage
        $hero_banner_enable = apply_filters( 'hodophile_section_status', true, 'hero_banner_section_enable' );

        if ( true !== $hero_banner_enable ) {
            return false;
        }
        // Get destination section details
        $section_details = array();
        $section_details = apply_filters( 'hodophile_filter_hero_banner_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }
        
        // Render destination section now.
        hodophile_render_hero_banner_section( $section_details );
    }
endif;

if ( ! function_exists( 'hodophile_get_hero_banner_section_details' ) ) :
    /**
    * featured section details.
    *
    * @since Hodophile 1.0.0
    * @param array $input featured section details.
    */
    function hodophile_get_hero_banner_section_details( $input ) {
        $options = hodophile_get_theme_options();

        // Content type.
        $hero_banner_content_type  = $options['hero_banner_content_type'];
        $hero_banner_count = 5;
        
        $content = array();
        switch ( $hero_banner_content_type ) {
        	
            case 'category':
                for ( $i = 1; $i <= $hero_banner_count; $i++ ) {

                    if ( ! empty( $options['hero_banner_content_category_' . $i] ) ){
                        $page_post['id']      = $options['hero_banner_content_category_' . $i];
                        $terms = get_term_by( 'id',  $page_post['id'], 'category' );

                        if ( ! empty( $terms ) && !is_wp_error($terms)) :
                            $page_post['title']   = $terms->name;
                            $page_post['url']     = get_category_link( $page_post['id'] );
                            $page_post['count']   = $terms->count;
                            $page_post['image'] = ! empty( $options['hero_banner_background_image_' . $i] ) ? $options['hero_banner_background_image_' . $i] : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
                        endif;
                    }
                    if ( ! empty(  $options['hero_banner_content_category_' . $i] ) )
                        array_push( $content, $page_post );
                }                     
            break;

            case 'trip-types': // trip-types
                if ( ! class_exists( 'WP_Travel' ) )
                    return;

                for ( $i = 1; $i <= $hero_banner_count; $i++ ) {
                    if ( ! empty( $options['hero_banner_content_trip_types_' . $i] ) ){
                        $page_post['id']      = $options['hero_banner_content_trip_types_' . $i];
                        $cat_image = get_term_meta( $page_post['id'], 'wp_travel_trip_type_image_id', true);
                        
                        $terms = get_term_by( 'id',  $page_post['id'], 'itinerary_types' );
                        
                        if ( ! empty( $terms ) && !is_wp_error($terms)) :
                            $page_post['title']   = $terms->name;
                            $page_post['url']     = get_term_link( $page_post['id'], 'itinerary_types' );
                            $page_post['count']   = $terms->count;
                            $page_post['image'] = ! empty( $cat_image ) ? wp_get_attachment_url( $cat_image ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
                        endif;
                    }
                    if ( ! empty(  $options['hero_banner_content_trip_types_' . $i] ) )
                        array_push( $content, $page_post );
                }
                     
            break;


            default:
            break;
        }

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// destination section content details.
add_filter( 'hodophile_filter_hero_banner_section_details', 'hodophile_get_hero_banner_section_details' );


if ( ! function_exists( 'hodophile_render_hero_banner_section' ) ) :
  /**
   * Start destination section
   *
   * @return string destination content
   * @since Hodophile 1.0.0
   *
   */
   function hodophile_render_hero_banner_section( $content_details = array() ) {
        $options = hodophile_get_theme_options();
        $hero_banner_content_type  = $options['hero_banner_content_type'];


        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="hodophile_hero_banner" class="page-section">
            <div class="content">
                <div class="wrapper">
                    <div class="entry-container">
                        <?php if ( !empty( $options['hero_banner_sub_title'] ) ): ?>
                            <p class="title"><?php echo esc_html( $options['hero_banner_sub_title'] ); ?></p>
                        <?php endif ?>
                        <?php if ( !empty( $options['hero_banner_title'] ) ): ?>
                             <header class="entry-header">
                                <h2 class="entry-title"><?php echo esc_html( $options['hero_banner_title'] ); ?></h2>
                            </header>
                        <?php endif ?>
                        <?php if ( !empty( $options['hero_banner_content'] ) ): ?>
                            <div class="entry-content">
                                <p><?php echo esc_html( $options['hero_banner_content'] ); ?></p>
                            </div>
                        <?php endif ?>
                       
                        <?php if ( !empty( $options['hero_banner_btn_label'] ) ): ?>
                            <div class="discover-now">
                                <a href="<?php echo esc_url( $options['hero_banner_btn_url'] ); ?>" class="btn"><?php echo esc_html( $options['hero_banner_btn_label'] ); ?></a>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div><!-- .content -->

            <div class="image grid clear">
                <?php foreach ( $content_details as $content ) : ?>
                    <article class="grid-item clear" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                        <div class="overlay"></div>
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url($content['url']); ?>"><?php echo esc_html($content['title']); ?></a></h2>
                        </header>
                    </article>
                <?php endforeach; ?>
            </div><!-- .wrapper -->
        </div><!-- #hodophile_hero_banner -->
       
    <?php }
endif;