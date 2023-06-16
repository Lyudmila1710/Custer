<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Real Estate Pack
 */
$real_estate_pack_categories = get_the_category();
if ($real_estate_pack_categories) {
	$real_estate_pack_category = $real_estate_pack_categories[mt_rand(0, count($real_estate_pack_categories) - 1)];
} else {
	$real_estate_pack_category = '';
}
if (has_post_thumbnail()) {
	$real_estate_pack_imgclass = 'nx-has-img';
} else {
	$real_estate_pack_imgclass = 'nx-no-img';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('nx-list-item'); ?>>
	<div class="single-nx-list-item <?php echo esc_attr($real_estate_pack_imgclass); ?>">
		<?php if (has_post_thumbnail()) : ?>
			<div class="nx-single-list-img">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('medium_large'); ?>
				</a>
			</div>
		<?php endif; ?>
		<div class="nx-single-list-details">
			<?php the_title('<h2 class="nx-list-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
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
			<?php the_excerpt(); ?>
			<a class="real-estate-pack-readmore" href="<?php the_permalink(); ?>"><span><?php esc_html_e('Read More', 'real-estate-pack'); ?></span> <i class="fas fa-long-arrow-alt-right"></i></a>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->