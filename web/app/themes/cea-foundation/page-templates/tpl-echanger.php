<?php
/*
  Template Name: echanger
 */

acf_form_head();
get_header();

$groupeid = null;
$groupename = get_query_var('groupe_slug', null);



if ($groupename) {
    $args = array(
        'name' => $groupename,
        'post_type' => 'groupes',
        'post_status' => 'publish',
        'posts_per_page' => 1
    );
    $my_posts = get_posts($args);
    if ($my_posts)
        $groupeid = $my_posts[0]->ID;
}

$user = wp_get_current_user();
$cea_user = new cea_user($user->ID);
?>

	<?php while (have_posts()) : the_post(); ?>

	<div class="grid-container full off-canvas-wrapper">


		<div class="grid-x">

			<div class="cell medium-4 bg-zigzag">
				<form id="groupsearch">
								<div class="input-group expanded-grid">
									<span class="input-group-label"><i class="la la-lg la-search"></i></span>
									<input class="input-group-field" type="text" placeholder="<?= __('Rechercher un groupe','cea'); ?>">
								</div>
							</form>
				<div class="grid-container">
					
					<div class="grid-x grid-padding-x grid-padding-y text-center">



						<!-- formulaire recherche groupe -->
						<div class="cell bg-blanc border-bottom">
							<!--
							<form id="groupsearch">
								<div class="input-group">
									<span class="input-group-label"><i class="la la-lg la-search"></i></span>
									<input class="input-group-field" type="text" placeholder="<?= __('Rechercher un groupe','cea'); ?>">
								</div>
							</form>
			-->
							<span class="h2"><?= __('Liste des groupes','cea'); ?></span>
							<div id="liste_groupes">
								<ul class="no-bullet text-center group-list">
									<?= get_groupes_list(); ?>
								</ul>														
							</div>
														<?php
									if (in_array('curator', (array) $user->roles) 
										|| in_array('administrator', (array) $user->roles) 
										|| in_array('admin_cea', (array) $user->roles)) :
								?>
									<a class="button hollow expanded" data-open="add_group_form">
										<?= __('Créer un nouveau groupe','cea'); ?>
									</a>
									<?php endif; ?>

						</div>

						<!-- descriptif groupe -->
						<?php
							if ($groupeid) {
								$group = get_post($groupeid);
							?>
							<div class="cell bg-black">
								<h3>
									<?= $group->post_title; ?>
								</h3>
								&mdash;
								<p>
									<?= $group->description; ?>
								</p>
								<?php if (is_user_logged_in() && $cea_user): ?>
								<?php if (!$cea_user->is_in_group($groupeid)) : ?>
								<a href="?act=join&groupe=<?=$groupeid;?>" class="button" title="Rejoindre">
									<?php _e('rejoindre le groupe', 'cea'); ?>
								</a>
								<?php else : ?>
								<a href="?act=quit&groupe=<?=$groupeid;?>" class="button">
									<?php _e('quitter le groupe', 'cea'); ?>
								</a>
								<?php endif; ?>
								<?php endif; ?>

							</div>
							<?php }  ?>
							<?php if ($groupeid) { ?>
							<div class="cell bg-black">
								<i class="la la-3x la-users"></i>
								<h5>
									<?php _e('membres', 'cea'); ?>
								</h5>
								<ul class="no-bullet text-center">
									<?php $members = get_users_from_group($groupeid); ?>
									<?php if ($members) :
									foreach ($members as $member) {
								?>
									<li><a href="/members/<?= $member->user_login; ?>"><?= $member->display_name; ?></a></li>
									<?php
                                        }
                                    endif;
                                    ?>
								</ul>
							</div>
							<?php } ?>

					</div>

				</div>
			</div>

			<!-- WALL -->
			<div class="cell medium-8 border-left bg-twin">
				<?php
                set_query_var('groupeid', $groupeid);
                get_template_part('template-parts/echanger/comment-part', "groupeid");
                ?>
			</div>
		</div>
	</div>

	<div class="reveal" id="add_group_form" data-reveal>
		<h3>Création d'un nouveau groupe</h3>
		<?php display_wall_add_group_form(); ?>
		<button class="close-button" data-close aria-label="Close modal" type="button">
		    <span aria-hidden="true">&times;</span>
		  </button>
	</div>

	<div class="reveal" id="mydropmodal" data-reveal>
		<br><br>
		<div class="editmode" style="display:none;">
			<input type="text" id="com_editor" name="com_editor" value="" />
		</div>
		<form id="ceadrop" class="dropzone">
		</form>
		<br>
		<div class="editmode">
			<button class="hollow button expanded edition_submit"><?= __('Modifier le post','cea'); ?></button>
		</div>
		<button class="close-button" data-close aria-label="Close modal" type="button">
		    <span aria-hidden="true">&times;</span>
		  </button>
	</div>

	<?php endwhile; ?>

	<?php
get_footer();