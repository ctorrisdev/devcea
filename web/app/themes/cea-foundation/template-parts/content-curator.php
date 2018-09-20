<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
	<?php
	if ( is_single() ) {
		the_title( '<h2 class="entry-title">', '</h2>' );
	} else {
		the_title( '<h3 class="entry-title">', '</h3>' );
	}
	?>
	<?
	if ( has_tag('12') ) {
    echo '<img class="badge-tag" src="'.get_template_directory_uri().'/images/std.svg" />';
} 
if ( has_tag('11') ) {
    echo '<img class="badge-tag" src="'.get_template_directory_uri().'/images/tb.svg" />';
} 
	 		?>
	</header>
	<br>
	<div class="entry-content">
		<?php 
 
		if ( is_single() ) {
				the_content();
		 edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' );
		} else {
			the_excerpt();
			echo '<a class="hollow button" href="' . esc_url( get_permalink() ) . '" rel="bookmark">Lire la suite</a>';
		} ?>
		
	</div>
	<?php foundationpress_entry_meta(); ?>
	<footer>
		<?php
			wp_link_pages(
				array(
					'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
					'after'  => '</p></nav>',
				)
			);
		?>
		<?php //$tag = get_the_tags(); if ( $tag ) { ?><p><?php //the_tags(); ?></p><?php //} ?>
	</footer>
</article>
