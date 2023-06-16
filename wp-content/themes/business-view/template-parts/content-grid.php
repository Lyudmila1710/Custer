<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Business View
 */
$business_view_categories = get_the_category();
if ($business_view_categories) {
	$business_view_category = $business_view_categories[mt_rand(0, count($business_view_categories) - 1)];
} else {
	$business_view_category = '';
}
?>
<div class="col-lg-4 mb-4 js-scroll fade-in-bottom">
	<article id="post-<?php the_ID(); ?>" <?php post_class('business-view-list-item'); ?>>
		<div class="ax-single-blog-post">

			<?php if (has_post_thumbnail()) : ?>
				<div class="ax-single-blog-post-img">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			<?php endif; ?>
			<div class="ax-single-blog-post-details">
				<div class="ax-single-blog-post-categories">
					<a class="blog-categrory" href="<?php echo esc_url(get_category_link($business_view_category)); ?>"><?php echo esc_html($business_view_category->name); ?></a>
				</div>
				<h2 class="ax-single-blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="ax-single-blog-post-dres">
					<?php the_excerpt(); ?>
				</div>
				<div class="ax-single-blog-post-author-section">
					<div class="ax-blog-post-author-detalis">
						<div class="ax-blog-post-author-img">
							<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo wp_kses_post(get_avatar(get_the_author_meta('ID'))); ?></a>
							<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="ax-blog-post-author-name"><?php echo esc_html(get_the_author_meta('display_name')); ?></a>
						</div>
						<div class="ax-single-blog-post-pub-date">
							<p><?php echo esc_html(get_the_date(get_option('date_format'))); ?></p>
						</div>
					</div>
				</div>

			</div>
		</div>

	</article><!-- #post-<?php the_ID(); ?> -->
</div>