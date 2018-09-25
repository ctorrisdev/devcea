<?php
/*
Template Name: pleine page avec marge
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="grid-container full">
	<div class="grid-x grid-padding-x grid-padding-y">
		<main class="cell">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</main>
	</div>
</div>
<?php get_footer();