 <header data-sticky data-options="marginTop:0;" data-check-every=-1 class="bg-blanc">
 
         <div class="grid-container full text-center">
            <div class="grid-x serif grid-padding-x grid-padding-y align-middle text-center logo-c-e-a">
                <div class="cell auto" style="border-right: 1px solid #000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-c.svg" alt="C" />
                </div>
                <div class="cell auto" style="border-right: 1px solid #000;border-left:1px solid #000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-e.svg" alt="E" />
                </div>
                <div class="cell auto" style="border-left: 1px solid #000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-a.svg" alt="A" />
                </div>
            </div>
        </div>

  		<nav class="site-navigation top-bar border-top" role="navigation" >

			<div class="menu-flex">
				<?php foundationpress_top_bar_r(); ?>

				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>
		</nav>
</header>