<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Real Estate Pack
 */

$real_estate_pack_blog_style = get_theme_mod('real_estate_pack_blog_style', 'list');
if ($real_estate_pack_blog_style == 'grid' && !is_single()) :
	get_template_part('template-parts/content', 'grid');
elseif ($real_estate_pack_blog_style == 'list' && !is_single()) :
	get_template_part('template-parts/content', 'list');

else :
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="xpost-item pb-5 mb-5">
			<?php real_estate_pack_post_thumbnail(); ?>
			<div class="xpost-text p-3">
				<div class="sncats mb-4">
					<?php
					real_estate_pack_category_btn();
					?>
				</div>

				<header class="entry-header pb-4">
					<?php
					if (is_singular()) :
						the_title('<h1 class="entry-title">', '</h1>');
					else :
						the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
					endif;

					if ('post' === get_post_type()) :
					?>
						<div class="entry-meta">
							<?php
							real_estate_pack_posted_on();
							real_estate_pack_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<?php
					if (is_single()) {
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'real-estate-pack'),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post(get_the_title())
							)
						);

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__('Pages:', 'real-estate-pack'),
								'after'  => '</div>',
							)
						);
					} else {
						the_excerpt();
					}

					?>
				</div><!-- .entry-content -->
				<footer class="tag-btns mt-5 mb-2">
					<?php real_estate_pack_tag_btn(); ?>
				</footer><!-- .entry-footer -->
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>