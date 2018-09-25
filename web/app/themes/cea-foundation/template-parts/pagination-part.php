<?php if ( function_exists( 'foundationpress_pagination' ) ) : ?>
<div class="pagination grid-x grid-padding-x grid-padding-y border-top bg-black align-self-bottom">
	<div class="cell small-12">
		<?php foundationpress_pagination(); ?>
	</div>
</div>
<?php elseif ( is_paged() ) :?>
<nav id="post-nav" >
	<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
	<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
</nav>
<?php endif; ?>