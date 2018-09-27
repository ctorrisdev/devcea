<?php
$user = wp_get_current_user();
$cea_user = new cea_user($user->ID);
?>

<div class="grid-container full bg-blanc">

    <div class="grid-x grid-padding-x grid-padding-y text-center" >
        <div class="cell">
            <?php echo get_avatar($cea_user->id, 100); ?> 
        </div>
        <div class="cell text-center">
            <h4><?= $user->display_name; ?></h4>
        </div>
        <div class="cell">
            <ul class="no-bullet">
                <li><a href=""><?php _e('home', ''); ?></a></li>
                <li><a href="/members/<?= $user->user_login; ?>/"><?php _e('Voir ma page curator', ''); ?></a></li>
            </ul>
            <ul class="no-bullet">
                <li><a href="<?= wp_logout_url(); ?>" class="button"><?php _e('D&eacute;connection', ''); ?></a></li>
            </ul>
        </div>
        <div class="cell">
            <h5><?php _e('Mes groupes', ''); ?></h5>
            <ul class="no-bullet group-list">
                <?php
                $groupes = $cea_user->groupes;
                if ($groupes) {

                    foreach ($groupes as $gid) {
                        $groupe = get_post($gid);
                        ?><li><a href="/workgroups/<?= $groupe->post_name; ?>/"><?= $groupe->post_title; ?></a></li><?php
                    }
                }
                ?>

            </ul>
            <a href="#" class="button expanded">cr&eacute;er un nouveau groupe</a>
        </div>

        <div class="cell">
            <h5><?php _e('Mes articles', ''); ?></h5>
            <ul class="no-bullet group-list">
                <?php $posts = $cea_user->get_all_posts(); ?>
                <?php foreach ($posts as $art) {
                    ?><li><a href="<?= get_the_permalink($art->ID); ?>"><?= $art->post_title; ?></a></li><?php
                } ?>
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