<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( is_single() && in_category('blog') ) { ?>
		<section class="entry-content">
			<?php the_content(); ?>
		</section>
	<?php } else {
	// data
	$meta_project_desc = get_post_meta( $post->ID, 'meta-projet-desc', true );
	$meta_projet_credits = get_post_meta( $post->ID, 'meta-projet-credits', true );
	$content_raw = get_the_content();
	$pattern = '/<div(.*)<\/div>/iU';
	$post_images = preg_grep($pattern, $content_raw);
	?>
	<section class="entry-content" id="masonry">
	<div class="half item project-infos">
		<?php if(!empty( $meta_project_desc )) {
		echo '<blockquote>';
			echo $meta_project_desc;};
		echo '</blockquote>';
		?>
			<?php
			 if(!empty( $meta_projet_credits )) {
				echo '<span class="project-credits">';
				 if(!empty( $meta_project_desc )) {
					 echo '<h2>The Credits</h2>';
				 } else {
					 echo '<h2 class="no-top-margin">The Credits</h2>';
				 }
					echo '<ul class="credits-list alpha-order">';
						$credits = explode(",", $meta_projet_credits);
						foreach( $credits as $credit ):
							list($task, $person) = explode(";", $credit);
							echo '<li><span class="task">' . $task . '</span><span class="person">' . $person . '</span></li>';
						endforeach;
					echo '</ul>';
				echo '</span>';
				}
			?>
		</div>
		<div class="project-gallery">
			<?php echo $content_raw; ?>
		</div>

		</section>
	<?php } ?>

<?php if (!is_search()) get_template_part('entry-footer'); ?>
</article>
