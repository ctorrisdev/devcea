<?php
/*
Template Name: tpl-structurer
*/
get_header(); ?>


<div class="grid-container full">
	<div class="grid-x ">
		<div class="cell medium-4 grid-padding-x grid-padding-y bg-structurer">
			<?php echo slider_post('29','3','bg-black'); ?>
		</div>		
		<div class="cell medium-4 padding-x padding-y border-left border-right">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div>
		<div class="cell medium-4 grid-padding-x grid-padding-y bg-echang">
			<?php echo slider_post('26','3','bg-black'); ?>
		</div>
	</div>
</div>
<?php get_footer();
