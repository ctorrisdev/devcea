<?php
/*
  Template Name: curator
 */
acf_form_head();

get_header(); /*test*/

$user = wp_get_current_user();

$username = get_query_var('designer_slug', $user->username);
$modifs = get_query_var('modif');

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
            <h1><?= $profil->user_nicename; ?><br>
                <small><?= $profil->titre; ?></small>
            </h1>
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
                    <p><?= __('Vit et travaille : ', 'cea') . $profil->city . ', ' . $profil->pays; ?></p>
                    <p><?= $profil->biographie; ?></p>
                    <hr>
                    <h3>contact</h3>
                    <ul class="no-bullet">
                    <li><a href="mailto:<?= $profil->contact; ?>" class="tiny button hollow"><?= $profil->contact; ?></a></li>
                    
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
                <div class="grid-x" >
                    <div class="orbit text-center bg-black padding-y" role="region" aria-label="news" data-options="data-timer-delay:3000;" data-orbit data-events="resize">
                        <div class="orbit-wrapper">
                            <h3><?php _e('derniers articles', 'cea'); ?></h3>

                            <ul tabindex="0" class="orbit-container">
                                <?php
                                foreach ($mesposts as $post) {
                                    ?>
                                    <li class="orbit-slide" aria-live="polite" style="top: 0px; display: block; position: relative; transition-duration: 0s;">
                                        <div class="slide-text slide_news" style='background: url("<?= get_template_directory_uri(); ?>//images/en_actu.svg") no-repeat center 5em / 400px;'>
                                            <div class="h2 serif"><?= $post->post_title; ?></div>
                                            <p><?= substr(strip_tags($post->post_content),0,200); ?>(...)</p>
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
    <div class="grid-x grid-padding-x grid-padding-y text-center" style="border-top: 1px solid #000; background: #000; color: #fff">
        <div class="cell medium-12" >	
<?php the_post_navigation(); ?>
        </div>
    </div>


</div>

<div class="reveal large" id="edit_profil" data-reveal>
    <h3>Profil</h3>        
<?php $cea_user->display_user_profile_form(); ?>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
if ($modifs) {
    ?><script>jQuery("#edit_profil").foundation('open');</script><?php
}
get_footer();
