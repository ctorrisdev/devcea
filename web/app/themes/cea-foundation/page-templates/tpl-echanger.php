<?php
/*
Template Name: echanger
*/


get_header(); ?>

<div class="grid-container full">
	<div class="grid-x">
		<div class="cell medium-4 border-left">
			
		</div>

		<div class="cell medium-4 border-left">
			<?php get_template_part('template-parts/echanger/text-part'); ?>
		</div>

		<div class="cell medium-4 border-left">
			  <div class="grid-container">
   				<div class="grid-x grid-padding-x grid-padding-y text-center">
					<div class="cell   bg-black">
						<h3>titre du groupe</h3>
						<p>texte explicatif et sujet du groupe.<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius vitae quam in sollicitudin. Aenean a vulputate ante, vitae dictum eros. Phasellus at tincidunt libero, ut pulvinar eros.</p>


						<div class="stacked-for-small small expanded button-group">
						<a href="#" class="button hollow"><?php _e('rejoindre le groupe',''); ?></a>
						<a href="#" class="button hollow"><?php _e('quitter le groupe',''); ?></a>
						</div>
					</div>

					<div class="cell border-top">
					<a href="#" class="button expanded">cr&eacute;er un nouveau groupe</a>
						

									<form>
<div class="input-group">
  <span class="input-group-label"><i class="fi-magnifying-glass
"></i></span>
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
	</div>
</div>

<?php get_footer();
