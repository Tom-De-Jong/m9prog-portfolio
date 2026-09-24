<?php get_header(); ?>
<main id="main-content" class="section project-single">
	<div class="site-container">
		<?php while ( have_posts() ) : the_post(); ?>
			<p class="eyebrow">Project</p>
			<h1><?php the_title(); ?></h1>
			<?php if ( has_post_thumbnail() ) : ?><div class="project-single-image"><?php the_post_thumbnail( 'large' ); ?></div><?php endif; ?>
			<div class="project-single-content">
				<?php the_content(); ?>
				<?php $project_url = get_post_meta( get_the_ID(), '_portfolio_project_url', true ); ?>
				<?php if ( $project_url ) : ?><p><a class="button button-primary" href="<?php echo esc_url( $project_url ); ?>" target="_blank" rel="noopener">Bekijk het project <span aria-hidden="true">↗</span></a></p><?php endif; ?>
			</div>
		<?php endwhile; ?>
	</div>
</main>
<?php get_footer(); ?>