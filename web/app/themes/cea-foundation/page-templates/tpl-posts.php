<?php
/*
Template Name: tpl-posts
*/


get_header(); ?>

<div class="grid-container full">
	<div class="grid-x grid-padding-x grid-padding-y">

		<div class="cell medium-4 list-posts">
			
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; // End have_posts() check. ?>

			<?php /* Display navigation to next/previous pages when applicable */ ?>
			
			<?php
			if ( function_exists( 'foundationpress_pagination' ) ) :
			
			?>
			<div class="grid-x grid-padding-x grid-padding-y border-top bg-black">
        <div class="cell small-12">
        <?php foundationpress_pagination(); ?>
        </div>
			</div>
			<?
			elseif ( is_paged() ) :
			?>
				<nav id="post-nav" >
					<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
					<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
				</nav>
			<?php endif; ?>
			
		</div>
		
		
		    	<div class="cell medium-4 bg-black text-center" style="padding-top: 2em justify-content: center">
        	<p class="h1 serif" style="font-weight: 600; ">
          Fondée en 2007,<br> C-E-A | Association française des commissaires d'exposition<br> a pour vocation de regrouper les personnes exerçant une activité de commissaire d'exposition d'art contemporain en France et de constituer une plateforme de réflexion, de promotion et d'organisation d'actions et de projets autour de cette activité. 
          	</p>
		</div>

		<div class="cell medium-4 border-left">
			<?php get_sidebar(); ?>
      
		</div>

	</div>
</div>
<?php get_footer();
