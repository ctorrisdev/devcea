<?php
/*
  Template Name: tpl-annuaire DEV
 */

get_header();
$user = wp_get_current_user();

$username = filter_input(INPUT_GET, "username", FILTER_SANITIZE_STRING);
if(!$username){
    $username = $user->username;
}

if(!$username){
    exit('Accès interdit');
}

$profil = get_user_by( 'user_login', $username );

?>

<div class="grid-container full">
    <div class="grid-x ">

        <div class="cell medium-8">

            <div class="grid-container full">


                <?php get_template_part('template-parts/breadcrumbs-part'); ?>  

                <div class="grid-x">		
                    <div class="cell">                   
                        <ul class="tabs" data-tabs id="example-tabs">
                            <li class="tabs-title is-active"><a href="#panel1" aria-selected="true"><?php _e('Liste par ordre alphab&eacute;tique', ''); ?></a></li>
                            <li class="tabs-title"><a data-tabs-target="panel2" href="#panel2"><?php _e('Liste par zone g&eacute;ographique', ''); ?></a></li>
                        </ul>
                    </div>
                </div>

                <div class="tabs-content" data-tabs-content="example-tabs">
                    <div class="tabs-panel is-active" id="panel1">


                        <div class="grid-x small-up-1 medium-up-3 large-up-4 grid-padding-x grid-padding-y padding-x padding-y  list-curators text-center" >

                            <div class="cell">
                                <h3>A</h3>
                                <ul class="no-bullet">
                                    <li><a href="<?= get_home_url(); ?>/sinformer/annuaire/tpl-commissaire/">AIRAULT Damien</a></li>
                                    <li>LESSANDRINI Michela</li>
                                    <li>ALKEMA Hanna</li>
                                    <li>ANDRE M&eacute;lanie</li>
                                    <li>ARCHAMBEAUD C&eacute;cile</li>
                                    <li>ARCOS Jean-Christophe</li>
                                    <li>ASSOLENT Mikaela</li>
                                    <li>AUDUREAU Nicolas</li>
                                    <li>AUGER Sophie</li>
                                    <li>AUTET Pauline</li>
                                </ul>
                            </div>

                            <div class="cell">
                                <h3>B</h3>
                                <ul class="no-bullet">
                                    <li>BARAK Ami</li>
                                    <li>BASTA Sarina</li>
                                    <li>BAURES Alexandra</li>
                                    <li>BECHELANY Camila</li>
                                    <li>BECHETOILLE Marie</li>
                                    <li>BERCELIOT COURTIN Arl&egrave;ne</li>
                                    <li>BERTRAN Marie</li>
                                    <li>BIDEAU Chantal</li>
                                    <li>BIDEAUD Fabienne</li>
                                    <li>BISMUTH L&eacute;a</li>
                                    <li>BONNIOL Marie-Pierre</li>
                                    <li>BOTELLA Marie-Louise</li>
                                    <li>BOURNE-FARRELL C&eacute;cile</li>
                                    <li>BUSQUET Valentine</li>
                                </ul>
                            </div>

                            <div class="cell">
                                <h3>C</h3>
                                <ul class="no-bullet">
                                    <li>AIRAULT Damien</li>
                                    <li>LESSANDRINI Michela</li>
                                    <li>ALKEMA Hanna</li>
                                    <li>ANDRE M&eacute;lanie</li>
                                    <li>ARCHAMBEAUD C&eacute;cile</li>
                                    <li>ARCOS Jean-Christophe</li>
                                    <li>ASSOLENT Mikaela</li>
                                    <li>AUDUREAU Nicolas</li>
                                    <li>AUGER Sophie</li>
                                    <li>AUTET Pauline</li>
                                </ul>
                            </div>

                            <div class="cell">
                                <h3>D</h3>
                                <ul class="no-bullet">
                                    <li>BARAK Ami</li>
                                    <li>BASTA Sarina</li>
                                    <li>BAURES Alexandra</li>
                                    <li>BECHELANY Camila</li>
                                    <li>BECHETOILLE Marie</li>
                                    <li>BERCELIOT COURTIN Arl&egrave;ne</li>
                                    <li>BERTRAN Marie</li>
                                    <li>BIDEAU Chantal</li>
                                    <li>BIDEAUD Fabienne</li>
                                    <li>BISMUTH L&eacute;a</li>
                                    <li>BONNIOL Marie-Pierre</li>
                                    <li>BOTELLA Marie-Louise</li>
                                    <li>BOURNE-FARRELL C&eacute;cile</li>
                                    <li>BUSQUET Valentine</li>
                                </ul>
                            </div>


                        </div>

                    </div>
                    <div class="tabs-panel" id="panel2">

                        carte google map
                    </div>
                </div>


            </div>
        </div>


        <div class="cell medium-4 border-left bg-zigouigoui">
            <?php get_sidebar(); ?>
        </div>

    </div>
</div>
<?php
get_footer();
