<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php if ( isset( $portfolio_template_test_heading ) ) : ?>
	<p class="template-test-heading"><?php echo esc_html( $portfolio_template_test_heading ); ?></p>
<?php endif; ?>
<a class="skip-link" href="#main-content">Ga naar de inhoud</a>
<header class="site-header">
	<div class="site-container header-inner">
		<a class="site-logo" href="#top" aria-label="Tom De Jong, naar boven">TDJ<span>.</span></a>
		<nav class="site-nav" aria-label="Hoofdnavigatie"><a href="<?php echo esc_url( home_url( '/over-mij/' ) ); ?>">Over mij</a><a href="#projecten">Projecten</a><a class="nav-contact" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></nav>
	</div>
</header>
<main id="main-content">
	<section class="hero" id="top" aria-labelledby="hero-title"><div class="site-container hero-grid"><div class="hero-copy"><p class="eyebrow">Software developer · Hoorn</p><h1 id="hero-title">Ik bouw digitale ervaringen die <em>werken.</em></h1><p class="hero-intro"><?php echo portfolio_text( 'hero_intro', 'Ik ben Tom De Jong, een freelance fullstack software developer die graag heldere interfaces en betrouwbare weboplossingen maakt.' ); ?></p><div class="hero-actions"><a class="button button-primary" href="#projecten">Bekijk mijn werk <span aria-hidden="true">↗</span></a><a class="text-link" href="#contact">Neem contact op</a></div></div><div class="hero-aside" aria-label="Beschikbaar voor een stage"><div class="availability"><span class="status-dot"></span> Beschikbaar voor een stage</div><img src="https://tomwebsites.nl/assets/tomproflilepicture-Dk5ZWUts.webp" alt="Portret van Tom De Jong" width="240" height="240"></div></div></section>
	<section class="section section-paper" id="over-mij" aria-labelledby="about-title"><div class="site-container split-grid"><div><p class="eyebrow">01 / Over mij</p><h2 id="about-title"><?php echo portfolio_text( 'about_heading', 'Nieuwsgierig, zorgvuldig en altijd in beweging.' ); ?></h2></div><div class="section-copy"><p><?php echo portfolio_text( 'about_text', 'Ik studeer Software Development aan het Mediacollege Amsterdam en werk daarnaast als frontend web developer bij Mila Health. In mijn eigen werk combineer ik techniek met gevoel voor ontwerp.' ); ?></p><p><?php echo portfolio_text( 'about_detail', 'Van een eerste idee tot een werkende website: ik vind het leuk om complexe vragen terug te brengen tot een oplossing die logisch aanvoelt voor de gebruiker.' ); ?></p><ul class="facts" aria-label="Profielgegevens"><li><strong>Locatie</strong><span>Hoorn, Noord-Holland</span></li><li><strong>Opleiding</strong><span>Software Development · Mediacollege Amsterdam</span></li><li><strong>Focus</strong><span>Frontend, fullstack en UI-ontwerp</span></li></ul></div></div></section>
	<section class="section" id="projecten" aria-labelledby="projects-title"><div class="site-container"><div class="section-heading"><div><p class="eyebrow">02 / Geselecteerd werk</p><h2 id="projects-title"><?php echo portfolio_text( 'projects_heading', 'Projecten met aandacht gemaakt.' ); ?></h2></div><p><?php echo portfolio_text( 'projects_intro', 'Een selectie van opdrachten en projecten waarin ontwerp, code en een duidelijk doel samenkomen.' ); ?></p></div><div class="project-grid">
		<article class="project-card project-card-dark"><div class="project-visual visual-health"><span class="visual-label">Mila Health</span><span class="visual-line"></span></div><div class="project-content"><p class="project-type">Frontend development</p><h3><?php echo portfolio_text( 'project_1_heading', 'Een rustige digitale omgeving voor gezondheid.' ); ?></h3><p><?php echo portfolio_text( 'project_1_text', 'Een heldere interface waarin inhoud en toegankelijkheid vooropstaan.' ); ?></p><div class="tag-list"><span>Webflow</span><span>UI design</span></div></div></article>
		<article class="project-card project-card-light"><a class="project-visual visual-wedding" href="https://trouwambtenaarmarlies.nl" target="_blank" rel="noopener"><span class="visual-script">Marlies</span><span class="visual-label">Trouwambtenaar ↗</span></a><div class="project-content"><p class="project-type">Webdesign &amp; development</p><h3><?php echo portfolio_text( 'project_2_heading', 'Een persoonlijke website voor een bijzonder moment.' ); ?></h3><p><?php echo portfolio_text( 'project_2_text', 'Warm, persoonlijk en ontworpen om vertrouwen te geven.' ); ?></p><div class="tag-list"><span>WordPress</span><span>CSS</span></div></div></article>
		<article class="project-card project-card-accent"><div class="project-visual visual-tom"><span>&lt;/&gt;</span></div><div class="project-content"><p class="project-type">Eigen project</p><h3><?php echo portfolio_text( 'project_3_heading', 'TomWebsites: van idee naar online.' ); ?></h3><p><?php echo portfolio_text( 'project_3_text', 'Een fullstack basis voor websites die mooi zijn en resultaat leveren.' ); ?></p><div class="tag-list"><span>PHP</span><span>JavaScript</span></div></div></article>
	</div></div></section>
	<section class="contact-section" id="contact" aria-labelledby="contact-title"><div class="site-container contact-grid"><div><p class="eyebrow">03 / Contact</p><h2 id="contact-title"><?php echo portfolio_text( 'contact_heading', 'Heb je een plek voor mij?' ); ?></h2></div><div><p><?php echo portfolio_text( 'contact_text', 'Ik maak graag kennis met teams die een nieuwsgierige developer kunnen gebruiken. Stuur me een bericht, dan vertel ik je meer over wat ik kan bijdragen.' ); ?></p><a class="contact-email" href="mailto:info@tomwebsites.nl">info@tomwebsites.nl <span aria-hidden="true">↗</span></a></div></div></section>
</main>
<footer class="site-footer"><div class="site-container footer-inner"><span>© <?php echo esc_html( gmdate( 'Y' ) ); ?> Tom De Jong</span><a href="https://www.linkedin.com/in/tom-de-jong-125756345/" rel="me">LinkedIn ↗</a></div></footer>
<?php wp_footer(); ?>
</body>
</html>
