<?php
function portfolio_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'portfolio_setup' );

function portfolio_enqueue_assets() {
	wp_enqueue_style( 'portfolio-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'portfolio_enqueue_assets' );

function portfolio_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'portfolio_content',
		array(
			'title'    => 'Portfolio teksten',
			'priority' => 30,
		)
	);

	$fields = array(
		'hero_intro'     => array( 'label' => 'Introductie', 'default' => 'Ik ben Tom De Jong, een freelance fullstack software developer die graag heldere interfaces en betrouwbare weboplossingen maakt.' ),
		'about_heading'  => array( 'label' => 'Over mij: kop', 'default' => 'Nieuwsgierig, zorgvuldig en altijd in beweging.' ),
		'about_text'     => array( 'label' => 'Over mij: tekst', 'default' => 'Ik studeer Software Development aan het Mediacollege Amsterdam en werk daarnaast als frontend web developer bij Mila Health. In mijn eigen werk combineer ik techniek met gevoel voor ontwerp.' ),
		'about_detail'   => array( 'label' => 'Over mij: tweede alinea', 'default' => 'Van een eerste idee tot een werkende website: ik vind het leuk om complexe vragen terug te brengen tot een oplossing die logisch aanvoelt voor de gebruiker.' ),
		'projects_heading' => array( 'label' => 'Projecten: kop', 'default' => 'Projecten met aandacht gemaakt.' ),
		'projects_intro' => array( 'label' => 'Projecten: intro', 'default' => 'Een selectie van opdrachten en projecten waarin ontwerp, code en een duidelijk doel samenkomen.' ),
		'project_1_heading' => array( 'label' => 'Mila Health: kop', 'default' => 'Een rustige digitale omgeving voor gezondheid.' ),
		'project_1_text' => array( 'label' => 'Mila Health: tekst', 'default' => 'Een heldere interface waarin inhoud en toegankelijkheid vooropstaan.' ),
		'project_2_heading' => array( 'label' => 'Trouwambtenaar Marlies: kop', 'default' => 'Een persoonlijke website voor een bijzonder moment.' ),
		'project_2_text' => array( 'label' => 'Trouwambtenaar Marlies: tekst', 'default' => 'Warm, persoonlijk en ontworpen om vertrouwen te geven.' ),
		'project_3_heading' => array( 'label' => 'TomWebsites: kop', 'default' => 'TomWebsites: van idee naar online.' ),
		'project_3_text' => array( 'label' => 'TomWebsites: tekst', 'default' => 'Een fullstack basis voor websites die mooi zijn en resultaat leveren.' ),
		'contact_heading' => array( 'label' => 'Contact: kop', 'default' => 'Heb je een plek voor mij?' ),
		'contact_text'   => array( 'label' => 'Contact: tekst', 'default' => 'Ik maak graag kennis met teams die een nieuwsgierige developer kunnen gebruiken. Stuur me een bericht, dan vertel ik je meer over wat ik kan bijdragen.' ),
	);

	foreach ( $fields as $key => $field ) {
		$wp_customize->add_setting(
			'portfolio_' . $key,
			array(
				'default'           => $field['default'],
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		);
		$wp_customize->add_control(
			'portfolio_' . $key,
			array(
				'label'   => $field['label'],
				'section' => 'portfolio_content',
				'type'    => 'textarea',
			)
		);
	}
}
add_action( 'customize_register', 'portfolio_customize_register' );

function portfolio_text( $key, $default = '' ) {
	return esc_html( get_theme_mod( 'portfolio_' . $key, $default ) );
}
