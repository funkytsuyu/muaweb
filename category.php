<?php get_header(); ?>
<section id="content" role="main" class="wrap">
	<div id="masonry-cat" class="projects">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="project square">
				<a href="<?php the_permalink(); ?>">
				<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image'); endif; ?>
				</a>
				<a href="<?php the_permalink(); ?>">
				<div class="overlay">
					<h3>
							<span><?php the_title(); ?></span>
					</h3>
				</div>
				</a>
			</div>
		<?php endwhile; endif; ?>
	</div>
</section>
<?php get_footer(); ?>
