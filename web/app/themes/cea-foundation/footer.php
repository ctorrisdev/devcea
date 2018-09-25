<footer class="footer">
    <div class="grid-container full">
    
    	<div class="grid-x grid-padding-x grid-padding-y align-middle border-top">
    
	    	<div class="cell small-6 medium-4 align-self-middle small-order-2 medium-order-1">

						<ul class="no-bullet text-center">
							<li><a href="<?php echo get_permalink('25'); ?>">&agrave; propos</a></li>
							<li><a href="<?php echo get_permalink('35'); ?>">contact</a></li>
							<li><a href="<?php echo get_permalink('33'); ?>">adh&egrave;rer</a></li>
						</ul>

	    	</div>
	    	
	    	<div class="cell medium-4 border-left border-right small-order-1 medium-order-2">
	    	

							<ul class="no-bullet text-center">
								<li>
									<label>Abonnez-vous &agrave; notre newsletter</label>
									<div class="input-group">
										<input class="input-group-field" type="text">
										<div class="input-group-button">
									    	<input type="submit" class="button" value="ok">
									    </div>
									</div>
								</li>
								<li><a href="https://www.facebook.com/cea.asso">facebook</a></li>
								<li><a href="<?php echo get_permalink('35'); ?>">twitter</a></li>
							</ul>

	    	</div>
	    	
	    	<div class="cell small-6 medium-4 small-order-3">
	    	

							<ul class="no-bullet text-center">
								<li><a href="<?php echo get_permalink('35'); ?>">informations l&eacute;gales</a></li>
								<li><a href="<?php echo get_permalink('33'); ?>">cr&eacute;dits</a></li>
							</ul>

			</div>
		
	    </div>

		<div class="partners grid-x grid-padding-x grid-padding-y align-middle border-top">
 			<div class="cell medium-12 text-center">
<img src="<?php echo get_template_directory_uri(); ?>/images/partenaires/cite-des-arts.png" style="height:80px" />
&nbsp;
<img src="<?php echo get_template_directory_uri(); ?>/images/partenaires/cipac.jpg" style="height:30px"/>
&nbsp;
<img src="<?php echo get_template_directory_uri(); ?>/images/partenaires/MarianneMC.jpg" style="height:80px"/>
</div>

		</div>

            <?php //dynamic_sidebar( 'footer-widgets' ); ?>

    </div>


</footer>


<div class="bandeau">		
	<nav style="display:none">
		<ul class="menu horizontal" style="display: flex;justify-content: space-around;">
		<li><a href="#">découvrir</a></li>
		<li class="separator"></li>
		<li><a href="#">échanger</a></li>
		<li class="separator"></li>
		<li><a href="#">curater</a></li>
		<li class="separator"></li>
		<li><a href="#">s’informer</a></li>
		<li class="separator"></li>
		<li><a href="#">structurer</a></li>
		</ul>
	</nav>
		<marquee height="30" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 5, 0);" scrolldelay="60" direction="left" behavior="scroll" scrollamount="5">	
		<?php get_posts_marquee(); ?>
	</marquee>
</div>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>