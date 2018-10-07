<?php
/*
  Template Name: echanger
 */

acf_form_head();
get_header();

$groupeid = null;
$groupename = get_query_var('groupe_slug', null);



if ($groupename) {
    $args = array(
        'name' => $groupename,
        'post_type' => 'groupes',
        'post_status' => 'publish',
        'posts_per_page' => 1
    );
    $my_posts = get_posts($args);
    if ($my_posts)
        $groupeid = $my_posts[0]->ID;
}

$user = wp_get_current_user();
$cea_user = new cea_user($user->ID);
?>

<?php while (have_posts()) : the_post(); ?>

    <div class="grid-container full off-canvas-wrapper">
        <?php get_template_part('template-parts/profil-offcanvas'); ?>

        <div class="grid-x">

            <div class="cell medium-4 bg-zigzag" >
                <div class="grid-container">
                    <div class="grid-x grid-padding-x grid-padding-y text-center">
                    
                        <!-- login / user -->
                        <div class="cell">
                        <?php if ($cea_user->id) { ?>
                            <div class="button-group expanded">
                                <a type="button" class="button hollow" data-toggle="offCanvas">
                                    <i class="la la-lg la-user"></i> <?= __('Voir mon profil'); ?>
                                </a>
                            <?php
                            if (in_array('curator', (array) $user->roles) 
                                    || in_array('administrator', (array) $user->roles) 
                                    || in_array('admin_cea', (array) $user->roles)) :
                                ?>
                                <a class="button hollow" data-open="add_group_form"><?= __('Créer un nouveau groupe'); ?></a>
                            <?php endif;
                            ?>
                            </div>
                        	<?php } else{ ?>
                        	<?php get_template_part('template-parts/login'); ?>
                        	<!--<a type="button" class="button hollow expanded" data-toggle="offCanvas">
                        	<i class="la la-lg la-user"></i> <?= __('Connectez-vous'); ?>
                        	</a>-->
                        	<?php } ?>
                        </div>
                    
                    	<!-- formulaire recherche groupe -->
                        <div class="cell bg-blanc border-top border-bottom">
                        
                            <div class="grid-container full">
                                <div class="grid-x">
                                    <div class="cell">
                                        <form id="groupsearch">
                                            <div class="input-group">
                                                <span class="input-group-label"><i class="la la-lg la-search"></i></span>
                                                <input class="input-group-field" type="text" placeholder="<?= __('Rechercher un groupe'); ?>">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
	
                        	<h3>Liste des groupes</h3>
                            
                            <div>
                                <ul class="no-bullet text-center group-list">
                                    <?= get_groupes_list(); ?>
                                </ul>
                            </div>	
                        </div>

                        <!-- descriptif groupe -->
                        <div class="cell bg-black">
                            <?php
                            if ($groupeid) {
                                $group = get_post($groupeid);
                                ?>
                                <h3><?= $group->post_title; ?></h3>
                                &mdash;
                                <p><?= $group->description; ?></p>
                                <?php if (is_user_logged_in() && $cea_user): ?>
      
                                        <?php if (!$cea_user->is_in_group($groupeid)) : ?>
                                            <a href="?act=join&groupe=<?=$groupeid;?>" class = "button" title="Rejoindre"><i class="la la-2x la-user-plus"></i> <?php _e('rejoindre le groupe', ''); ?></a>
                                        <?php else : ?>
                                            <a href="?act=quit&groupe=<?=$groupeid;?>" class="button"><i class="la la-2x la-user-minus"></i> <?php _e('quitter', ''); ?></a>
                                        <?php endif; ?>
                                <?php endif; ?>
                                <?php
                            }
                            ?>
                            <?php
                            /*
                            if (in_array('curator', (array) $user->roles) 
                                    || in_array('administrator', (array) $user->roles) 
                                    || in_array('admin_cea', (array) $user->roles)) :
                                ?>
                                <button class="button hollow expanded" data-open="add_group_form"><?= __('Créer un nouveau groupe'); ?></button>
                                
                            <?php endif */
                            ?>
                        </div>
                        <?php if ($groupeid) { ?>
                            <div class="cell bg-black">
                            	<i class="la la-3x la-users"></i>
                                <h5><?php _e('membres', ''); ?></h5>
                                <ul class="no-bullet text-center">
                                    <?php $members = get_users_from_group($groupeid); ?>
                                    <?php
                                    if ($members) :
                                        foreach ($members as $member) {
                                            ?>
                                            <li><a href="/members/<?= $member->user_login; ?>"><?= $member->display_name; ?></a></li>
                                            <?php
                                        }
                                    endif;
                                    ?>
                                </ul>
                            </div>
                        <?php } ?>




                    </div>

                </div>
            </div>



            <div class="cell medium-8 border-left">

                <?php
                set_query_var('groupeid', $groupeid);
                get_template_part('template-parts/echanger/comment-part', "groupeid");
                ?>

            </div>


        </div>
    </div>


    <div class="reveal" id="add_group_form" data-reveal>
        <h3>Création d'un nouveau groupe</h3>        
        <?php display_wall_add_group_form(); ?>
        <button class="close-button" data-close aria-label="Close modal" type="button">
		    <span aria-hidden="true">&times;</span>
		  </button>
    </div>

    <div class="reveal" id="mydropmodal" data-reveal>
    	<br><br>
        <div class="editmode" style="display:none;">
            <input type="text" id="com_editor" name="com_editor" value="" />
        </div>
        <form id="ceadrop" class="dropzone">
        </form>
        <br>        
        <div class="editmode">
            <button class="hollow button expanded edition_submit"><?= __('Modifier le post'); ?></button>
        </div>
        <button class="close-button" data-close aria-label="Close modal" type="button">
		    <span aria-hidden="true">&times;</span>
		  </button>
    </div>

  


<?php endwhile; ?>

<?php
get_footer();
