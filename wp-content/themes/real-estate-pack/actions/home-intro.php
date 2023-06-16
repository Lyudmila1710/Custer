<?php
/*
*
* Home intro section for Real Estate Pack section
*
*
*/



function real_estate_pack_intro_section_output()
{

  $real_estate_pack_intro_subtitle = get_theme_mod('real_estate_pack_intro_subtitle', __('Find Your Dream Home Today', 'real-estate-pack'));
  $real_estate_pack_intro_title = get_theme_mod('real_estate_pack_intro_title', __('Experience the Finest Real Estate', 'real-estate-pack'));
  $real_estate_pack_intro_desc = get_theme_mod('real_estate_pack_intro_desc');
  $real_estate_pack_btn_text_one = get_theme_mod('real_estate_pack_btn_text_one', __('LEARN MORE', 'real-estate-pack'));
  $real_estate_pack_btn_url_one = get_theme_mod('real_estate_pack_btn_url_one', '#');
  $real_estate_pack_btn_text_two = get_theme_mod('real_estate_pack_btn_text_two', __('EXPLORE MORE', 'real-estate-pack'));
  $real_estate_pack_btn_url_two = get_theme_mod('real_estate_pack_btn_url_two');
?>
  <!-- home -->
  <section class="home-intro" id="sa-home">
    <div class="home-all-content">
      <div class="container">
        <?php if ($real_estate_pack_intro_subtitle) : ?>
          <h5><?php echo esc_html($real_estate_pack_intro_subtitle); ?></h5>
        <?php endif; ?>
        <?php if ($real_estate_pack_intro_title) : ?>
          <h1><?php echo esc_html($real_estate_pack_intro_title); ?></h1>
        <?php endif; ?>
        <?php if ($real_estate_pack_intro_desc) : ?>
          <p><?php echo esc_html($real_estate_pack_intro_desc); ?></p>
        <?php endif; ?>
        <?php if ($real_estate_pack_btn_url_one) : ?>
          <a href="<?php echo esc_url($real_estate_pack_btn_url_one); ?>" class="btn btn-hero agbtn1"><?php echo esc_html($real_estate_pack_btn_text_one); ?></a>
        <?php endif; ?>
        <?php if ($real_estate_pack_btn_url_two) : ?>
          <a href="<?php echo esc_url($real_estate_pack_btn_url_two); ?>" class="btn btn-hero agbtn2"><?php echo esc_html($real_estate_pack_btn_text_two); ?></a>
        <?php endif; ?>
      </div>
    </div>
  </section>

<?php
}
add_action('real_estate_pack_profile_intro', 'real_estate_pack_intro_section_output');
