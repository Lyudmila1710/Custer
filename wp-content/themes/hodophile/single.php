<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Theme Palace
 * @subpackage Hodophile
 * @since Hodophile 1.0.0
 */

get_header(); 
?>
<div id="inner-content-wrapper" class="wrapper page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="single-wrapper">
				<?php
				while ( have_posts() ) : the_post(); ?>
					
					<?php get_template_part( 'template-parts/content', 'single' ); ?>

					<?php
					/**
					* Hook hodophile_action_post_pagination
					*  
					* @hooked hodophile_post_pagination 
					*/
					do_action( 'hodophile_action_post_pagination' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
			 	endwhile; // End of the loop.
				?>
			</div><!-- .single-wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php  
	if ( hodophile_is_sidebar_enable() ) {
		get_sidebar();
	}
	?>
</div><!-- .page-section -->
<?php
get_footer();
