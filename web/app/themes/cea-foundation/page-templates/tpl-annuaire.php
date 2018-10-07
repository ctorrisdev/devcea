<?php
/*
  Template Name: tpl-annuaire
 */

get_header();
?>

	<div class="grid-container full">
		<div class="grid-x ">

			<div class="cell medium-12 border-right">

				<div class="grid-container full">

					<div class="grid-x">
						<div class="cell">
							<ul class="tabs filtres-annuaire" data-tabs id="curators-tabs">
								<li class="tabs-title is-active">
									<a href="#panel1" aria-selected="true">
										<?php _e('Liste par ordre alphab&eacute;tique', ''); ?>
									</a>
								</li>
								<li class="tabs-title">
									<a data-tabs-target="panel2" href="#panel2">
										<?php _e('Liste par zone g&eacute;ographique', ''); ?>
									</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="tabs-content" data-tabs-content="curators-tabs">
						<div class="tabs-panel is-active" id="panel1">


							<div class="grid-x small-up-1 medium-up-3 large-up-6 align-stretch list-curators text-center">

								<div class="cell">

									<div class="grid-container">
										<div class="grid-y grid-padding-x grid-padding-y">

											<div class="cell border-bottom">
												<h3>A</h3>
											</div>

											<div class="cell">
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

										</div>
									</div>

								</div>

								<div class="cell">
									<div class="grid-container">
										<div class="grid-y grid-padding-x grid-padding-y">

											<div class="cell border-bottom">
												<h3>B</h3>
											</div>

											<div class="cell">
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
								</div>
								
								<div class="cell">
									<div class="grid-container">
										<div class="grid-y grid-padding-x grid-padding-y">

											<div class="cell border-bottom">
												<h3>C</h3>
											</div>

											<div class="cell">
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
								</div>
								
								<div class="cell auto bg-twin"></div>


						</div>
						</div>
						<!-- Panneau 2 -->
						<div class="tabs-panel" id="panel2">
						<div class="list-curators by-country">

							
							<div class="grid-x small-up-1 medium-up-3 large-up-6  list-curators text-center">
							
								<div class="cell bg-black align-self-middle pays">
									<h1 class="sign transform-text ">France</h1>
								</div>
								
								<div class="cell">
									<div class="grid-container">
										<div class="grid-y grid-padding-x grid-padding-y">

											<div class="cell border-bottom">
												<h3>Angouleme</h3>
											</div>
											
											<div class="cell">
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
										</div>
									</div>
								</div>
								
								<div class="cell">
									<div class="grid-container">
										<div class="grid-y grid-padding-x grid-padding-y">

											<div class="cell border-bottom">
												<h3>Dijon</h3>
											</div>
											
											<div class="cell">
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
										</div>
									</div>
								</div>
								
								<div class="cell">
									<div class="grid-container">
										<div class="grid-y grid-padding-x grid-padding-y">

											<div class="cell border-bottom">
												<h3>Marseille</h3>
											</div>
											
											<div class="cell">
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
										</div>
									</div>
								</div>
								
								<div class="cell">
									<div class="grid-container">
										<div class="grid-y grid-padding-x grid-padding-y">

											<div class="cell border-bottom">
												<h3>Paris</h3>
											</div>
											
											<div class="cell">
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
										</div>
									</div>
								</div>
								
								<div class="cell">
									<div class="grid-container">
										<div class="grid-y grid-padding-x grid-padding-y">

											<div class="cell border-bottom">
												<h3>Reims</h3>
											</div>
											
											<div class="cell">
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
										</div>
									</div>
								</div>
								
								<div class="cell">
									<div class="grid-container">
										<div class="grid-y grid-padding-x grid-padding-y">

											<div class="cell border-bottom">
												<h3>Strasbourg</h3>
											</div>
											
											<div class="cell">
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
										</div>
									</div>
								</div>
								
								<div class="cell auto bg-zigzag">

								</div>

							</div>
							
							<div class="grid-x small-up-1 medium-up-3 large-up-6  list-curators text-center">
							
								<div class="cell bg-black align-self-middle  pays">
									<h1 class="sign transform-text">Royaume-Uni</h1>
								</div>
								
								<div class="cell">
									<div class="grid-container">
										<div class="grid-y grid-padding-x grid-padding-y">

											<div class="cell border-bottom">
												<h3>Angouleme</h3>
											</div>
											
											<div class="cell">
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
										</div>
									</div>
								</div>
								
								<div class="cell">
									<div class="grid-container">
										<div class="grid-y grid-padding-x grid-padding-y">

											<div class="cell border-bottom">
												<h3>Dijon</h3>
											</div>
											
											<div class="cell">
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
										</div>
									</div>
								</div>
								
								<div class="cell">
									<div class="grid-container">
										<div class="grid-y grid-padding-x grid-padding-y">

											<div class="cell border-bottom">
												<h3>Marseille</h3>
											</div>
											
											<div class="cell">
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
										</div>
									</div>
								</div>
								
								<div class="cell">
									<div class="grid-container">
										<div class="grid-y grid-padding-x grid-padding-y">

											<div class="cell border-bottom">
												<h3>Paris</h3>
											</div>
											
											<div class="cell">
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
										</div>
									</div>
								</div>
								
								<div class="cell">
									<div class="grid-container">
										<div class="grid-y grid-padding-x grid-padding-y">

											<div class="cell border-bottom">
												<h3>Reims</h3>
											</div>
											
											<div class="cell">
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
										</div>
									</div>
								</div>
								
								<div class="cell auto bg-zigzag">

								</div>

							</div>
							
						</div>
						</div>
					</div>


				</div>
			</div>


		</div>
	</div>
	<?php
get_footer();