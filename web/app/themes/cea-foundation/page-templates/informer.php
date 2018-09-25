<?php
/*
Template Name: annuaire
*/


get_header(); ?>

<div class="grid-container full">
	<div class="grid-x grid-padding-x grid-padding-y">

		<div class="cell medium-4">
			<h1>annuaire</h1>
<p>L'annuaire recense les membres actifs de l'association qui souhaitent y figurer, diffuser leur contact et leur profil. L'annuaire se nourrit au fur et &agrave; mesure des contributions. </p>
			<?php 
$args = array(
'orderby' => 'last_name',

	'role__in'     => array('curator')
);

$curators = get_users( $args );
  

        foreach ($curators as $result) {

            $user = get_userdata($result->ID); 

            $directors[$user->ID] = array(
                'dir_id'        =>  $user->ID,
                'dir_name'      =>  $user->last_name.' '.$user->first_name        
            );
        }

        sort($directors); 

        echo '<ul id="rightcolumndirector">';

        foreach ($directors as $director) { 

            $dir_id = $director['dir_id'];
            $dir_order = $director['dir_order'];
            $dir_name = $director['dir_name'];
            $dir_link = get_bloginfo('home').'/?curator='.$director['dir_id']; 


            echo '<li>';
            echo '<a href="'.$dir_link.'" id="dir-id-'.$dir_id.'">'.$dir_name.'</a>';
            echo '</li>';


        } 

        echo '</ul>';


?>


			
		</div>

		<div class="cell medium-4 border-left">
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
			
		</div>
		<div class="cell medium-4 border-left">
			<?php get_sidebar(); ?>
		</div>

	</div>
</div>
<?php get_footer();
