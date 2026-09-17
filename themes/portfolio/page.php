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
<main id="main-content" class="page-shell">
	<div class="site-container">
		<p class="eyebrow">Tom De Jong</p>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<h1><?php the_title(); ?></h1>
				<div class="page-content">
					<?php if ( trim( get_the_content() ) ) : ?>
						<?php the_content(); ?>
					<?php elseif ( 'over-mij' === get_post_field( 'post_name' ) ) : ?>
						<p>Ik ben Tom De Jong, een freelance fullstack software developer uit Hoorn. Ik studeer Software Development aan het Mediacollege Amsterdam en werk daarnaast als frontend web developer bij Mila Health.</p>
						<h2>Waar ik energie van krijg</h2>
						<p>Ik combineer graag techniek met gevoel voor ontwerp. Van een eerste idee tot een werkende website: ik zoek naar oplossingen die helder zijn voor de gebruiker en prettig zijn om mee te werken.</p>
						<ul>
							<li>Frontend development en responsive interfaces</li>
							<li>Fullstack webdevelopment met PHP en JavaScript</li>
							<li>UI-ontwerp met aandacht voor detail</li>
						</ul>
					<?php elseif ( 'contact' === get_post_field( 'post_name' ) ) : ?>
						<p>Heb je een stageplek of wil je kennismaken? Ik hoor graag wat jullie bouwen en waar ik kan bijdragen.</p>
						<p><a class="contact-email" href="mailto:info@tomwebsites.nl">info@tomwebsites.nl</a></p>
						<h2>Beschikbaar voor een stage</h2>
						<p>Stuur gerust een bericht met wat informatie over de organisatie, de periode en het team. Dan neem ik zo snel mogelijk contact op.</p>
					<?php else : ?>
						<p>Deze pagina is nog leeg. Voeg inhoud toe via de WordPress-editor.</p>
					<?php endif; ?>
				</div>
			</article>
		<?php endwhile; endif; ?>
	</div>
</main>
<footer class="site-footer">
	<div class="site-container footer-inner">
		<span>© <?php echo esc_html( gmdate( 'Y' ) ); ?> Tom De Jong</span>
		<a href="mailto:info@tomwebsites.nl">info@tomwebsites.nl</a>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
