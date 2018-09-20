<?php
/*
Template Name: echanger
*/


get_header(); ?>

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
						<h3>Nom du groupe</h3>
						<p>texte explicatif et sujet du groupe.<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius vitae quam in sollicitudin. Aenean a vulputate ante, vitae dictum eros. Phasellus at tincidunt libero, ut pulvinar eros.</p>


						<div class="stacked-for-small small expanded button-group">
							<a href="#" class="button hollow"><?php _e('rejoindre',''); ?></a>
							<a href="#" class="button hollow"><?php _e('quitter',''); ?></a>
						</div>						
						
					</div>
					
					<div class="cell bg-black">
					<h5><?php _e('membres',''); ?></h5>
							<ul class="no-bullet text-center">
								<li>membre 1</li>
								<li>membre 2</li>
								<li>membre 3</li>
								<li>membre 4</li>
								<li>membre 5</li>
							</ul>
					</div>
					
					
					<!-- formulaire recherche groupe -->
					<div class="cell bg-blanc border-bottom">
						<form>
							<div class="input-group">
								<span class="input-group-label"><i class="fi-magnifying-glass"></i></span>
								<input class="input-group-field" type="text" placeholder="Rechercher un groupe">
							</div>
						</form>
      					<div>
							<ul class="no-bullet text-center group-list">
								<li>groupe 1</li>
								<li>groupe 2</li>
								<li>groupe 3</li>
								<li>groupe 4</li>
								<li>groupe 5</li>
							</ul>
						</div>	
					</div>

				</div>

			</div>
		</div>
		
		

		<div class="cell medium-8 border-left">
			<?php get_template_part('template-parts/echanger/text-part'); ?>
			<?php get_template_part('template-parts/echanger/comment-part'); ?>
			<?php get_template_part('template-parts/echanger/video-part'); ?>
		</div>


		
		
		
	</div>
</div>

<?php get_footer();
