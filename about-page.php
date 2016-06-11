<?php
// template name: about page

// data
$bio = simple_fields_value('bio');
$publication_title = simple_fields_value('pub_title');
$collab_title = simple_fields_value('collab_title');
$photo = simple_fields_value('about_photo');
$photourl = wp_get_attachment_url($photo);
?>

<?php get_header(); ?>
<section id="content" role="main" class="wrap">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
</header>
<section class="entry-content">
  <div class="bio">
    <div class="half"><img src="<?php echo $photourl; ?>"></div>
    <div class="half"><?php echo $bio; ?></div>
  </div>
  <div class="publications">
    <?php if($publication_title) { echo '<h2>' . $publication_title . '</h2>'; } ?>
    <?php
    $pubarrays = simple_fields_get_post_group_values(get_the_id(), "publications", true, 1);
    $pubtitles = $pubarrays["Nom de la publication"];
    $publinks = $pubarrays["Price"];
    $pubimgs = $pubarrays["Description"];
    $pubnum  = count($pubtitles);
    for($i = 0; $i < $pubnum; $i++) {
      $title = $pubtitles[$i];
      $link = $publinks[$i];
      $img = $pubimgs[$i]);
      $imgurl = wp_get_attachment_url($img);
    ?>
    <div class="publication sixth">
      <?php if($link) { echo '<a href="' . $link . '">'; } ?>
        <?php if($title) { echo '<div class="title">' . $title . '</div>'; } ?>
        <div class="img">
          <?php echo '<img src="' . $imgurl . '">'; ?>
        </div>
      <?php if($link) { echo '</a>'; } ?>
    </div>
    <?php } ?>
  </div>

  <div class="half">

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
