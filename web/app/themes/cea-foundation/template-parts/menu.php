<?php
//MENU PRINCIPAL DESKTOP 
?>
<header id="main_menu" data-sticky data-options="marginTop:0;" data-check-every=-1 class="bg-blanc show-for-medium">

    <div class="grid-container full text-center">
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <div class="grid-x serif grid-padding-x grid-padding-y align-middle text-center logo-c-e-a">
                <div class="cell auto" style="border-right: 1px solid #000">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/logo-c.svg" alt="C" />
                </div>
                <div class="cell auto" style="border-right: 1px solid #000;border-left:1px solid #000">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/logo-e.svg" alt="E" />
                </div>
                <div class="cell auto" style="border-left: 1px solid #000">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/logo-a.svg" alt="A" />
                </div>
            </div>
        </a>
    </div>

    <nav class="site-navigation top-bar border-top" role="navigation" >

        <div class="menu-flex">
            <?php  foundationpress_top_bar_r(); ?>

        </div>
    </nav>
	

</header>

			<!-- MENU SMARTPHONE -->
        <header class="site-header" role="banner">
            <div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle(); ?>>
                 <button aria-label="<?php _e('Main Menu', 'foundationpress'); ?>" class="menu-icon" type="button" data-toggle="menu-off-small"></button>
                   <div class="title-bar-left  text-center">
                    <span class="site-mobile-title title-bar-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/cea-logo.svg" style="height:50px" class="cea-logo"/>
                        </a>
                    </span>
                </div>
            </div>

						<div class="off-canvas position-left" id="menu-off-small" data-off-canvas>
								<header class="text-center">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/cea-logo.svg" style="height:50px" class="cea-logo-menu"/>
								</header>
								<button class="close-button close-menu" aria-label="Close menu" type="button" data-close>
  <span aria-hidden="true">&times;</span>
</button>

						 <?php if (!get_theme_mod('wpt_mobile_menu_layout') || get_theme_mod('wpt_mobile_menu_layout') === 'topbar') : ?>
                <?php get_template_part('template-parts/mobile-top-bar'); ?>
            <?php endif; ?>
						</div>
					
</header>