<footer class="footer">
    <div class="grid-container full">

        <div class="grid-x grid-padding-x grid-padding-y align-middle bg-black">

            <div class="cell small-6 medium-4 align-self-middle small-order-2 medium-order-1">
                <ul class="no-bullet text-center">

                    <li>
                        <a href="<?php echo get_permalink('35'); ?>">
                            <?= __('contact', 'cea'); ?>
                        </a>
                    </li>
                     <li><a href="mailto:&#105;%6ef%6f&#64;c%2d&#101;&#45;%61&#46;&#97;%73&#115;o%2e&#102;%72"><i class="la la-2x la-envelope"></i></a> <a href="<?= get_field('facebook', 'options'); ?>" target="_blank"><i class="la la-2x la-facebook"></i></a> <a href="<?= get_field('twitter', 'options'); ?>" target="_blank"><i class="la la-2x la-instagram"></i></a></li>
                </ul>
            </div>

            <div class="cell medium-4 border-left border-right small-order-1 medium-order-2">
                <ul class="no-bullet text-center">
                    <li><?php get_template_part('template-parts/mailchimp'); ?>
                    </li>
                   
                </ul>
            </div>

            <div class="cell small-6 medium-4 small-order-3">
                <ul class="no-bullet text-center">
                    <li>
                        <a href="<?php echo get_permalink('7361'); ?>">
                            <?= __('informations l&eacute;gales', 'cea'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_permalink('7396'); ?>">
                            <?= __('cr&eacute;dits', 'cea'); ?>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="partners grid-x grid-padding-x grid-padding-y align-middle border-top">
            <div class="cell medium-12 text-center">
                <a href="https://www.cnc.fr/professionnels/aides-et-financements/nouveaux-medias-et-creation-numerique/dispositif-pour-la-creation-artistique-multimedia-et-numerique-dicream_191324/"><img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/partenaires/CNC-DICREAM.jpg" style="height:80px" /></a>
                <a href="http://www.culturecommunication.gouv.fr/"><img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/partenaires/MarianneMC.jpg" style="height:80px" /></a>
                <a href="https://www.citedesartsparis.net/"><img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/partenaires/cite-des-arts.png" style="height:80px" /></a> &nbsp;
                <a href="http://www.cipac.net/"><img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/partenaires/cipac.jpg" style="height:30px" /></a> &nbsp;

            </div>
        </div>

        <?php //dynamic_sidebar( 'footer-widgets' ); ?>

    </div>


</footer>


<div class="bandeau show-for-medium">
    <marquee height="30" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 5, 0);" scrolldelay="60" direction="left" behavior="scroll" scrollamount="5">
        <?= get_posts_marquee(); ?>
    </marquee>
</div>

<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
    </div>
    <!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>


</body>

</html>