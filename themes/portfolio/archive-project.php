<?php get_header(); ?>
<main id="main-content" class="section">
	<div class="site-container">
		<p class="eyebrow">Portfolio</p>
		<h1>Projecten</h1>
		<div class="project-grid">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php portfolio_project_card( get_the_ID() ); ?>
				<?php endwhile; ?>
			<?php else : ?>
				<p>Er zijn nog geen projecten gepubliceerd.</p>
			<?php endif; ?>
		</div>
		<?php the_posts_pagination(); ?>
	</div>
</main>
<?php get_footer(); ?>
