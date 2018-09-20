<div class="grid-container full bg-blanc">

<div class="grid-x grid-padding-x grid-padding-y text-center" >
	<div class="cell">
		<img src="https://via.placeholder.com/100x100">
	</div>
	<div class="cell text-center">
		<h4>Nom du commissaire</h4>
	</div>
	<div class="cell">
	<ul class="no-bullet">
		<li><a href=""><?php _e('home',''); ?></a></li>
		<li><a href=""><?php _e('Voir ma page curator',''); ?></a></li>
	</ul>
	<ul class="no-bullet">
		<li><a href="" class="button"><?php _e('D&eacute;connection',''); ?></a></li>
	</ul>
	</div>
	<div class="cell">
		<h5><?php _e('Mes groupes',''); ?></h5>
		<ul class="no-bullet group-list">
			<li><a href="">groupe 1</a></li>
			<li><a href="">groupe 2</a></li>
			<li><a href="">groupe 3</a></li>
			<li><a href="">groupe 4</a></li>
		</ul>
		<a href="#" class="button expanded">cr&eacute;er un nouveau groupe</a>
	</div>
	
	<div class="cell">
		<h5><?php _e('Mes articles',''); ?></h5>
		<ul class="no-bullet group-list">
			<li><a href="">article 1</a></li>
			<li><a href="">article 2</a></li>
			<li><a href="">article 3</a></li>
			<li><a href="">article 4</a></li>
		</ul>
	</div>
	
	<div class="cell">
	<?php get_template_part('template-parts/editor-part'); ?>
	</div>
</div>
		
</div>	