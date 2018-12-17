<?php
/*
Template Name: tpl-archives
*/

get_header(); 

?>

<div class="grid-container full">
	<div class="grid-x align-top bg-zigzag">
	
		<div class="cell small-12">
			<div class="grid-container full">
				<aside class="sidebar grid-x grid-padding-x grid-padding-y small-up-1 medium-up-3	bg-black align-middle">
					<?php dynamic_sidebar( 'archives'); ?>
				</aside>
				</div>
		
		</div>

		<div class="cell bg-blanc">
			
			<?php //get_template_part('template-parts/breadcrumbs-part'); ?>
			
		    <div class="grid-container full">
			    <div class="grid-x grid-padding-x grid-padding-y list-posts bg-black small-up-1 medium-up-3" >
				    <?php if ( have_posts() ) : ?>
				    
				    <?php while ( have_posts() ) : the_post(); ?>
			        <?php get_template_part( 'template-parts/content', 'search' ); ?>
			        <?php endwhile; ?>
			        <?php else : ?>
				    <?php get_template_part( 'template-parts/content', 'none' ); ?>
		        	<?php endif; // End have_posts() check. ?>
		        	<div class="cell auto bg-wiggle"></div>
			    </div>		    
		    
		    <?php get_template_part('template-parts/pagination-part'); ?>
		    </div>
		</div>

	</div>
</div>
<?php get_footer();

