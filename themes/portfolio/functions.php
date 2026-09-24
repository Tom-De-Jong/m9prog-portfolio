<?php
function portfolio_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'portfolio_setup' );

function portfolio_register_project_post_type() {
	register_post_type(
		'project',
		array(
			'labels'       => array(
				'name'          => 'Projecten',
				'singular_name' => 'Project',
				'add_new_item'  => 'Nieuw project toevoegen',
				'edit_item'     => 'Project bewerken',
				'menu_name'     => 'Projecten',
			),
			'public'       => true,
			'has_archive'  => true,
			'menu_icon'    => 'dashicons-portfolio',
			'rewrite'      => array( 'slug' => 'projecten' ),
			'show_in_rest' => true,
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		)
	);
}
add_action( 'init', 'portfolio_register_project_post_type' );

function portfolio_refresh_project_rewrites() {
	portfolio_register_project_post_type();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'portfolio_refresh_project_rewrites' );

function portfolio_project_meta_box() {
	add_meta_box( 'portfolio_project_details', 'Projectgegevens', 'portfolio_render_project_meta_box', 'project', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'portfolio_project_meta_box' );

function portfolio_render_project_meta_box( $post ) {
	wp_nonce_field( 'portfolio_save_project', 'portfolio_project_nonce' );
	$project_type = get_post_meta( $post->ID, '_portfolio_project_type', true );
	$technologies = get_post_meta( $post->ID, '_portfolio_project_technologies', true );
	$project_url  = get_post_meta( $post->ID, '_portfolio_project_url', true );
	?>
	<p><label for="portfolio_project_type"><strong>Projecttype</strong></label><br><input class="widefat" type="text" id="portfolio_project_type" name="portfolio_project_type" value="<?php echo esc_attr( $project_type ); ?>" placeholder="Webdesign &amp; development"></p>
	<p><label for="portfolio_project_technologies"><strong>Technologieën</strong></label><br><input class="widefat" type="text" id="portfolio_project_technologies" name="portfolio_project_technologies" value="<?php echo esc_attr( $technologies ); ?>" placeholder="WordPress, PHP, CSS"><span class="description">Scheid meerdere technologieën met komma's.</span></p>
	<p><label for="portfolio_project_url"><strong>Projectlink</strong></label><br><input class="widefat" type="url" id="portfolio_project_url" name="portfolio_project_url" value="<?php echo esc_attr( $project_url ); ?>" placeholder="https://voorbeeld.nl"></p>
	<?php
}

function portfolio_save_project_meta( $post_id ) {
	if ( ! isset( $_POST['portfolio_project_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['portfolio_project_nonce'] ) ), 'portfolio_save_project' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'_portfolio_project_type'         => isset( $_POST['portfolio_project_type'] ) ? sanitize_text_field( wp_unslash( $_POST['portfolio_project_type'] ) ) : '',
		'_portfolio_project_technologies' => isset( $_POST['portfolio_project_technologies'] ) ? sanitize_text_field( wp_unslash( $_POST['portfolio_project_technologies'] ) ) : '',
		'_portfolio_project_url'          => isset( $_POST['portfolio_project_url'] ) ? esc_url_raw( wp_unslash( $_POST['portfolio_project_url'] ) ) : '',
	);

	foreach ( $fields as $key => $value ) {
		if ( '' === $value ) {
			delete_post_meta( $post_id, $key );
		} else {
			update_post_meta( $post_id, $key, $value );
		}
	}
}
add_action( 'save_post_project', 'portfolio_save_project_meta' );

function portfolio_project_card( $post_id ) {
	$project_type = get_post_meta( $post_id, '_portfolio_project_type', true );
	$technologies = get_post_meta( $post_id, '_portfolio_project_technologies', true );
	$project_url  = get_post_meta( $post_id, '_portfolio_project_url', true );
	$tags         = array_filter( array_map( 'trim', explode( ',', $technologies ) ) );
	$project_excerpt = get_the_excerpt( $post_id );
	$project_link = $project_url ? $project_url : get_permalink( $post_id );
	?>
	<article class="project-card">
		<a class="project-card-link" href="<?php echo esc_url( $project_link ); ?>"<?php echo $project_url ? ' target="_blank" rel="noopener"' : ''; ?>>
		<div class="project-visual">
			<?php if ( has_post_thumbnail( $post_id ) ) : ?>
				<?php echo get_the_post_thumbnail( $post_id, 'large', array( 'alt' => '', 'class' => 'project-image' ) ); ?>
			<?php else : ?>
				<span class="visual-label"><?php echo esc_html( get_the_title( $post_id ) ); ?></span>
			<?php endif; ?>
		</div>
		<div class="project-content">
			<?php if ( $project_type ) : ?><p class="project-type"><?php echo esc_html( $project_type ); ?></p><?php endif; ?>
			<h3><?php echo esc_html( get_the_title( $post_id ) ); ?></h3>
			<?php if ( $project_excerpt ) : ?><p><?php echo esc_html( $project_excerpt ); ?></p><?php endif; ?>
			<?php if ( $tags ) : ?><div class="tag-list"><?php foreach ( $tags as $tag ) : ?><span><?php echo esc_html( $tag ); ?></span><?php endforeach; ?></div><?php endif; ?>
		</div>
		</a>
	</article>
	<?php
}

function portfolio_enqueue_assets() {
	wp_enqueue_style( 'portfolio-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'portfolio-script', get_template_directory_uri() . '/script.js', array(), wp_get_theme()->get( 'Version' ), true );
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
