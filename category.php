<?php get_header(); ?>
<section id="content" role="main" class="wrap">
	<?php if(is_category('beauty')) { ?>
		<header class="header ">
			<?php
			$recent = new WP_Query("page_id=34");
			while ($recent->have_posts()) : $recent->the_post();
				the_content();
			endwhile;
			wp_reset_postdata();
			?>
		</header>
	<?php } elseif(is_category('creative')) { ?>
		<header class="header ">
			<?php
			$recent = new WP_Query("page_id=37");
			while ($recent->have_posts()) : $recent->the_post();
				the_content();
			endwhile;
			wp_reset_postdata();
			?>
		</header>
	<?php } elseif(is_category('fashion')) { ?>
		<header class="header">
			<?php
			$recent = new WP_Query("page_id=39");
			while ($recent->have_posts()) : $recent->the_post();
				the_content();
			endwhile;
			wp_reset_postdata();
			?>
		</header>
	<?php } elseif(is_category('wedding')) { ?>
		<header class="header">
			<?php
			$recent = new WP_Query("page_id=41");
			while ($recent->have_posts()) : $recent->the_post();
				the_content();
			endwhile;
			wp_reset_postdata();
			?>
		</header>
	<?php } elseif(is_category('seancesthematiques')) { ?>
		<header class="header">
			<?php
			$recent = new WP_Query("page_id=471");
			while ($recent->have_posts()) : $recent->the_post();
				the_content();
			endwhile;
			wp_reset_postdata();
			?>
		</header>
	<?php } ?>

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
