<?php

//Menu profil
 add_filter( 'wp_nav_menu_items', 'add_menu_login', 10, 2 );
function add_menu_login ( $items, $args ) {
if ( is_user_logged_in() ) {
        $items .= '<li data-toggle="offCanvas"><a>'.__('mon profil','cea').'</a></li>';
        }
    else{
			$items .= '<li data-toggle="offCanvas"><a>'.__('Connection','cea').'</a></li>';
		}
    return $items;
}

// LISTE DES ARTICLES EN BANDEAU
if ( ! function_exists( 'get_posts_marquee' ) ) {
	function get_posts_marquee() {	
		$recent_posts = get_posts(array(
          'post_type' => 'post',
			'posts_per_page' => 5,
          'category' => '23',
			'suppress_filters' => false
          ));
		foreach( $recent_posts as $recent ){
				$marquee = '<span class="marquee-space">&nbsp;&nbsp;&mdash;&nbsp;&nbsp;</span>';
				$marquee .='<span>';
				$marquee .='<a title="'.$recent->post_title.'" class="by-place" href="' . get_permalink($recent->ID) . '" data-id="'.$recent->ID.'">'.$recent->post_title.'</a></span>';

			return $marquee;
		}
  }
}


// SLIDER DES ARTICLES 
function slider_post($category,$nbre,$bgcolor){
	 $posts = get_posts(array(
          'posts_per_page' => $nbre,
          'post_type' => 'post',
          'category' => $category,
               'suppress_filters' => false
          ));
	
	if($category == '4'){ $class="slide-news";}
	?>
	
	<div class="orbit text-center <?= $bgcolor; ?> padding-y" role="region" aria-label="news" data-orbit data-options="data-timer-delay:3000;">
		<div class="orbit-wrapper">
			<ul class="orbit-container">
				<?php foreach($posts as $post) : 
				//print_r($post);
				?>
				<?php setup_postdata( $post );
				//print_r($post);?>
				<li class="orbit-slide ">
					<div class="slide-text <?= $class; ?>">
						<div class="h2 serif">
							<?php echo $post->post_title; ?>
						</div>
						<?php nl2br(the_excerpt()); ?>
						<a href="<?= the_permalink($post->ID); ?>" class="button hollow">
											<?= __('Lire l\'article','cea'); ?>
										</a>
					</div>
				</li>
				<?php wp_reset_postdata(); ?>
				<?php endforeach; ?>
			</ul>
		</div>
		<nav class="orbit-bullets">
			<?php
						$i=0;
						foreach($posts as $post) : ?>
				<button class="" data-slide="<?= $i; ?>"><span class="show-for-sr"><?= $i; ?></span></button>
				<?php
						$i++;
						endforeach; ?>
		</nav>
	</div>
	<?php }
?>


<?php 
// LISTE DES CURATORS PAR ORDRE ALPHABETIQUE
function the_curators_az(){
	
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
    if($initial_counter!=1){ 
			echo "\t\t\t\t\t\t\t",'</ul>',"\n";
			echo "\t\t\t\t\t\t",'</div>',"\n";
			echo "\t\t\t\t\t",'</div>',"\n";
			echo "\t\t\t\t",'</div>',"\n";
			echo "\t\t\t",'</div>',"\n";
			} ?>  
    
			<div class="cell text-center">
				<div class="grid-container">
					<div class="grid-y grid-padding-x grid-padding-y">
						<div class="cell border-bottom">
							<h3><?php echo strtoupper($firstalphabet); ?></h3>  
						</div>
						<div class="cell">
							<?php echo '<ul class="no-bullet">',"\n";         
  	}
		$previousalphabet = $firstalphabet;       
 		echo "\t\t\t\t\t\t\t",'<li><a href="/members/'.$curator['login'].'" >'.$curator['name'].'</a></li>',"\n";
  	$initial_counter++;     
}
			echo "\t\t\t\t\t\t\t",'</ul>',"\n";
			echo "\t\t\t\t\t\t",'</div>',"\n";
			echo "\t\t\t\t\t",'</div>',"\n";
			echo "\t\t\t\t",'</div>',"\n";
			echo "\t\t\t",'</div>',"\n";
						
							
}
?>	
							
							
							
<?php 
// LISTE DES CURATORS PAR ORDRE GEO
function the_curators_geo(){
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
          'name'	=> $user->last_name.' '.$user->first_name,
					'city'	=> $user->city,
					'pays'	=> $user->pays
          );
        }

				function cmp_pays($a, $b)
				{
						return strcasecmp($a['city'], $b['city']);
				}
	
usort($curators, 'cmp_pays');
	
			
$previousalphabet = null;  // initialize the alphabets for to compare with next alphabets for the start.
$initial_counter  = 1;
foreach($curators as $curator) {
  $firstalphabet = $curator['city'];     
  if($previousalphabet !== $firstalphabet) {        
    if($initial_counter!=1){ 
			echo "\t\t\t\t\t\t\t",'</ul>',"\n";
			echo "\t\t\t\t\t\t",'</div>',"\n";
			echo "\t\t\t\t\t",'</div>',"\n";
			echo "\t\t\t\t",'</div>',"\n";
			echo "\t\t\t",'</div>',"\n";
			} ?>  
    
			<div class="cell text-center">
				<div class="grid-container">
					<div class="grid-y grid-padding-x grid-padding-y">
						<div class="cell border-bottom">
							<h3><?php echo strtoupper($firstalphabet); ?></h3>  
						</div>
						<div class="cell">
							<?php echo '<ul class="no-bullet">',"\n";         
  	}
		$previousalphabet = $firstalphabet;       
 		echo "\t\t\t\t\t\t\t",'<li><a href="/members/'.$curator['login'].'" >'.$curator['name'].'</a></li>',"\n";
  	$initial_counter++;     
}
			echo "\t\t\t\t\t\t\t",'</ul>',"\n";
			echo "\t\t\t\t\t\t",'</div>',"\n";
			echo "\t\t\t\t\t",'</div>',"\n";
			echo "\t\t\t\t",'</div>',"\n";
			echo "\t\t\t",'</div>',"\n";
}	 ?>	