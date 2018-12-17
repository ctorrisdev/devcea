<?php
/*
template "recherche" / CEA
*/

get_header(); 
?>

<div class="grid-container full">
	<div class="grid-x">
	
	    <div class="cell small-12 bg-blanc">
            <div class="grid-container full">
				<div class=" grid-x grid-padding-x grid-padding-y ">
				    <div class="cell text-center">
			            <span class="h6" class="entry-title"><?php _e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"</span>
		            </div>
		        </div>
		    </div>
		</div>
	
		<div class="cell small-12">
			<div class="grid-container full">
				<aside class="sidebar grid-x grid-padding-x grid-padding-y small-up-1 medium-up-3 bg-black align-middle">
					<?php dynamic_sidebar( 'archives'); ?>
				</aside>
			</div>
		</div>

		<div class="cell bg-blanc">
		    <div class="grid-container full">
			    <div class="grid-x grid-padding-x grid-padding-y list-posts bg-black small-up-1 medium-up-3" >
				    <?php if ( have_posts() ) : ?>
				    
				    <?php while ( have_posts() ) : the_post(); ?>
			        <?php get_template_part( 'template-parts/content', 'search' ); ?>
			        <?php endwhile; ?>
			        <?php else : ?>
				    <?php get_template_part( 'template-parts/content', 'none' ); ?>
		        	<?php endif; // End have_posts() check. ?>
						
						 <?php 
						
							if($wp_query->post_count != 12 && $wp_query->post_count != 9 && $wp_query->post_count != 6 && $wp_query->post_count != 3){
								echo '<div class="cell auto bg-zigouigoui"></div>';
							} 
						else{
							echo '';
						}
						?>
			    </div>		    
		    
		    <?php get_template_part('template-parts/pagination-part'); ?>
		    </div>
		</div>

	</div>
</div>
<?php get_footer();

