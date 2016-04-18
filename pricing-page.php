<?php
// template name: pricing page

// data

?>

<?php get_header(); ?>
<section id="content" role="main" class="wrap">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
</header>
<section class="entry-content">
  <div class="half">
    <h2>Fashion, beauty and editorial packages</h2>
    <?php
    $genpacksarrays = simple_fields_get_post_group_values(get_the_id(), "General packages", true, 1);
    $genpacktitles = $genpacksarrays["Name"];
    $genpackprices = $genpacksarrays["Price"];
    $genpackdescs = $genpacksarrays["Desc"];
    $genpacknum  = count($genpacktitles);
    for($i = 0; $i < $genpacknum; $i++) {
      $title = $genpacktitles[$i];
      $price = $genpackprices[$i];
      $desc = $genpackdescs[$i];
    ?>
    <div class="package">
      <div class="title">
        <div class="price"><?php echo $price; ?></div>
    <?php echo $title; ?>
    </div>
    <?php echo $desc; ?>
    </div>
    <?php } ?>
  </div>
  <div class="half right">
    <h2>Wedding packages</h2>
  </div>

</section>
</article>
</section>
<?php get_footer(); ?>
