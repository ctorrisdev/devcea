<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if ( has_post_thumbnail( $post->ID ) ) : ?>
	<header role="banner">
	<?php the_post_thumbnail( 'large' ); ?>
	<p><?php  the_post_thumbnail_caption( $post->ID ); ?></p>
	</header>
<?php endif;
