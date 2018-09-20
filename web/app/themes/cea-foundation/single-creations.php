<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 * cea#dev2018
 */

get_header('creations'); ?>
<?php while(have_posts()) : the_post(); ?>

	
	<?php the_content(); ?>
	

<?php endwhile; ?>

<?php get_footer('creations'); ?>
