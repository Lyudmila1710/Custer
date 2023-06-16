<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Real Estate Pack
 */
$real_estate_pack_blog_layout = get_theme_mod('real_estate_pack_blog_layout', 'rightside');
if ($real_estate_pack_blog_layout == 'fullwidth' || !is_active_sidebar('sidebar-1')) {
	$real_estate_pack_grid = 4;
} else {
	$real_estate_pack_grid = 6;
}
$real_estate_pack_categories = get_the_category();
if ($real_estate_pack_categories) {
	$real_estate_pack_category = $real_estate_pack_categories[mt_rand(0, count($real_estate_pack_categories) - 1)];
} else {
	$real_estate_pack_category = '';
}
?>
<div class="col-lg-<?php echo esc_attr($real_estate_pack_grid); ?> grid-item mb-5">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="grid-item-post">
			<?php if (has_post_thumbnail()) : ?>
				<div class="grid-item-img">
					<a class="grid-item-img-link" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			<?php endif; ?>
			<div class="grid-item-details">
				<?php the_title('<h2 class="grid-item-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
				<div class="hb-meta">
					<?php if ($real_estate_pack_category) : ?>
						<a class="catimg-top" href="<?php echo esc_url(get_category_link($real_estate_pack_category)); ?>"><?php echo esc_html($real_estate_pack_category->name); ?></a>
					<?php endif; ?>
					<?php if ('post' === get_post_type()) :
					?>
						<div class="entry-meta grid-meta">
							<?php
							real_estate_pack_posted_by();
							?>
							<span class="grid-meta-date"><?php echo get_the_date(); ?></span>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</div>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>