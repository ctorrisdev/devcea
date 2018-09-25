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
                    cet ouvrage présente les analyses de commissaires d’exposition autant que d’observateurs issus des sciences humaines. C’est ainsi un commissaire aux multiples facettes qui émerge, dont la polyvalence et les doutes, dans des situations
                    professionnelles et éthiques complexes, deviennent le marqueur des évolutions de tout un secteur culturel.</p>
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
      <div class="cell medium-4  bg-informer text-center border-left border-right" style=" display:flex; justify-content: center">
        <div class="cell small-12 align-self-bottom">          
          <div class="padding-x padding-y border-top bg-blanc">
            <p class="h2 serif" style=" margin:auto;font-weight: 600; ">
              <img src="<?= get_template_directory_uri(); ?>//images/cea-logo.svg" style="height:150px" alt="CEA"><br><br> 
              <?= nl2br(strip_tags(get_the_content())); ?>
            </p>
          </div>
        </div>
      </div>


      <!-- PART 3 -->
      <div class="cell medium-4 bg-zigzag">

        <div class="orbit text-center bg-black padding-y" role="region" aria-label="news" data-orbit data-options="data-timer-delay:3000;">
          <div class="orbit-wrapper">
            <ul class="orbit-container">

              <li class="orbit-slide ">
                <div class="slide-text slide_news" style="background: url(<?php echo get_template_directory_uri(); ?>/images/en_actu.svg)no-repeat center 5em; background-size: 400px">
                  <div class="h2 serif">Young curators invitational – Close-up on the French Contemporary Art Scene</div>
                  <p>
                    Dans une perspective de connaissance critique de la scène française, le programme YCI (Young Curators Invitational), créé par la Fondation d’entreprise Ricard et la FIAC en 2006, en collaboration depuis 2011 avec l’Institut français, rassemble à Paris
                    pendant la semaine de la FIAC & OFFICIELLE, un groupe de personnalités prometteuses de la génération émergente de critiques et commissaires d’exposition. Sélectionnés sur propositions d’institutions internationales, les participants
                    au programme YCI bénéficient de l’opportunité de découvrir une scène artistique en effervescence et d’aller à la rencontre des acteurs du monde de l’art réunis à l’occasion de la foire.</p>
                  <a class="button hollow">Lire l'article</a>
                </div>
              </li>

              <li class="orbit-slide ">
                <div class="slide-text slide_pub" style="background: url(<?php echo get_template_directory_uri(); ?>/images/actu.svg)no-repeat center 5em; background-size: 400px">
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

    </div>
  </div>

<?php endwhile;

 get_footer();