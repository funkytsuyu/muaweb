<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php do_action( 'add_head_attributes' ); ?>>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<title><?php wp_title(' | ', true, 'right'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,700,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/slick.css">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="hfeed">
		<header id="header" role="banner">
			<?php /*
			<div class="banner">
				<div class="banner-img">
					<?php if(is_page('home')) { ?>
					<div class="slider">
						<?php
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => '3',
							'orderby' => 'date',
							'order' => 'DESC'
						);
						// the query
						$the_query = new WP_Query( $args ); ?>

						<?php if ( $the_query->have_posts() ) : ?>
						<!-- the loop -->
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="slide">
								<?php the_post_thumbnail(); ?>
								<div id="ribbon">
									<div class="wrap">
										<h1>
											<a href="<?php the_permalink(); ?>">
												<span><?php the_title(); ?></span>
												<div id="shadow"></div>
											</a>
										</h1>
										<h2>
											<span>in <a href=""><?php the_category(); ?></a></span>
										</h2>
									</div>
								</div>
							</div>
							<?php endwhile; ?>
							<!-- end of the loop -->
							<?php wp_reset_postdata(); ?>
						<?php else:  ?>
							  <p>Aucun projet à afficher</p>
						<?php endif; ?>

				</div>
				<?php } elseif(is_category()){ ?>
				<?php if(is_category('beauty')) {
					echo '<img src=' . get_option('AL_beauty_img') . '>';
				} elseif(is_category('creative')) {
					echo '<img src=' . get_option('AL_creative_img') . '>';
				} elseif(is_category('fashion')) {
					echo '<img src=' . get_option('AL_fashion_img') . '>';
				} elseif(is_category('wedding')) {
					echo '<img src=' . get_option('AL_wedding_img') . '>';
				} elseif(is_category('seancesthematiques')) {
					echo '<img src=' . get_option('AL_seances_img') . '>';
				} ?>
					<div id="ribbon">
						<div class="wrap">
							<h2>
								<a href=""><?php echo single_cat_title("", true); ?></a>
							</h2>
							<h1>
								<span>
									<p><?php echo category_description(); ?> </p>
									<div id="shadow"></div>
								</span>
							</h1>
						</div>
					</div>
				<?php } elseif(is_page()) { ?>
				<?php echo get_the_post_thumbnail($post->ID); ?>
					<div id="ribbon">
						<div class="wrap">
							<h1>
								<span>
									<p><?php echo get_the_title($post->ID); ?> </p>
									<div id="shadow"></div>
								</span>
							</h1>
						</div>
					</div>
				<?php } elseif(is_single()) { ?>
				<?php echo get_the_post_thumbnail($post->ID); ?>
					<div id="ribbon">
						<div class="wrap">
							<h1>
								<span>
									<p><?php echo get_the_title($post->ID); ?> </p>
									<div id="shadow"></div>
								</span>
							</h1>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
			*/ ?>
			<nav id="menu" role="navigation">
				<div class="wrap">
					<a id="logo" href="<?php echo home_url(); ?>" class="home-link">
					 <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg">
					</a>
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
					<div class="mobile-menu">
						<div class="button-wrap">
							<button class="mobile-menu-button">
								<i class="fa fa-bars"></i>
							</button>
						</div>
						<a id="logo" href="<?php echo home_url(); ?>" class="home-link">
						 <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg">
						</a>
						<div class="snipit">
							<?php wp_nav_menu( array( 'theme_location' => 'mobile-menu' ) ); ?>
						</div>
					</div>

					<div class="social">
						<a href="<?php echo get_option('AL_facebook'); ?>">
							<i class="fa fa-facebook"></i>
						</a>
						<a href="<?php echo get_option('AL_instagram'); ?>">
							<i class="fa fa-instagram"></i>
						</a>
						<a href="<?php echo get_option('AL_linkedin'); ?>">
							<i class="fa fa-linkedin"></i>
						</a>
					</div>
				</div>
			</nav>
		</header>
		<div id="container">
