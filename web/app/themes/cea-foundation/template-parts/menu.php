  		<nav class="site-navigation top-bar" role="navigation" data-sticky data-options="marginTop:0;" >
			<div class="top-bar-left">
				<div class="site-desktop-title top-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
<img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/cea-logo.svg" style="height:50px" alt="CEA" />
<?php //bloginfo( 'name' ); ?> &nbsp;&nbsp;&nbsp;<span>association fran&ccedil;aise des commissaires d'exposition</span></a>
				</div>
			</div>
			<div class="top-bar-right">
				<?php foundationpress_top_bar_r(); ?>

				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>
		</nav>