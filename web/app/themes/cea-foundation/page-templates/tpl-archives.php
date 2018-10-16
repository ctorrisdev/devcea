<?php
/*
Template Name: tpl-archives
*/

get_header(); ?>

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
			
		    <?php 
		$args = array(
				'post_type' => 'post',
				'category__not_in' => array( 24, 34 ),
				'posts_per_page' => '12',
				'paged' => $paged 
				);
		      $wp_query = new WP_Query( $args ); ?>
		    <div class="grid-container full">
			    <div class="grid-x grid-padding-x grid-padding-y list-posts bg-black small-up-1 medium-up-3" >
				    <?php if ( $wp_query-> have_posts() ) : ?>
				    <?php while (  $wp_query->have_posts() ) :  $wp_query->the_post(); ?>
			        <?php get_template_part( 'template-parts/content', 'search' ); ?>
			        <?php endwhile; ?>
			        <?php endif; ?>
			    </div>		    
		    
		    <?php get_template_part('template-parts/pagination-part'); ?>
		    </div>
		</div>

	</div>
</div>
<?php get_footer();
