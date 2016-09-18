<?php // template name: wedding page ?>

<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="wedding-banner" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
</div>
<section id="content" role="main" class="wrap">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
</header>
<section class="entry-content">
  <div class="flex-row">
    <div class="flex-1">
      <?php the_content(); ?>
    </div>
    <div class="flex-1">
      <?php the_content(); ?>
    </div>
  </div>
  </section>
</article>
</section>
<?php if ( ! post_password_required() ) comments_template('', true); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
