<?php
$user = wp_get_current_user();
$cea_user = new cea_user($user->ID);
if ($cea_user->id) {
    ?>
    <div  class="title-bar bg-black" data-responsive-toggle="responsive-menu-profile" data-hide-for="medium">
        <button class="menu-icon" type="button" data-toggle="responsive-menu-profile" style="color: white"></button>
        <div class="title-bar-title">
            <?= __('mon profil', 'cea'); ?>
        </div>
    </div>

    <div id="responsive-menu-profile" class="top-bar bg-black profile_menutop">
        <div class="top-bar-left">

            <div class="grid-container fluid">
                <div class="grid-x  grid-padding-x align-middle">
                    <div class="cell medium-1 text-center">

                        <a href="/members/<?= $user->user_login; ?>/">
                            <?= $user->display_name; ?>
                        </a>
                    </div>
                    <div class="cell small-12 medium-auto">
                        <select class="bg-black"  onChange="window.location.href = '/' + this.value + '/'">
                            <option disabled selected><?= __('Mes articles', 'cea'); ?></option>
                            <?php $mesposts = $cea_user->get_all_posts(); ?>
                            <?php foreach ($mesposts as $art) { ?>
                                <option value="<?= $art->post_name; ?>"><?= $art->post_title; ?></a></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="cell small-12 medium-auto">
                        <select class="bg-black" onChange="window.location.href = '/workgroups/' + this.value + '/'">
                            <option disabled selected><?= __('Mes groupes', 'cea'); ?></option>
                            <?php
                            $groupes = $cea_user->groupes;
                            if ($groupes) {
                                foreach ($groupes as $gid) {
                                    $groupe = get_post($gid);
                                    ?>
                                    <option value="<?= $groupe->post_name; ?>"><?= $groupe->post_title; ?></a></option><?php
                                }
                            } else {
                                echo __('vous ne fa&icirc;tes parti d\'aucun groupe', '');
                            }
                            ?>						
                        </select>
                    </div>

                    <div class="cell small-12 medium-auto">
                        <select class="bg-black"  onChange="window.location.href = '/creations/' + this.value + '/'">
                            <option disabled selected><?= __('Mes cr&eacute;ations', 'cea'); ?></option>
                            <?php
                            $groupes = $cea_user->groupes;
                            if ($groupes) {
                                foreach ($groupes as $gid) {
                                    $groupe = get_post($gid);
                                    ?>
                                    <option value="<?= $groupe->post_name; ?>"><?= $groupe->post_title; ?></a></option><?php
                                }
                            } else {
                                echo __('vous ne fa&icirc;tes parti d\'aucun groupe', '');
                            }
                            ?>						
                        </select>
                    </div>

                </div>

            </div>
        </div>


        <div class="top-bar-right">
            <ul class="menu">
                <li>
                    <a href="<?= wp_logout_url(get_permalink('23')); ?>">
                        <?php _e('D&eacute;connection', ''); ?>
                    </a>
                </li>

            </ul>
        </div>


    </div>
<?php } ?>