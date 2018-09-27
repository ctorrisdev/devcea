<?php
/*
  Template Name: curator DEV
 */
acf_form_head();

get_header();

$user = wp_get_current_user();

$username = get_query_var('designer_slug', $user->username);


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
    <div class="grid-x">

        <div class="cell medium-12 large-8">


            <?php get_template_part('template-parts/breadcrumbs-part'); ?>
            <?php
            if ($profil->ID == $user->ID) {
                get_template_part('template-parts/editor-part');
            }
            ?>		

            <div class="grid-x grid-padding-x grid-padding-y text-center" style="border-bottom: 1px solid #000;">
                <div class="cell curator_name">
                    <h1><?= $profil->user_nicename; ?><small><?= $profil->fonction; ?>
                        </small></h1>
                </div>
            </div>

            <div class="grid-x grid-padding-x" style="padding-top: 1em; padding-bottom: 1em; ">
                <div class="cell medium-6" style=""> 	

                    <?php echo get_avatar($profil->ID, 600); ?> 



                    <hr>

                    <h2>biographie</h2><br>
                    <?= $profil->biographie; ?>

                    <hr>

                    <h2>contact</h2><br>
                    <p>
                        <a href="mailto:<?= $profil->contact; ?>"><?= $profil->contact; ?></a>
                    </p>


                </div>

                <div class="cell medium-6 border-left">

                    <h2><?= $profil->titre_de_la_timeline; ?></h2><br>

                    <div class="grid-x">
                        <?php
                        if (have_rows('timeline', 'user_' . $profil->ID)):

                            while (have_rows('timeline', 'user_' . $profil->ID)) : the_row();
                                ?><div class="cell medium-2 year"><?= get_sub_field('date'); ?></div><?php ?><div class="cell medium-10">
                                    <ul class="no-bullet">
                                        <li><?= get_sub_field('contenu'); ?></li>
                                    </ul>
                                </div><?php
                            endwhile;

                        endif;
                        ?>



                    </div>
                </div>	 
            </div>	
            <?php
            $posts = $cea_user->get_all_posts();
            if ($posts) {
                ?>
                <div class="grid-x grid-padding-x grid-padding-y padding-x padding-y" >
                    <div class="orbit text-center bg-black padding-y" role="region" aria-label="news" data-options="data-timer-delay:3000;" data-orbit="bqms3p-orbit" data-events="resize">
                        <div class="orbit-wrapper">
                            <h3><?php _e('derniers articles', ''); ?></h3>

                            <ul tabindex="0" class="orbit-container" style="height: 892.39px;">
                                <?php
                                foreach ($posts as $post) {
                                    ?>
                                    <li class="orbit-slide is-active" aria-live="polite" style="top: 0px; display: block; position: relative; transition-duration: 0s;" data-slide="0">
                                        <div class="slide-text slide_news" style='background: url("<?= get_template_directory_uri(); ?>//images/en_actu.svg") no-repeat center 5em / 400px;'>
                                            <div class="h2 serif"><?= $post->post_title; ?></div>
                                            <?= $post->post_content; ?>
                                            <a class="button hollow" href="<?= get_the_permalink($post->ID); ?>">Lire l'article</a>
                                        </div>
                                    </li>


                                <?php }
                                ?>
                            </ul>

                        </div>
                        <!--
                        <nav class="orbit-bullets">
                            <button class="is-active" data-slide="0"><span class="show-for-sr">1</span><span class="show-for-sr">0</span></button>
                            <button data-slide="1"><span class="show-for-sr">2</span></button>
                        </nav> -->
                    </div>

                </div>
            <?php } ?>

            <div class="grid-x grid-padding-x grid-padding-y text-center" style="border-top: 1px solid #000; background: #000; color: #fff">
                <div class="cell medium-12" >	
                    <?php the_post_navigation(); ?>
                </div>
            </div>


        </div>

        <div class="cell medium-12 large-4 border-left bg-informer" style="">

            <div class="grid-x grid-padding-x grid-padding-y">
                <div class="cell medium-12">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="reveal" id="edit_profil" data-reveal>
    <h3>Profil</h3>        
    <?php $cea_user->display_user_profile_form(); ?>
</div>
<?php
get_footer();
