<?php
/* template name: contact */

// Data
$map = simple_fields_value('map');
$map_url = wp_get_attachment_url($map);
$contact_text = simple_fields_value('contact_text');
$contact_title = stripslashes(get_option('AL_text_contact'));
?>

<?php get_header(); ?>
<section id="content" role="main">
	<?php if($map) { ?>
		<div class="contact-map">
				<img src="<?php echo $map_url; ?>">
		</div>
	<?php } ?>
	<div class="wrap">
		<div class="half">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="header">
					</header>
					<section class="entry-content">
						<?php echo $contact_text; ?>
					</section>
				</article>
				<?php if ( ! post_password_required() ) comments_template('', true); ?>
			<?php endwhile; endif; ?>
		</div>
		<div class="half">
			<?php if($contact_title) { ?>
				<h3>
					<?php echo $contact_title;?>
				</h3>
			<?php } ?>
			<?php echo do_shortcode("[vfb id='1']"); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
