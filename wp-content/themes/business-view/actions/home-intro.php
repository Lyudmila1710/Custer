<?php
/*
*
* Home intro section
*
*
*/



function business_view_hbanner_section_output()
{
  $business_view_hbanner_show = get_theme_mod('business_view_hbanner_show');
  if (empty($business_view_hbanner_show)) {
    return;
  }
  $business_view_dfimgh = get_template_directory_uri() . '/assets/img/banner.jpg';
  $business_view_hbanner_img = get_theme_mod('business_view_hbanner_img', $business_view_dfimgh);
  $business_view_hbanner_subtitle = get_theme_mod('business_view_hbanner_subtitle', __('ONLINE & IT SERVICES', 'business-view'));
  $business_view_hbanner_title = get_theme_mod('business_view_hbanner_title', __('Perfect It Solution', 'business-view'));
  $business_view_color_title = get_theme_mod('business_view_color_title', __('For Your Business', 'business-view'));
  $business_view_hbanner_desc = get_theme_mod('business_view_hbanner_desc');
  $business_view_btn_text_one = get_theme_mod('business_view_btn_text_one', __('Our Services', 'business-view'));
  $business_view_btn_url_one = get_theme_mod('business_view_btn_url_one', '#');

?>
  <!-- home -->
  <section class="aghome" id="home">
    <div id="ax-praticals"></div>
    <div class="ax-home-single-slide-all-content">
      <?php if ($business_view_hbanner_img) : ?>
        <div class="ax-home-bg">
          <img src="<?php echo esc_url($business_view_hbanner_img); ?>" alt="<?php esc_attr($business_view_hbanner_title); ?>">
        </div>
      <?php endif; ?>
      <div class="ax-home-details">
        <div class="container">
          <?php if ($business_view_hbanner_subtitle) : ?>
            <div class="ax-home-subtitle">
              <p><?php echo esc_html($business_view_hbanner_subtitle); ?></p>
            </div>
          <?php endif; ?>
          <?php if ($business_view_hbanner_title || $business_view_color_title) : ?>
            <div class="ax-home-title">
              <?php if ($business_view_hbanner_title) : ?>
                <h1><?php echo esc_html($business_view_hbanner_title); ?>
                </h1>
              <?php endif; ?>
              <?php if ($business_view_color_title) : ?>
                <h1 class="ax-section-title"><?php echo esc_html($business_view_color_title); ?>
                <?php endif; ?>
            </div>
          <?php endif; ?>
          <?php if ($business_view_hbanner_desc) : ?>
            <div class="ax-home-dres">
              <p><?php echo wp_kses_post($business_view_hbanner_desc); ?></p>
            </div>
          <?php endif; ?>
          <?php if ($business_view_btn_url_one) : ?>
            <div class="ax-home-btn">
              <a href="<?php echo esc_url($business_view_btn_url_one); ?>" class="ax-home-first-btn"><?php echo esc_html($business_view_btn_text_one); ?></a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

<?php
}
add_action('business_view_hbanner', 'business_view_hbanner_section_output');
