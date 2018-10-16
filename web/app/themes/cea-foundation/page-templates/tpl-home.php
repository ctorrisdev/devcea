<?php
/*
Template Name: tpl-home
*/

get_header(); ?>
	<?php while(have_posts()) : the_post(); ?>
	<div class="grid-container full">
		<div class="grid-x align-strech">

			<!-- PART 1 -->
			<div class="cell medium-4 list-posts">

				<div class="orbit text-center " role="region" aria-label="publications" data-orbit data-options="autoPlay:0;data-timer-delay:1;">
					<div class="orbit-wrapper">
						<ul class="orbit-container">
							<li class="is-active orbit-slide">
								<figure class="orbit-figure">
									<img class="orbit-image" src="http://c-e-a.asso.fr/wp-content/uploads/2015/06/RealitesduCommissariat_Couv_C-E-A-657x1024.jpg" alt="Space">
								</figure>
							</li>

							<li class="orbit-slide ">
								<div class="padding-x padding-y">
									<div class="h2 serif">Réalités du commissariat d’exposition</div>
									<p>
										L’émergence des commissaires d’exposition indépendants est représentative de profonds bouleversements structurels dans l’économie et dans les relations entre acteurs du monde de l’art contemporain. Réalités du commissariat d’exposition souhaite approcher
										les axes critiques d’une pratique d’autant plus complexe qu’elle évolue dans un environnement en état de crise théorique, qui prend sans cesse ses propres protagonistes de vitesse. Regroupant des contributions et des témoignages d’actualité,
										cet ouvrage présente les analyses de commissaires d’exposition autant que d’observateurs issus des sciences humaines. C’est ainsi un commissaire aux multiples facettes qui émerge, dont la polyvalence et les doutes, dans des situations professionnelles
										et éthiques complexes, deviennent le marqueur des évolutions de tout un secteur culturel.</p>
								</div>
							</li>
						</ul>
					</div>

					<nav class="orbit-bullets">
						<button class="is-active" data-slide="0"><span class="show-for-sr">1</span><span class="show-for-sr">0</span></button>
						<button data-slide="1"><span class="show-for-sr">2</span></button>
					</nav>
				</div>
			</div>

			<!-- PART 2 -->
			<div class="cell medium-4  bg-informer text-center border-left border-right">
				<div class="padding-x padding-y bg-blanc">
					<p class="h2 serif" style=" margin:auto;font-weight: 600; ">
						<?= nl2br(strip_tags(get_the_content())); ?>
					</p>
				</div>
			</div>

			<!-- PART 3 -->
			<div class="cell medium-4 bg-zigzag">
				<?= slider_post('4','3','bg-black'); ?>
			</div>

		</div>
	</div>

	<?php endwhile;

 get_footer();