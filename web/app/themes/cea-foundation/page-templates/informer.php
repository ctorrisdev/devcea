<?php
/*
Template Name: annuaire
*/


get_header(); ?>

<div class="grid-container full">
	<div class="grid-x grid-padding-x grid-padding-y">

		<div class="cell medium-8">
			<h1>annuaire</h1>
<p>L'annuaire recense les membres actifs de l'association qui souhaitent y figurer, diffuser leur contact et leur profil. L'annuaire se nourrit au fur et &agrave; mesure des contributions. </p>
<?php 
$args = array(
	'orderby' => 'last_name',
	'role__in'=> array(
			'member',
			'curator',
			'administrator')
);
$list_members = get_users( $args );
			foreach ($list_members as $result) {
				$user = get_userdata($result->ID); 
				$curators[$user->ID] = array(
        	'id'		=> $user->ID,
					'login'	=> $user->user_login,
          'name'	=> $user->last_name.' '.$user->first_name        
          );
        }

				function cmp($a, $b)
				{
						return strcasecmp($a['name'], $b['name']);
				}
	
usort($curators, 'cmp');
			
$previousalphabet = null;  // initialize the alphabets for to compare with next alphabets for the start.
$initial_counter  = 1;
foreach($curators as $curator) {
  $firstalphabet = substr($curator['name'], 0, 1);     
  if($previousalphabet !== $firstalphabet) {        
    if($initial_counter!=1){ echo '</ul></div></div></div></div>'; } ?>  
    
			<div class="cell text-center">
				<div class="grid-container">
					<div class="grid-y grid-padding-x grid-padding-y">
						<div class="cell border-bottom">
							<h3><?php echo $firstalphabet; ?></h3>  
						</div>
						<div class="cell">
							<?php echo '<ul class="no-bullet">';         
  	}
		$previousalphabet = $firstalphabet;       
 		echo '<li>';
		echo '<a href="/members/'.$curator['login'].'" >'.$curator['name'].'</a>';      
  	$initial_counter++;     
}


?>


			
		</div>

		<div class="cell medium-4 border-left">
			<?php get_sidebar(); ?>
		</div>

	</div>
</div>
<?php get_footer();
