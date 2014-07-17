<?php
/**
 * Pure's Header template
 */
?>
<!DOCTYPE html>
<html <?php pure_html_tag_schema(); ?> <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title itemprop="name"><?php wp_title( '|', true, 'right' ); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="layout" class="pure-g">
<div id="sidebar" class="sidebar pure-u-1 pure-u-md-1-4">
<header id="masthead" class="site-header" role="banner">
	<div id="branding" class="site-branding">
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	</div>
	<nav class="nav">
		<?php
		/**
		 * Only get the Primary menu if it is set in the WordPress Admin.
		 * The menu_class argument breaks if there is no menu activated in the WordPress Admin
		 */
			if ( has_nav_menu( 'primary' ) ) :
				wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'false', 'menu_class' => 'nav-list' ) );
			endif;
		?>
	</nav>
</header>
</div>
<div id="content" class="site-content pure-u-1 pure-u-md-3-4">