<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content">Ga naar de inhoud</a>
<header class="site-header">
	<div class="site-container header-inner">
		<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Tom De Jong, naar home">TDJ<span>.</span></a>
		<nav class="site-nav" aria-label="Hoofdnavigatie">
			<a href="<?php echo esc_url( home_url( '/over-mij/' ) ); ?>">Over mij</a>
			<a href="<?php echo esc_url( home_url( '/#projecten' ) ); ?>">Projecten</a>
			<a class="nav-contact" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a>
		</nav>
	</div>
</header>