<?php get_header(); ?>
<section id="content" role="main" class="wrap">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part('entry'); ?>
<?php echo wdi_feed(array('id'=>'1')); ?>
<?php endwhile; endif; ?>
<?php get_template_part('nav', 'below'); ?>
</section>
<?php get_footer(); ?>
