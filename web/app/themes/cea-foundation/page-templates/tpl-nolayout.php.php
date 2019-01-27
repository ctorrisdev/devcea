<?php
/*
Template Name: tpl-nolayout
*/
get_header('creations'); ?>
<?php while(have_posts()) : the_post(); ?>

	
	<?php the_content(); ?>
	

<?php endwhile; ?>

<?php get_footer('creations'); ?>
