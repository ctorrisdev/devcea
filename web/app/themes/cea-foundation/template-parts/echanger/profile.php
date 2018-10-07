<?php
$user = wp_get_current_user();
$cea_user = new cea_user($user->ID);
if ($cea_user->id) {
    ?>

    <div class="grid-container full">
        <div class="grid-x grid-padding-x grid-padding-y text-center align-center" >
            <div class="cell">
                <?php echo get_avatar($cea_user->id, 100); ?> 
            </div>
            <div class="cell text-center">
                <h4><?= $user->display_name; ?></h4>
            </div>
            <div class="cell">
                <div class="stacked-for-small button-group">
                    <a href="" class="button"><?php _e('home', ''); ?></a>
                    <a href="/members/<?= $user->user_login; ?>/" class="button"><?php _e('Ma page', ''); ?></a>
                    <a href="<?= wp_logout_url(get_permalink('23')); ?>" class="button"><?php _e('D&eacute;connection', ''); ?></a>
                    </div>
                
            </div>
            <div class="cell large-10">
                <i class="la la-3x la-users"></i>
                <h5><?php _e('Mes groupes', ''); ?></h5>
                <ul class="no-bullet group-list">
                    <?php
                    $groupes = $cea_user->groupes;
                    if ($groupes) {
                        foreach ($groupes as $gid) {
                            $groupe = get_post($gid);
                            ?><li><a href="/workgroups/<?= $groupe->post_name; ?>/"><?= $groupe->post_title; ?></a></li><?php
                        }
                    }else{
                    echo __('vous ne fa&icirc;tes parti d\'aucun groupe','');
                    }
                    
                    ?>
                </ul>
            </div>

            <div class="cell large-10">
                <i class="la la-3x la-file-text"></i>
                <h5><?php _e('Mes articles', ''); ?></h5>
                <ul class="no-bullet group-list">
                    <?php $posts = $cea_user->get_all_posts(); ?>
                    <?php foreach ($posts as $art) {
                        ?><li><a href="<?= get_the_permalink($art->ID); ?>"><?= $art->post_title; ?></a></li><?php }
                    ?>
                </ul>
            </div>

            <div class="cell">
                <?php get_template_part('template-parts/editor-part'); ?>
            </div>
        </div>

    </div>	
    <div class="reveal" id="edit_profil" data-reveal>
        <h3>Profil</h3>        
        <?php $cea_user->display_user_profile_form(); ?>
    </div>
<?php } else { ?>
    <div class="grid-container full bg-blanc">
        <div class="grid-x grid-padding-x grid-padding-y text-center" >
            <div class="cell">
                <!--<p><a href="<?= wp_login_url(); ?>"><?= __('Connectez vous pour pouvoir participer'); ?></a></p>-->
                <?php get_template_part('template-parts/login'); ?>
            </div>
        </div>
    </div>
<?php } ?>
