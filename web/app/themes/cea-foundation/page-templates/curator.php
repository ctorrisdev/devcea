<?php
/*
Template Name: curator
*/


get_header(); ?>

<div class="grid-container full">
	<div class="grid-x">
	
		<div class="cell medium-12 large-8">
		
		
			<?php get_template_part('template-parts/breadcrumbs-part'); ?>
<?php get_template_part('template-parts/editor-part'); ?>		
		
			<div class="grid-x grid-padding-x grid-padding-y text-center" style="border-bottom: 1px solid #000;">
				<div class="cell curator_name">
				<h1>Damien AIRAULT <small>Membres du Conseil d'administration de C-E-A
				</small></h1>
				</div>
			</div>
		 	
			<div class="grid-x grid-padding-x" style="padding-top: 1em; padding-bottom: 1em; ">
		 		 <div class="cell medium-6" style=""> 	
		 		 
		 		 	<img src="https://via.placeholder.com/600x600">
		 		 	
		 		 	<hr>
		 		 	
		 		 	<h2>biographie</h2><br>
		 		 	<p>
		 		 	Damien Airault, n&eacute; en 1977 et dipl&ocirc;m&eacute; de l'universit&eacute; de Bordeaux, est un critique d'art et curateur ind&eacute;pendant.</p>
		 		 	<p> Il a particip&eacute; &agrave; la 11&egrave;me session de la formation professionnelle aux pratiques curatoriales organis&eacute;e par l'Ecole du Magasin &agrave; Grenoble en 2001 et 2002. Il a dirig&eacute; l'association &agrave; but non lucratif Le Commissariat entre 2008 et 2011 et il est membre du Bureau de C-E-A depuis 2009. Il a &eacute;galement enseign&eacute; l'histoire de l'Art &agrave; l'universit&eacute; de Metz et &agrave; l'&Eeacute;cole des Beaux Arts d'Annecy.
		 		 	</p>
		 		 	
		 		 	<hr>
		 		 	
		 		 	<h2>contact</h2><br>
		 		 	<p>
		 		 	<a href="www.damien-airault.com">www.damien-airault.com</a>
		 		 	</p>
		 		 	
		 		 	
		 		 </div>
		 		 
		 		 <div class="cell medium-6 border-left">
		 		 
			 		 <h2>expositions</h2><br>
	
			 		 <div class="grid-x">

						<div class="cell medium-2 year">2014</div>	
						<div class="cell medium-10">
							<ul class="no-bullet">
								<li>Activit&eacute;, CURATOR STUDIO, Paris.</li>
								<li>Les affres du premier degr&eacute;, &eacute;sam Caen/Cherbourg.</li>
							</ul>
						</div>

						<div class="cell medium-2 year">2013</div>
						<div class="cell medium-10">
							<ul class="no-bullet">
								<li>La retenue, C&eacute;cile Nogu&egrave;s et Michael Van den Abeele, Galerie S&eacute;miose, Paris.</li>
								<li>La Perle, exposition personnelle d'Azzedine Saleck, au Treize, 24 rue Moret, Paris 11e.</li>
							</ul>
						</div>

						<div class="cell medium-2 year">2012</div>
						<div class="cell medium-10">
							<ul class="no-bullet">
								<li>Entit&eacute; Raspail, Square Jacques Antoine, place Denfert Rochereau.</li>
								<li>La simulation, avec Jagna Ciuchta et Julie Vayssi&egrave;re au Treize, 24 rue Moret, Paris 11e.</li>
							</ul>
						</div>

						<div class="cell medium-2 year">2011</div>
						<div class="cell medium-10">
							<ul class="no-bullet">
								<li>Le drame, avec Olga Rozemblum, Les Instants Chavir&eacute;s, Montreuil.</li>
								<li>100 dessins contre la guerre du Vietnam, le commissariat.</li>
								<li>Le vaisseau est ainsi con&ccedil;u, France Valliccioni, le commissariat.</li>
								<li>Check out the blah blah blah, Galerie municipale d'Annecy.</li>
								<li>CBO concept, Al Masson, le Commissariat.</li>
							</ul>
						</div>

						<div class="cell medium-2 year">2010</div>
						<div class="cell medium-10">
							<ul class="no-bullet">
								<li>Choses, Jean-Daniel Bourgeois et Marjorie Brunet.</li>
								<li>L'Arabie Saoudite quitte l'OPEP, Julien Baete, le Commissariat.</li>
								<li>Si vous recevez ceci, vous serez bient&ocirc;t couverts de gloire, Kara Uzelman, le Commissariat.</li>
								<li>D&eacute;j&agrave; vu : clusterfuck aesthetics, Ecole des Beaux-Arts de Mulhouse.</li>
								<li>Illuminati Hall, Th&eacute;odore Fivel, le Commissariat.</li>
								<li>Que fallait-il voir ?, Galerie Michel Journiac, Paris.</li>
								<li>Dan Flavin & Scott Lyall, le Commissariat.</li>
							</ul>
						</div>

						<div class="cell medium-2 year">2009</div>
						<div class="cell medium-10">
							<ul class="no-bullet">
								<li>Ska&iuml;, C&eacute;cile Nogu&egrave;s, le Commissariat.</li>
							</ul>
						</div>
			 		 </div>
		 		 </div>	 
			</div>	

			<div class="grid-x grid-padding-x grid-padding-y padding-x padding-y" >
				<div class="orbit text-center bg-black padding-y" role="region" aria-label="news" data-options="data-timer-delay:3000;" data-orbit="bqms3p-orbit" data-events="resize">
          <div class="orbit-wrapper">
		<h3><?php _e('derniers articles',''); ?></h3>
            <ul tabindex="0" class="orbit-container" style="height: 892.39px;">

              <li class="orbit-slide is-active" aria-live="polite" style="top: 0px; display: block; position: relative; transition-duration: 0s;" data-slide="0">
                <div class="slide-text slide_news" style='background: url("<?= get_template_directory_uri(); ?>//images/en_actu.svg") no-repeat center 5em / 400px;'>
                  <div class="h2 serif">Young curators invitational – Close-up on the French Contemporary Art Scene</div>
                  <p>
                    Dans une perspective de connaissance critique de la scène française, le programme YCI (Young Curators Invitational), créé par la Fondation d’entreprise Ricard et la FIAC en 2006, en collaboration depuis 2011 avec l’Institut français, rassemble à Paris
                    pendant la semaine de la FIAC &amp; OFFICIELLE, un groupe de personnalités prometteuses de la génération émergente de critiques et commissaires d’exposition. Sélectionnés sur propositions d’institutions internationales, les participants
                    au programme YCI bénéficient de l’opportunité de découvrir une scène artistique en effervescence et d’aller à la rencontre des acteurs du monde de l’art réunis à l’occasion de la foire.</p>
                  <a class="button hollow">Lire l'article</a>
                </div>
              </li>

              <li class="orbit-slide" style="top: 0px; display: none; position: relative; transition-duration: 0s;" data-slide="1">
                <div class="slide-text slide_pub" style='background: url("<?= get_template_directory_uri(); ?>//images/actu.svg") no-repeat center 5em / 400px;'>
                  <div class="h2 serif">Réalités du commissariat d’exposition</div>
                  <p>
                    L’émergence des commissaires d’exposition indépendants est représentative de profonds bouleversements structurels dans l’économie et dans les relations entre acteurs du monde de l’art contemporain. Réalités du commissariat d’exposition souhaite approcher
                    les axes critiques d’une pratique d’autant plus complexe qu’elle évolue dans un environnement en état de crise théorique, qui prend sans cesse ses propres protagonistes de vitesse. Regroupant des contributions et des témoignages d’actualité,
                    cet ouvrage présente les analyses de commissaires d’exposition autant que d’observateurs issus des sciences humaines. C’est ainsi un commissaire aux multiples facettes qui émerge, dont la polyvalence et les doutes, dans des situations
                    professionnelles et éthiques complexes, deviennent le marqueur des évolutions de tout un secteur culturel.</p>
                  <a class="button hollow">Lire l'article</a>
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
<?php get_footer();
