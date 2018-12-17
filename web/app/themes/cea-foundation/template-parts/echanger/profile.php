<?php
$user = wp_get_current_user();
$cea_user = new cea_user($user->ID);
$modif = filter_input(INPUT_GET,'modif',FILTER_SANITIZE_NUMBER_INT);
if (is_user_logged_in() && $cea_user->id) {
    ?>
    <div class="grid-container full">
        <div class="grid-x grid-padding-x grid-padding-y text-center align-center" >
            <div class="cell">
                <?php echo get_avatar($cea_user->id, 100); ?> 
            </div>
            <div class="cell text-center">
                <h4><small><?= __('Bonjour','cea'); ?></small></h4>
                <h4><?= $user->first_name.' '.$user->last_name;?></h4>
            </div>
            <div class="cell">
                <div class="stacked-for-medium button-group">
                    <a href="" class="button"><?php _e('home', 'cea'); ?></a>
                    <a href="/members/<?= $user->user_login; ?>/" class="button"><?php _e('Ma page', 'cea'); ?></a>
                    <a href="<?= wp_logout_url(get_permalink('23')); ?>" class="button"><?php _e('D&eacute;connection', 'cea'); ?></a>
                </div>

            </div>
            <div class="cell large-10">
							<h5><small><i class="la la-2x la-users"></i></small></h5>
                <h5><?php _e('Mes groupes', 'cea'); ?></h5>
                <ul class="no-bullet group-list">
                    <?php
                    $groupes = $cea_user->groupes;
                    if ($groupes) {
                        foreach ($groupes as $gid) {
                            $groupe = get_post($gid);
                            ?><li><a href="/workgroups/<?= $groupe->post_name; ?>/"><?= $groupe->post_title; ?></a></li><?php
                        }
                    } else {
                        echo __('vous ne fa&icirc;tes parti d\'aucun groupe', '');
                    }
                    ?>
                </ul>
            </div>

            <div class="cell large-10">
							<h5><small><i class="la la-2x la-file"></i></small></h5>
                <h5><?php _e('Mes articles', 'cea'); ?></h5>
                <ul class="no-bullet group-list">
                    <?php $mesposts = $cea_user->get_all_posts(); ?>
                    <?php foreach ($mesposts as $art) {
                        ?><li><a href="<?= get_the_permalink($art->ID); ?>"><?= $art->post_title; ?></a></li><?php
                    }
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
            <?php if(in_array('curator', (array) $user->roles) || in_array('administrator', (array) $user->roles)) : ?>
            <div class="cell large-10">
							<h5><small><i class="la la-2x la-clipboard"></i></small></h5>
              <h5><?php _e('Mes Curations', 'cea'); ?></h5>
                <ul class="no-bullet group-list">
                    <?php $mesposts = $cea_user->get_all_curations(); ?>
                    <?php foreach ($mesposts as $art) {
                        ?><li><a href="<?= get_the_permalink($art->ID); ?>"><?= $art->post_title; ?></a></li><?php
                    }
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
            <?php endif; ?>
            

            <div class="cell">
                
                <div class="breadcrumbs grid-x grid-padding-x grid-padding-y bg-blue">
                    <div class="cell">
                        <i class="fi-pencil"></i> <a href="/members/<?= $user->user_login; ?>/?modif=1">modifier le profil</a>
                    </div>
                </div>
            </div> 
        </div>

    </div>	
    <div class="reveal large" id="edit_profil" data-reveal>
        <h3><?= __('Modifiez votre profil', 'cea'); ?></h3>        
        <?php $cea_user->display_user_profile_form(); ?>
        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
   
<?php } else { ?>
    <div class="grid-container full bg-blanc">
        <div class="grid-x grid-padding-x grid-padding-y text-center" >
            <div class="cell">
                <!--<p><a href="<?= wp_login_url(); ?>"><?= __('Connectez vous pour pouvoir participer','cea'); ?></a></p>-->
                <?php get_template_part('template-parts/login'); ?>
            </div>
        </div>
    </div>
<?php
}
wp_reset_postdata();
?>
