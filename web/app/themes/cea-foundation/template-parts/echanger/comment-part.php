<?php
extract($wp_query->query_vars, EXTR_SKIP);
?>
<div class="echanger-part grid-container full">

    <div class="grid-x grid-padding-x grid-padding-y" >

        <!-- nouveau commentaire -->
        <div class="cell">    
            <div class="media-object">

                <div class="input-group">
                    <span class="input-group-label"><i class="la la-lg la-comment"></i></span>
                    <input class="input-group-field new_wall_post_content" type="text">
                    <div class="input-group-button">
                        <button type="submit" class="button hollow submit_wall_post" data-groupe="<?= $groupeid; ?>"><i class="la la-lg la-pencil"></i></button>
                    </div>
                </div>
            </div>
            <form id="ceadrop" class="dropzone">

            </form>

        </div>
        <!-- fin nouveau commentaire -->


        <div class="cell">
            <?php
            $wall = display_wall($groupeid, 0);

            foreach ($wall as $com) {
                ?>
                <div class="media-object">
                    <i class="la la-2x la-comment"></i>

                    <?php
                    set_query_var('com', $com);
                    get_template_part('template-parts/echanger/comment-single-part', 'com');

                    $subs = display_wall($groupeid, $com->ID);
                    ?>
                </div>
                <?php
                foreach ($subs as $sub) {
                    ?>
                    <!-- sous commentaire -->
                    <div class="subcomment media-object">
                        <i class="la la-lg la-comments"></i>
                        <?php
                        set_query_var('com', $com);
                        get_template_part('template-parts/echanger/comment-single-part', 'com');
                        ?>
                    </div>
                    <!-- fin sous commentaire -->
                <?php } ?>

                <!-- nouveau sous commentaire -->
                <div class="media-object">
                    <div class="input-group">
                        <span class="input-group-label"><i class="la la-lg la-comments"></i></span>
                        <input class="input-group-field" type="text">
                        <div class="input-group-button">
                            <button type="submit" class="button hollow submit_wall_post" data-replyto="<?= $com->ID; ?>" data-groupe="<?= $groupeid; ?>">
                                <i class="la la-lg la-mail-reply"></i>
                            </button>

                        </div>
                    </div>
                </div>
                <!-- fin nouveau sous commentaire -->



            <?php } ?>

        </div>

        <hr>


    </div>

</div>		