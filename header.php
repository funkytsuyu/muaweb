<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php do_action( 'add_head_attributes' ); ?>>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="theme-color" content="#e9bdbd">
	<title><?php wp_title(' | ', true, 'right'); ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/slick.css">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="hfeed">
		<header id="header" role="banner">
			<nav id="menu" role="navigation">
				<div class="wrap">
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu-left' ) ); ?>
					<a id="logo" href="<?php echo home_url(); ?>" class="home-link">
						<?php if(is_category('editorial')) {
							echo '<img src="' . get_stylesheet_directory_uri() . '/img/logos-web-big-orange.png">';
						} elseif(is_category('creative')) {
							echo '<img src="' . get_stylesheet_directory_uri() . '/img/logos-web-big-dark-blue.png">';
						} elseif(is_category('beauty')) {
							echo '<img src="' . get_stylesheet_directory_uri() . '/img/logos-web-big-purple.png">';
						} elseif(is_category('casual')) {
							echo '<img src="' . get_stylesheet_directory_uri() . '/img/logos-web-big-blue.png">';
						} else {
							echo '<img src="' . get_stylesheet_directory_uri() . '/img/logos-web-big-peach.png">';
						} ?>
					</a>
					<a id="mobile-logo" href="<?php echo home_url(); ?>" class="home-link">
					 <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos-web-small-peach.png">
					</a>
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu-right' ) ); ?>
					<div class="mobile-menu">
						<div class="button-wrap">
							<button class="mobile-menu-button">
								<svg class="mobile-menu-button-icon" height="20" width="20">
									<line class="line top-line" x1="12" y1="2" x2="20" y2="2" style="stroke:#a093be;stroke-width:3px;" />
									<line class="line middle-line" x1="6" y1="10" x2="20" y2="10" style="stroke:#a093be;stroke-width:3px;" />
									<line class="line bottom-line" x1="0" y1="18" x2="20" y2="18" style="stroke:#a093be;stroke-width:3px;" />
								</svg>
								<svg class="mobile-menu-button-icon-open" height="20" width="20">
									<line class="line top-line" x1="0" y1="2" x2="20" y2="2" style="stroke:#a093be;stroke-width:3px;" />
									<line class="line middle-line" x1="0" y1="10" x2="20" y2="10" style="stroke:#a093be;stroke-width:3px;" />
									<line class="line bottom-line" x1="0" y1="18" x2="20" y2="18" style="stroke:#a093be;stroke-width:3px;" />
								</svg>
							</button>
						</div>
						<div class="snipit">
							<?php wp_nav_menu( array( 'theme_location' => 'mobile-menu' ) ); ?>
						</div>
					</div>
				</div>
			</nav>
		</header>
		<div id="container">
