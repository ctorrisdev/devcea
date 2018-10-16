<footer class="footer">
	<div class="grid-container full">

		<div class="grid-x grid-padding-x grid-padding-y align-middle bg-black">

			<div class="cell small-6 medium-4 align-self-middle small-order-2 medium-order-1">
				<ul class="no-bullet text-center">
					<li>
						<a href="<?php echo get_permalink('25'); ?>">
							<?= __('&agrave; propos','cea'); ?>
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink('35'); ?>">
							<?= __('contact','cea'); ?>
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink('33'); ?>">
							<?= __('adh&egrave;rer','cea'); ?>
						</a>
					</li>
				</ul>
			</div>

			<div class="cell medium-4 border-left border-right small-order-1 medium-order-2">
				<ul class="no-bullet text-center">
					<li>
						<label><?= __('Abonnez-vous &agrave; notre newsletter','cea'); ?></label>
						<div class="input-group">
							<input class="input-group-field" type="text">
							<div class="input-group-button">
								<button type="submit" class="button">
									<i class="la la-lg la-check"></i><span class="show-for-sr"><?= __('envoyer',''); ?></span>
								</button>
							</div>
						</div>
					</li>
					<li><a href="https://www.facebook.com/cea.asso">facebook</a></li>
					<li><a href="#">twitter</a></li>
				</ul>
			</div>

			<div class="cell small-6 medium-4 small-order-3">
				<ul class="no-bullet text-center">
					<li>
						<a href="<?php echo get_permalink('7361'); ?>">
							<?= __('informations l&eacute;gales','cea'); ?>
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink('33'); ?>">
							<?= __('cr&eacute;dits</a></li>','cea'); ?>
						</a>
					</li>
				</ul>
			</div>

		</div>

		<div class="partners grid-x grid-padding-x grid-padding-y align-middle border-top">
			<div class="cell medium-12 text-center">
				<a href="https://www.citedesartsparis.net/"><img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/partenaires/cite-des-arts.png" style="height:80px" /></a> &nbsp;
				<a href="http://www.cipac.net/"><img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/partenaires/cipac.jpg" style="height:30px" /></a> &nbsp;
				<a href="http://www.culturecommunication.gouv.fr/"><img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/partenaires/MarianneMC.jpg" style="height:80px" /></a>
			</div>
		</div>

		<?php //dynamic_sidebar( 'footer-widgets' ); ?>

	</div>


</footer>


<div class="bandeau">
	<marquee height="30" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 5, 0);" scrolldelay="60" direction="left" behavior="scroll" scrollamount="5">
		<?= get_posts_marquee(); ?>
	</marquee>
</div>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
</div>
<!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>

</html>