<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="grid-container full">
	<div class="grid-x grid-padding-x grid-padding-y  align-top bg-search">

		<div class="cell medium-8 bg-blanc">
      
      <div class="grid-x grid-padding-x grid-padding-y bg-black">
					<div class="cell">
			      <h3 class="entry-title"><?php _e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"</h3>
					</div>
			</div>
      <div class="grid-x list-posts-search small-up-2" >

          <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>
               <?php get_template_part( 'template-parts/content', 'search' ); ?>
            <?php endwhile; ?>

          <?php endif; ?>
      </div>
      <?php
      if ( function_exists( 'foundationpress_pagination' ) ) :
      ?>
      <div class="grid-x grid-padding-x grid-padding-y border-top bg-black">
        <div class="cell">
          <?php foundationpress_pagination(); ?>
        </div>
       </div>
      <?php endif; ?>
     
      </div>

			<div class="cell medium-4 border-left">
			<?php get_sidebar(); ?>
		</div>

	</div>
</div>
<?php get_footer();
