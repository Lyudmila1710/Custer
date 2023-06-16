<?php
/**
 * Popular Destination section
 *
 * This is the template for the content of popular destination section
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */
if ( ! function_exists( 'hodophile_add_popular_destination_section' ) ) :
    /**
    * Add popular destination section
    *
    *@since Hodophile 1.0.0
    */
    function hodophile_add_popular_destination_section() {
    	$options = hodophile_get_theme_options();
        // Check if destination is enabled on frontpage
        $popular_destination_enable = apply_filters( 'hodophile_section_status', true, 'popular_destination_section_enable' );

        if ( true !== $popular_destination_enable ) {
            return false;
        }
        // Get destination section details
        $section_details = array();
        $section_details = apply_filters( 'hodophile_filter_popular_destination_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render destination section now.
        hodophile_render_popular_destination_section( $section_details );
    }
endif;

if ( ! function_exists( 'hodophile_get_popular_destination_section_details' ) ) :
    /**
    * popular destination section details.
    *
    * @since Hodophile 1.0.0
    * @param array $input popular destination section details.
    */
    function hodophile_get_popular_destination_section_details( $input ) {
        $options = hodophile_get_theme_options();

        // Content type.
        $popular_destination_content_type  = $options['popular_destination_content_type'];
        $popular_destination_count = 6;
        
        $content = array();
        switch ( $popular_destination_content_type ) {
        	
            case 'category':
                $cat_id = ! empty( $options['popular_destination_content_category'] ) ? $options['popular_destination_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $popular_destination_count ),
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'trip-types':
                if ( ! class_exists( 'WP_Travel' ) )
                    return;

                $cat_id = ! empty( $options['popular_destination_content_trip_types'] ) ? $options['popular_destination_content_trip_types'] : '';
                $args = array(
                    'post_type'      => 'itineraries',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'itinerary_types',
                            'field'    => 'id',
                            'terms'    => $cat_id,
                        ),
                    ),
                    'posts_per_page'  => absint( $popular_destination_count ),
                    );                    
            break;

            default:
            break;
        }

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

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
// destination section content details.
add_filter( 'hodophile_filter_popular_destination_section_details', 'hodophile_get_popular_destination_section_details' );


if ( ! function_exists( 'hodophile_render_popular_destination_section' ) ) :
  /**
   * Start destination section
   *
   * @return string destination content
   * @since Hodophile 1.0.0
   *
   */
   function hodophile_render_popular_destination_section( $content_details = array() ) {
        $options = hodophile_get_theme_options();
        $popular_destination_content_type  = $options['popular_destination_content_type'];

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="hodophile_popular_destination_section" class="relative page-section same-background">   
            <div class="wrapper">
                <div class="section-header">
                    <?php if ( ! empty( $options['popular_destination_sub_title'] ) ) : ?>
                        <p class="section-subtitle"><?php echo esc_html( $options['popular_destination_sub_title'] ); ?></p>
                    <?php endif; ?>
                    <?php if ( ! empty( $options['popular_destination_title'] ) ) : ?>
                        <h2 class="section-title"><?php echo esc_html( $options['popular_destination_title'] ); ?></h2>
                    <?php endif; ?>                    
                </div><!-- .section-header -->

                <div class="col-3 clear">
                    <?php foreach ( $content_details as $content ) : 
                        $terms = get_the_terms( $content['id'], 'travel_locations' );
                    ?>
                        <article>
                            <div class="destination-wrapper">
                                <div class="featured-image" style="background-image:url('<?php echo esc_url( $content['image'] ); ?>');">
                                    <div class="overlay"></div>
                                </div>
                                <div class="entry-container">
                                    <header class="entry-header">
                                        <?php if ( ! in_array( $popular_destination_content_type, array( 'category', 'page', 'post' ) ) ) : ?>
                                            <div class="travel-info">
                                                <span class="value">
                                                    <?php
                                                    $i = 0;
                                                    foreach ( $terms as $term ) :
                                                        if ( $i > 0 ) :
                                                            ?>
                                                            ,
                                                            <?php
                                                        endif;
                                                        ?>
                                                        <span class="wp-travel-locations"><a href="<?php echo esc_url( get_term_link( $term->term_id ) ); ?>"><?php echo esc_html( $term->name ); ?></a></span>
                                                        <?php
                                                        $i++;
                                                    endforeach;
                                                    ?>
                                                </span>
                                            </div>
                                            <?php else: ?>
                                            <span class="cat-links">
                                                <?php the_category( '', '', $content['id'] ) ?>
                                            </span><!-- .cat-links -->
                                        <?php endif; ?>
                                        
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>
                       
                                    
                                    <?php if ( ! in_array( $popular_destination_content_type, array( 'category', 'page', 'post' ) ) ) : 
                                        $average_rating = wptravel_get_average_rating( $content['id'] ); 
                                    ?>  
                                        <div class="trip-price">   
                                            <ins>
                                                <?php 
                                                    $trip_price = WPTravel_Helpers_Pricings::get_price( array('trip_id'=>$content['id']) );
                                                    echo wptravel_get_formated_price_currency( $trip_price ); 
                                                ?>
                                            </ins>                                                  
                                        </div><!-- .trip-price -->
                                        <div class="meta-wrapper clear">
                                            <div class="duration">
                                               <?php wptravel_get_trip_duration($content['id']); ?>
                                            </div>
                          
                                            <div class="rating">
                                                <div class="wp-travel-average-review" title="<?php printf( esc_attr__( 'Rated %s out of 5', 'hodophile' ), $average_rating ); ?>">
                                                    <span style="width:<?php echo esc_attr( ( $average_rating / 5 ) * 100 ); ?>%">
                                                        <strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average_rating ); ?></strong> <?php printf( esc_html__( 'out of %1$s5%2$s', 'hodophile' ), '<span itemprop="bestRating">', '</span>' ); ?>
                                                    </span>
                                                </div>
                                            </div>                                            
                                        </div>
                                    <?php endif; ?>   
                                </div>
                                <div class="book-now">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn">Book Now</a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
                <?php if ( !empty( $options['popular_destination_alt_btn_label'] ) && !empty( $options['popular_destination_alt_btn_link'] ) ): ?>
                    <div class="view-more">
                        <a href="<?php echo esc_url( $options['popular_destination_alt_btn_link'] ); ?>" class="btn"><?php echo esc_html( $options['popular_destination_alt_btn_label'] ); ?></a>
                    </div>
                <?php endif ?>
                
            </div><!-- .wrapper -->
            
        </div>
       
    <?php }
endif;