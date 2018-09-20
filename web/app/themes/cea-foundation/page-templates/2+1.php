<?php
/*
Template Name: pleine page + Sidebar
*/


get_header(); ?>

<div class="grid-container full">
	<div class="grid-x grid-padding-x grid-padding-y">

		<div class="cell medium-8">
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
			
		</div>
		<div class="cell medium-4 border-left">
			<?php get_sidebar(); ?>
		</div>

	</div>
</div>
<?php get_footer();
