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

  <div class="bio flex-row">
    <div class="flex-1"><img src="<?php echo $photourl; ?>"></div>
    <div class="flex-2"><div class='padding-left'><?php echo $bio; ?></div></div>
  </div>

  <div class="publications">
    <?php if($publication_title) { echo '<h2>' . $publication_title . '</h2>'; } ?>
    <?php
    $pubarrays = simple_fields_get_post_group_values(get_the_id(), "publications", true, 1);
    $pubtitles = $pubarrays["Nom de la publication"];
    $publinks = $pubarrays["Lien de la publication"];
    $pubimgs = $pubarrays["Image de la publication"];
    $pubnum  = count($pubtitles);
    for($i = 0; $i < $pubnum; $i++) {
      $title = $pubtitles[$i];
      $link = $publinks[$i];
      $img = $pubimgs[$i];
      $imgurl = wp_get_attachment_url($img);
    ?>
    <div class="publication">
      <?php if($link) { echo '<a href="' . $link . '">'; } ?>
        <div class="img">
          <?php echo '<img src="' . $imgurl . '">'; ?>
        </div>
        <?php if($title) { echo '<div class="title">' . $title . '</div>'; } ?>
      <?php if($link) { echo '</a>'; } ?>
    </div>
    <?php } ?>
  </div>

  <div class="collabs">
    <?php if($collab_title) { echo '<h2>' . $collab_title . '</h2>'; } ?>
    <?php
    $collabarrays = simple_fields_get_post_group_values(get_the_id(), "Collaborations", true, 1);
    $collabnames = $collabarrays["Nom du collaborateur"];
    $collablinks = $collabarrays["Lien du collaborateur"];
    $collabnum  = count($collabnames);
    for($i = 0; $i < $collabnum; $i++) {
      $name = $collabnames[$i];
      $link = $collablinks[$i];
    ?>
    <div class="collab sixth">
        <?php if($name) {
          echo '<div class="name">';
          if($link) {
            echo '<a href="' . $link . '">' . $name . '</a>';
          } else {
            echo $name;
          }
          echo '</div>';
        } ?>
    </div>
    <?php } ?>
  </div>


</section>
</article>
</section>
<?php get_footer(); ?>
