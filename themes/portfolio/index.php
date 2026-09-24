<?php get_header(); ?>
<?php if ( isset( $portfolio_template_test_heading ) ) : ?>
	<p class="template-test-heading"><?php echo esc_html( $portfolio_template_test_heading ); ?></p>
<?php endif; ?>
<main id="main-content">
	<section class="hero" id="top" aria-labelledby="hero-title"><div class="site-container hero-grid"><div class="hero-copy"><p class="eyebrow">Software developer · Hoorn</p><h1 id="hero-title">Ik bouw digitale ervaringen die <em>werken.</em></h1><p class="hero-intro"><?php echo portfolio_text( 'hero_intro', 'Ik ben Tom De Jong, een freelance fullstack software developer die graag heldere interfaces en betrouwbare weboplossingen maakt.' ); ?></p><div class="hero-actions"><a class="button button-primary" href="#projecten">Bekijk mijn werk <span aria-hidden="true">↗</span></a><a class="text-link" href="#contact">Neem contact op</a></div></div><div class="hero-aside" aria-label="Beschikbaar voor een stage"><div class="availability"><span class="status-dot"></span> Beschikbaar voor een stage</div><img src="https://tomwebsites.nl/assets/tomproflilepicture-Dk5ZWUts.webp" alt="Portret van Tom De Jong" width="240" height="240"></div></div></section>
	<section class="section section-paper" id="over-mij" aria-labelledby="about-title"><div class="site-container split-grid"><div><p class="eyebrow">01 / Over mij</p><h2 id="about-title"><?php echo portfolio_text( 'about_heading', 'Nieuwsgierig, zorgvuldig en altijd in beweging.' ); ?></h2></div><div class="section-copy"><p><?php echo portfolio_text( 'about_text', 'Ik studeer Software Development aan het Mediacollege Amsterdam en werk daarnaast als frontend web developer bij Mila Health. In mijn eigen werk combineer ik techniek met gevoel voor ontwerp.' ); ?></p><p><?php echo portfolio_text( 'about_detail', 'Van een eerste idee tot een werkende website: ik vind het leuk om complexe vragen terug te brengen tot een oplossing die logisch aanvoelt voor de gebruiker.' ); ?></p><ul class="facts" aria-label="Profielgegevens"><li><strong>Locatie</strong><span>Hoorn, Noord-Holland</span></li><li><strong>Opleiding</strong><span>Software Development · Mediacollege Amsterdam</span></li><li><strong>Focus</strong><span>Frontend, fullstack en UI-ontwerp</span></li></ul></div></div></section>
	<section class="section" id="projecten" aria-labelledby="projects-title"><div class="site-container"><div class="section-heading"><div><p class="eyebrow">02 / Geselecteerd werk</p><h2 id="projects-title"><?php echo portfolio_text( 'projects_heading', 'Projecten met aandacht gemaakt.' ); ?></h2></div><p><?php echo portfolio_text( 'projects_intro', 'Een selectie van opdrachten en projecten waarin ontwerp, code en een duidelijk doel samenkomen.' ); ?></p></div><div class="project-grid">
		<?php
		$portfolio_projects = new WP_Query(
			array(
				'post_type'      => 'project',
				'posts_per_page' => 3,
				'post_status'    => 'publish',
			)
		);
		if ( $portfolio_projects->have_posts() ) :
			while ( $portfolio_projects->have_posts() ) :
				$portfolio_projects->the_post();
				portfolio_project_card( get_the_ID() );
			endwhile;
			wp_reset_postdata();
		else :
			?><p>Er zijn nog geen projecten gepubliceerd.</p><?php
		endif;
		?>
	</div></div></section>
	<section class="contact-section" id="contact" aria-labelledby="contact-title"><div class="site-container contact-grid"><div><p class="eyebrow">03 / Contact</p><h2 id="contact-title"><?php echo portfolio_text( 'contact_heading', 'Heb je een plek voor mij?' ); ?></h2></div><div><p><?php echo portfolio_text( 'contact_text', 'Ik maak graag kennis met teams die een nieuwsgierige developer kunnen gebruiken. Stuur me een bericht, dan vertel ik je meer over wat ik kan bijdragen.' ); ?></p><a class="contact-email" href="mailto:info@tomwebsites.nl">info@tomwebsites.nl <span aria-hidden="true">↗</span></a></div></div></section>
</main>
<?php get_footer(); ?>
