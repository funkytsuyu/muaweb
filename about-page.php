<?php
// template name: about page

// data
$bio = simple_fields_value('bio');
$publication_title = simple_fields_value('pub_title');
$collab_title = simple_fields_value('collab_title');
$photo = wp_get_attachement_url(simple_fields_value('about_photo'));
?>

<?php get_header(); ?>
<section id="content" role="main" class="wrap">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
</header>
<section class="entry-content">
  <div class="bio">
    <div class="half"><img src="<?php echo $photo; ?>"></div>
    <div class="half"><?php echo $bio; ?></div>
  </div>
  <div class="half">
    <?php if($general_package_title) { echo '<h2>' . $general_package_title . '</h2>'; } ?>
    <?php
    $genpacksarrays = simple_fields_get_post_group_values(get_the_id(), "Regular Services", true, 1);
    $genpacktitles = $genpacksarrays["Name"];
    $genpackprices = $genpacksarrays["Price"];
    $genpackdescs = $genpacksarrays["Description"];
    $genpacknum  = count($genpacktitles);
    for($i = 0; $i < $genpacknum; $i++) {
      $title = $genpacktitles[$i];
      $price = $genpackprices[$i];
      $desc = $genpackdescs[$i];
    ?>
    <div class="package">
      <div class="title">
        <div class="price"><?php echo $price; ?>$</div>
    <?php echo $title; ?>
    </div>
    <?php echo $desc; ?>
    </div>
    <?php } ?>
  </div>
  <div class="half right">
    <?php if($wedding_package_title) { echo '<h2>' . $wedding_package_title . '</h2>'; } ?>
    <?php
    $wedpacksarrays = simple_fields_get_post_group_values(get_the_id(), "Wedding Services", true, 1);
    $wedpacktitles = $wedpacksarrays["Name"];
    $wedpackprices = $wedpacksarrays["Price"];
    $wedpackdescs = $wedpacksarrays["Description"];
    $wedpacknum  = count($wedpacktitles);
    for($i = 0; $i < $wedpacknum; $i++) {
      $title = $wedpacktitles[$i];
      $price = $wedpackprices[$i];
      $desc = $wedpackdescs[$i];
    ?>
    <div class="package">
      <div class="title">
        <div class="price"><?php echo $price; ?>$</div>
    <?php echo $title; ?>
    </div>
    <?php echo $desc; ?>
    </div>
    <?php } ?>
  </div>

</section>
</article>
</section>
<?php get_footer(); ?>
