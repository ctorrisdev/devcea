<?php
/*
  Template Name: curator
 */
acf_form_head();

get_header(); /*test*/

$user = wp_get_current_user();

$username = get_query_var('designer_slug', $user->username);
$modif = filter_input(INPUT_GET,'modif',FILTER_SANITIZE_NUMBER_INT);

if (!$username) {
    exit($username . ' Accès interdit');
}


$cea_user = new cea_user($username);
$profil = $cea_user->profil;
if (!$profil) {
    exit('erreur : ' . $username);
}
?>

<div class="grid-container full">
    <!-- nom + fonction -->
    <div class="grid-x grid-padding-x grid-padding-y text-center border-bottom">
        <div class="cell">
            <h2><?= $profil->first_name; ?> <?= $profil->last_name; ?><br>
                <small><?= $profil->titre; ?></small>
            </h2>
        </div>
    </div>



    <div class="grid-x">

        <div class="cell medium-12 large-8">	
            <!-- BIO -->	
            <div class="grid-x grid-padding-x" style="padding-top: 1em; padding-bottom: 1em; ">
                <div class="cell medium-6" style=""> 	
                    <?php echo get_avatar($profil->ID, 600); ?> 
                    <hr>
                    <h3><?= __('biographie', 'cea'); ?></h3>
                    <br>
                    <p><?= __('Vit et travaille : ', 'cea') . $profil->city . ', ' . $profil->pays; ?></p>
                    <p><?= $profil->biographie; ?></p>
                    
                    
                    <hr>
                    <h3>contact</h3>
                    <br>
                    <ul class="no-bullet">
										<?php if($profil->contact) :?>
                    <li><a href="mailto:<?= $profil->contact; ?>" class="tiny button hollow"><?= $profil->contact; ?></a></li>
                    <?php endif; ?>
                    <?php
                    if (have_rows('liens', 'user_' . $profil->ID)):
                        while (have_rows('liens', 'user_' . $profil->ID)) : the_row();
                            ?>
                            <li><a href="<?= get_sub_field('url'); ?>" target="_blank" class="tiny button hollow"><?= get_sub_field('intitule'); ?></a></li>
                        <?php
                        endwhile;
                    endif;
                    ?>
                    </ul>
                </div>

                <div class="cell medium-6 border-left">
                    <?= get_field('contenu_ancien_annuaire','user_'. $profil->ID); ?>
                    <h3><?= $profil->titre_de_la_timeline; ?></h3><br>
                    <div class="grid-x">
                        <?php
                        if (have_rows('timeline', 'user_' . $profil->ID)):
                            while (have_rows('timeline', 'user_' . $profil->ID)) : the_row();
                                ?>						
                                <div class="cell medium-2 year"><?= get_sub_field('date'); ?></div>
                                    <?php ?>
                                <div class="cell medium-10">
                                <?= get_sub_field('contenu'); ?>
                                </div>
                            <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>	 
            </div>
            <?php
            if ($profil->ID == $user->ID) {
                get_template_part('template-parts/editor-part');
            }
            ?>	
        </div>

        <div class="cell medium-12 large-4 border-left bg-informer">
            
            <?php
            $mesposts = $cea_user->get_all_posts();
            if ($mesposts) {
                ?>
            <div class="grid-container fluid">
                <div class="grid-x grid-padding-x grid-padding-y bg-black">
                    <div class="cell text-center">
                        <h4><?php _e('derniers articles', 'cea'); ?></h4>
                    </div>
                </div>
            </div>
                <div class="grid-x" >
                    <div class="orbit text-center bg-black padding-y" role="region" aria-label="curator-posts" data-options="autoPlay:false; " data-orbit >
                        <div class="orbit-wrapper">
                            

                            <ul tabindex="0" class="orbit-container">
                                <?php
                                foreach ($mesposts as $post) {
                                    ?>
                                    <li class="orbit-slide" aria-live="polite" style="top: 0px; display: block; position: relative; transition-duration: 0s;">
                                        <div class="slide-text slide_news" style='background: url("<?= get_template_directory_uri(); ?>//images/en_actu.svg") no-repeat center 5em / 400px;'>
                                            <div class="h2 serif"><?= $post->post_title; ?></div>
                                            <p><?= wp_trim_words( $post->post_content, 50, '...' ); ?></p>
                                            <a class="button hollow" href="<?= get_the_permalink($post->ID); ?>">Lire l'article</a>
                                        </div>
                                    </li>

    <?php } ?>
                            </ul>

                        </div>

                        <nav class="orbit-bullets">
                            <?php
                            $i = 0;
                            foreach ($mesposts as $post) {
                                ?>
                                <button class="" data-slide="<?= $i; ?>"><span class="show-for-sr"><?= $i; ?></span></button>
                                <?php
                                $i++;
                            }
                            ?>
                        </nav>
                    </div>

                </div>
<?php } ?>


        </div>

    </div>
	
	<!-- PAGINATION
    <div class="grid-x grid-padding-x grid-padding-y text-center" style="border-top: 1px solid #000; background: #000; color: #fff">
        <div class="cell medium-12" >	
<?php //the_post_navigation(); ?>
        </div>
    </div>
-->

</div>

<div class="reveal large" id="edit_profil" data-reveal>
    <h3>Profil</h3>        
<?php $cea_user->display_user_profile_form(); ?>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
if ($modif) {
    ?><input type="hidden" id="show_edit_profil" value="1" /><?php
}
get_footer();
