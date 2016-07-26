<?php
// template name: home page
 get_header(); ?>
<section id="content" role="main">
  <div class="home-slider-container">
    <div class="home-slider">
    <?php
    $bannerarrays = simple_fields_get_post_group_values(get_the_id(), "Banners", true, 1);
    $bannerimgs = $bannerarrays["Image"];
    $bannerlinks = $bannerarrays["Link"];
    $bannernum  = count($bannerimgs);
    for($i = 0; $i < $bannernum; $i++) {
      $img = $bannerimgs[$i];
      $link = $bannerlinks[$i];
      $imgurl = wp_get_attachment_url($img);
    ?>
    <div class="banner">
      <?php if($link) { echo '<a href="' . $link . '">'; } ?>
        <div class="img">
          <?php echo '<img src="' . $imgurl . '">'; ?>
        </div>
      <?php if($link) { echo '</a>'; } ?>
    </div>
    <?php } ?>
  </div>
      <div class="banner-dots"></div>
  </div>
  <div class="wrap">

  <div>
    <?php the_content(); ?>
  </div>

</div>

</section>
<?php get_footer(); ?>
