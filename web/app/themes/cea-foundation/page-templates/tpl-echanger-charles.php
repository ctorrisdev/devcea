<?php
/*
  Template Name: echanger DEV
 */

acf_form_head();
get_header();

$groupeid = filter_input(INPUT_GET, "groupe", FILTER_SANITIZE_NUMBER_INT);

$user = wp_get_current_user();
$cea_user = new cea_user($user->ID);
?>
<?php while (have_posts()) : the_post(); ?>

    <div class="grid-container full">
        <div class="grid-x">


            <div class="cell medium-2 bg-informer">
                <?php get_template_part('template-parts/echanger/profile'); ?>
            </div> 


            <div class="cell medium-2 border-left bg-lift">
                <div class="grid-container">
                    <div class="grid-x grid-padding-x grid-padding-y text-center">

                        <!-- descriptif groupe -->
                        <div class="cell bg-black">
                            <?php
                            if ($groupeid) {
                                $group = get_post($groupeid);
                                ?>
                                <h3><?= $group->post_title; ?></h3>
                                <?= $group->description; ?>
                                <?php if ($user && $cea_user): ?>
                                    <div class = "stacked-for-small small expanded button-group">
                                        <?php if (!$cea_user->is_in_group($groupeid)) : ?>
                                            <a href="?groupe=<?= $groupeid; ?>&act=join" class = "button hollow"><?php _e('rejoindre', ''); ?></a>
                                        <?php else : ?>
                                            <a href="?groupe=<?= $groupeid; ?>&act=quit" class="button hollow"><?php _e('quitter', ''); ?></a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php
                            }
                            ?>
                            <?php
                            if (in_array('curator', (array) $user->roles) || in_array('administrator', (array) $user->roles) || in_array('admin_cea', (array) $user->roles)) :
                                ?>
                                <p><button class="button hollow" data-open="add_group_form">Créer un nouveau groupe</button></p>
                            <?php endif;
                            ?>

                        </div>

                        <div class="cell bg-black">
                            <h5><?php _e('membres', ''); ?></h5>
                            <ul class="no-bullet text-center">
                                <?php $members = get_users_from_group($groupeid); ?>
                                <?php
                                if ($members) :
                                    foreach ($members as $member) {
                                        ?>
                                        <li><?= $member->display_name; ?></li>
                                        <?php
                                    }
                                endif;
                                ?>
                            </ul>
                        </div>


                        <!-- formulaire recherche groupe -->
                        <div class="cell bg-blanc border-bottom">
                            <form id="groupsearch">
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fi-magnifying-glass"></i></span>
                                    <input class="input-group-field" type="text" placeholder="Rechercher un groupe">
                                </div>
                            </form>
                            <div>
                                <ul class="no-bullet text-center group-list">
    <?= get_groupes_list(); ?>
                                </ul>
                            </div>	
                        </div>

                    </div>

                </div>
            </div>



            <div class="cell medium-8 border-left">

                <?php get_template_part('template-parts/echanger/comment-part'); ?>
    <?php get_template_part('template-parts/echanger/video-part'); ?>
            </div>





        </div>
    </div>

    <div class="reveal" id="add_group_form" data-reveal>
        <h3>Création d'un nouveau groupe</h3>        
    <?php display_wall_add_group_form(); ?>
    </div>

<?php endwhile; ?>

<?php
get_footer();
