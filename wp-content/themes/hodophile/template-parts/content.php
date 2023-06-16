<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
$options = hodophile_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

    <div class="blog-wrapper">
        
        <?php if ( has_post_thumbnail() && !$options['hide_image'] ) : ?>
            <div class="featured-image matchheight" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) ); ?>');">
            </div><!-- .featured-image -->
        <?php endif; ?>
        <div class="entry-container">    

            <div class="entry-meta">
                
                <?php if ( !$options['hide_date'] ):
                    hodophile_posted_on( get_the_id() );
                endif; ?>
            </div>
            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>
            <div class="entry-content">
                <p><?php the_excerpt(); ?>
                </p>
            </div>
            
        </div><!-- .entry-container -->
    </div><!-- .post-item-wrapper -->
</article><!-- #post-## -->
