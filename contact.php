<?php 
/* template name: contact */
?>

<?php get_header(); ?>
<section id="content" role="main" class="wrap">
	<div class="half">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="header">
				</header>
				<section class="entry-content">
					<?php the_content(); ?>
					<div class="entry-links"><?php wp_link_pages(); ?></div>
				</section>
			</article>
			<?php if ( ! post_password_required() ) comments_template('', true); ?>
		<?php endwhile; endif; ?>
	</div>
	<div class="half">
		<h3>
			<?php echo stripslashes(get_option('AL_text_contact'));?>
		</h3>
		<?php echo do_shortcode('[bws_contact_form]'); ?>
	</div>
</section>
<?php get_footer(); ?>