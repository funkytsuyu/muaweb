<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="wedding-banner">
  <?php the_post_thumbnail(); ?>
</div>
<section id="content" role="main" class="wrap">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
</header>
<section class="entry-content">
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</section>
</article>
</section>
<?php if ( ! post_password_required() ) comments_template('', true); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
