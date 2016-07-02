<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php do_action( 'add_head_attributes' ); ?>>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="theme-color" content="#e0d7f7">
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
			<nav id="menu" role="navigation">
				<div class="wrap">
					<a id="logo" href="<?php echo home_url(); ?>" class="home-link">
					 <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg">
					</a>
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
					<div class="mobile-menu">
						<div class="button-wrap">
							<button class="mobile-menu-button">
								<svg height="20" width="20">
									<line x1="12" y1="2" x2="20" y2="2" style="stroke:#a093be;stroke-width:3px;" />
									<line x1="6" y1="10" x2="20" y2="10" style="stroke:#a093be;stroke-width:3px;" />
									<line x1="0" y1="18" x2="20" y2="18" style="stroke:#a093be;stroke-width:3px;" />
								</svg>
							</button>
						</div>
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
