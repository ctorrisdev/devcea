<?php ?>
<div class="echanger-part grid-container full">
    <div class="grid-x grid-padding-x grid-padding-y" >
        <!-- nouveau commentaire -->
        <div class="cell">    
            <div class="media-object">
                <div class="input-group">
                    <span class="input-group-label"><i class="la la-lg la-comment"></i></span>
                    <input class="input-group-field new_wall_post_content" type="text">
                    <div class="input-group-button">
                        <button type="submit" class="button hollow submit_wall_post" 
                                data-groupe="<?= $groupeid; ?>"
                                data-response_loc="main-response"
                                >
                            <i class="la la-lg la-pencil"></i>
                        </button>
                    </div>
                </div>
            </div>
            <button class="button hollow dropmodalbutton" data-open="mydropmodal"><?= __('Ajouter fichiers'); ?></button>

        </div>
        <!-- fin nouveau commentaire -->


        <div class="cell">
            <div class="main-response">                
            </div>
            <div class="comments-loader">
                <div class="button hollow load_next_wall_chunk" data-idgroupe="<?= $groupeid; ?>" data-offset="0" ><?= __('Afficher les posts suivant'); ?></div>

        </div>

        <hr>


    </div>

</div>		