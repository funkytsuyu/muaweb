<?php
// template name: pricing page

// data
$general_package_title = simple_fields_value('regular_services_title');
$wedding_package_title = simple_fields_value('wedding_services_title');
$general_package_notes = simple_fields_value('regular_services_notes');
$wedding_package_notes = simple_fields_value('wedding_services_notes');
?>

<?php get_header(); ?>
<section id="content" role="main" class="wrap">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
</header>
<section class="entry-content">
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
    <?php if($general_package_notes) {
      echo '<div class="price-notes">' . $general_package_notes . '</div>';
    }?>
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
    <?php if($wedding_package_notes) {
      echo '<div class="price-notes">' . $wedding_package_notes . '</div>';
    }?>
  </div>

</section>
</article>
</section>
<?php get_footer(); ?>
