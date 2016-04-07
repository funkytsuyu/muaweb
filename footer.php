</div>
<footer id="footer" role="contentinfo">
	<div class="wrap">
		<div id="copyright">
		<?php echo sprintf( __( '%1$s %2$s %3$s. Tous droits réservés.', 'oascore' ), '&copy;', date('Y'), esc_html(get_bloginfo('name')) ); echo sprintf( __( ' Design: %1$s.', 'oascore' ), '<a href="http://oilandsugar.com/">Atelier oil and sugar</a>' ); ?>
		</div>
		<div class="social">
			<a href="<?php echo get_option('AL_facebook'); ?>">
				<i class="fa fa-facebook"></i>
			</a>
			<a href="<?php echo get_option('AL_instagram'); ?>">
				<i class="fa fa-instagram"></i>
			</a>
			<a href="<?php echo get_option('AL_pinterest'); ?>">
				<i class="fa fa-pinterest"></i>
			</a>
		</div>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>