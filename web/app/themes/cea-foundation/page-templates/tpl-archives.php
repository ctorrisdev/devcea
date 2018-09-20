<?php
/*
Template Name: tpl-archives
*/

get_header(); ?>

<div class="grid-container full">
	<div class="grid-x grid-padding-x grid-padding-y align-top bg-zigzag">

		<div class="cell medium-8 bg-blanc">
			<?php get_template_part('template-parts/breadcrumbs-part'); ?>
			
		    <?php $args = array('post_type' => 'post','posts_per_page' => '4' );
		      $wp_query = new WP_Query( $args ); ?>
      
		    <div class="grid-x list-posts-search small-up-2" >
			    <?php if ( $wp_query-> have_posts() ) : ?>
			    <?php while (  $wp_query->have_posts() ) :  $wp_query->the_post(); ?>
		        <?php get_template_part( 'template-parts/content', 'search' ); ?>
		        <?php endwhile; ?>
		        <?php endif; ?>
		    </div>		    
		    
		    <?php get_template_part('template-parts/pagination-part'); ?>
		</div>

		<div class="cell medium-4 border-left bg-zigzag">
			<?php get_sidebar(); ?>
		</div>

	</div>
</div>
<?php get_footer();
