<?php
// test
 ?>
	<div class="echanger-part grid-container full bg-blanc  border-bottom ">
		
			<!-- nouveau commentaire -->
			<?php 
        $user = new cea_user(get_current_user_id());        
        if($user->is_group_autorized($groupeid)) :
        ?>

					<div class="input-group expanded-grid">
						<span class="input-group-label"><i class="la la-lg la-comment"></i></span>
						<input class="input-group-field new_wall_post_content" type="text" placeholder="<?php _e('Votre commentaire',''); ?>">
						<div class="input-group-button">
							<button alt="edit" type="submit" class="button hollow submit_wall_post" data-groupe="<?= $groupeid; ?>" data-response_loc="main-response">
								<i class="la la-lg la-pencil"></i>
							</button>
							<button class="button hollow dropmodalbutton" data-open="mydropmodal">
								<i class="la la-lg la-paperclip"></i> <span class="show-for-sr"><?php _e('Ajouter fichiers',''); ?></span>
							</button>
						</div>
					</div>
	
				<div class="instruct">
					<?= __('*Pour poster une vidéo Youtube, simplement poster l\'URL'); ?>
				</div>

			<?php endif; ?>
			<!-- fin nouveau commentaire -->
			<div class="grid-y grid-padding-x grid-padding-y">
			<div class="cell">
				<div class="main-response">
				</div>
				<div class="comments-loader">
					<div class="button hollow load_next_wall_chunk" data-idgroupe="<?= $groupeid; ?>" data-offset="0">
						<?= __('Afficher les posts suivant'); ?>
					</div>
				</div>
			</div>
			
			<div class="cell auto bg-croix">
			</div>
			</div>

		</div>