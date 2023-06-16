<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */
if ( ! function_exists( 'hodophile_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since Hodophile 1.0.0
    */
    function hodophile_add_blog_section() {
    	$options = hodophile_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'hodophile_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'hodophile_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        hodophile_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'hodophile_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since Hodophile 1.0.0
    * @param array $input blog section details.
    */
    function hodophile_get_blog_section_details( $input ) {
        $options = hodophile_get_theme_options();

        // Content type.
        $blog_content_type  = $options['blog_content_type'];
        $blog_count = 3;
        
        $content = array();

        $cat_id = ! empty( $options['blog_content_category'] ) ? $options['blog_content_category'] : '';
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => absint( $blog_count ),
            'cat'               => absint( $cat_id ),
            'ignore_sticky_posts'   => true,
            );                    
           

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = hodophile_trim_content( 20 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg'; 

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
// blog section content details.
add_filter( 'hodophile_filter_blog_section_details', 'hodophile_get_blog_section_details' );


if ( ! function_exists( 'hodophile_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since Hodophile 1.0.0
   *
   */
   function hodophile_render_blog_section( $content_details = array() ) {
        $options = hodophile_get_theme_options();
        $blog_content_type  = $options['blog_content_type'];

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="hodophile_blog_section" class="relative page-section">
            <div class="wrapper">
                <div class="section-header">
                    <?php if ( ! empty( $options['blog_sub_title'] ) ) : ?>
                        <p class="section-subtitle"><?php echo esc_html( $options['blog_sub_title'] ); ?></p>
                    <?php endif; ?>
                    <?php if ( ! empty( $options['blog_title'] ) ) : ?>
                        <h2 class="section-title"><?php echo esc_html( $options['blog_title'] ); ?></h2>
                    <?php endif; ?>                    
                </div><!-- .section-header -->

                <div class="section-content col-3 clear">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article>
                            <div class="blog-wrapper">
                                <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');"></div>
                                <div class="entry-container">
                                    <div class="entry-meta">
                                        <span class="cat-links">
                                            <?php the_category( '', '', $content['id'] ); ?>
                                        </span><!-- .cat-links --> 
                                    </div>
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>
                                    <div class="entry-content">
                                        <p><?php echo esc_html( $content['excerpt'] ); ?>..<a href="<?php echo esc_url( $content['url'] ); ?>" class="read-more">( <?php echo esc_html( $options['blog_btn_title'] ); ?> )</a></p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div><!-- .archive-blog-wrapper -->
                <?php if ( ! empty( $options['blog_alt_btn_title'] ) && ! empty( $options['blog_alt_btn_url'] ) ) : ?>
                     <div class="view-more">
                        <a href="<?php echo esc_url( $options['blog_alt_btn_url'] ) ; ?>" class="btn"> <?php echo esc_html( $options['blog_alt_btn_title'] ) ; ?></a>
                    </div><!-- .read-more -->
                <?php endif; ?>       

            </div><!-- .wrapper -->
        </div><!-- #latest-posts -->      
    <?php }
endif;