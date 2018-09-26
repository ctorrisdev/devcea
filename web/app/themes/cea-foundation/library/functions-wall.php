<?php
/* file created by charles.torris@gmail.com */




/* basic wall post fetching  */
function display_wall($groupe = 0, $replyto = 0,$offset = 0) {

    $posts_array = array(
        'posts_per_page' => 10,
        'offset' => $offset,
        'post_type' => 'wall',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'reply-to',
                'value' => $replyto,
                'compare' => '='
            ), array(
                'key' => 'groupe_de_travail',
                'value' => $groupe,
                'compare' => '=',
            )
        )
    );
/*
    echo '<pre>';
    var_dump($posts_array);
    echo '</pre>';*/
    $posts = get_posts($posts_array);


    return($posts);
}


/* AJAX DISPLAY OF THE WALL */

add_action('wp_ajax_comment_load', 'ajax_comment_load');
add_action('wp_ajax_nopriv_comment_load', 'ajax_comment_load');

function ajax_comment_load() {
    $groupeid = filter_input(INPUT_POST,"groupeid",FILTER_SANITIZE_NUMBER_INT);
    $offset = filter_input(INPUT_POST,"offset",FILTER_SANITIZE_NUMBER_INT);

    $wall = display_wall($groupeid, 0, $offset);
    if(!$wall){        
        echo 'groupe '.$groupeid.',offset '.$offset;
        die(__('Plus de posts'));
    }
    foreach ($wall as $com) {
        ?>
        <div class="filbloc fil-<?= $com->ID; ?>">
            <div class="media-object">
                <i class="la la-2x la-comment"></i>
                <?php
                set_query_var('com', $com);
                get_template_part('template-parts/echanger/comment-single-part', 'com');
                $subs = display_wall($groupeid, $com->ID);
                ?>
            </div>
            <div class="subcomment">
                <div class="submessages">
                    <?php
                    foreach ($subs as $sub) {
                        ?>
                        <!-- sous commentaire -->
                        <div class="media-object">
                            <i class="la la-lg la-comments"></i>
                            <?php
                            set_query_var('com', $sub);
                            get_template_part('template-parts/echanger/comment-single-part', 'com');
                            ?>
                        </div>
                        <!-- fin sous commentaire -->
                    <?php } ?>
                    <div class="fil-<?= $com->ID; ?>-response"></div>
                </div>
                <!-- BUTTON nouveau sous commentaire -->
                <a href="#reply" class="button hollow show-subform sub-reply" data-subform="subform-<?= $com->ID; ?>"><?= __('répondre'); ?></a>
                <div class="media-object subform subform-<?= $com->ID; ?>" style="display:none;">
                    <div class="input-group">
                        <span class="input-group-label"><i class="la la-lg la-comments"></i></span>
                        <input class="input-group-field" type="text">
                        <div class="input-group-button">
                            <button type="submit" class="button hollow submit_wall_post" 
                                    data-replyto="<?= $com->ID; ?>" 
                                    data-groupe="<?= $groupeid; ?>"
                                    data-response_loc="fil-<?= $com->ID; ?>-response"
                                    >
                                <i class="la la-lg la-mail-reply"></i>
                            </button>

                        </div>
                        <button class="button hollow dropmodalbutton" data-open="mydropmodal"><?= __('Ajouter fichiers'); ?></button>

                    </div>
                </div>
            </div>
            <!-- fin nouveau sous commentaire -->
        </div>
        <?php }
    ?>
    <div class="button hollow load_next_wall_chunk" 
         data-offset="<?= $offset + 10; ?>"          
         data-idgroupe="<?= $groupeid; ?>"         
         ><?= __('Afficher les posts suivant'); ?>
    </div>
    <?php
    die();
}




/* UPLOADS
 * 
 * /wp/wp-admin/admin-ajax.php?action=upload_photo_social
 *  */
add_action('wp_ajax_upload_photo_social', 'uploadPhotoSocial');
add_action('wp_ajax_nopriv_upload_photo_social', 'uploadPhotoSocial');

function uploadPhotoSocial() {

    $dir = wp_upload_dir();
    $path = $dir['path'];
    $url = $dir['url'];

    if (!empty($_FILES)) {

        $tempFile = $_FILES['file']['tmp_name'];

        $user = get_current_user_id();
        $filename = $user . '_' . time() . '_' . $_FILES['file']['name'];

        $targetFile = $path . '/' . $filename;
        $url_finale = $url . '/' . $filename;

        move_uploaded_file($tempFile, $targetFile);
        error_log($url_finale);
        die($url_finale);
    }

    die('empty upload call');
}


/* ajax post to wall */

add_action('wp_ajax_wall_post', 'ajaxwallPost');
add_action('wp_ajax_nopriv_wall_post', 'ajaxwallPost');

function ajaxwallPost() {
    $user = get_current_user_id();
    $post = filter_input(INPUT_POST, 'post', FILTER_SANITIZE_STRING);
    $replyto = filter_input(INPUT_POST, 'replyto', FILTER_SANITIZE_NUMBER_INT);
    $groupeid = filter_input(INPUT_POST, 'groupeid', FILTER_SANITIZE_NUMBER_INT);
    $files = filter_input(INPUT_POST, 'fichiers', FILTER_SANITIZE_STRING);
    if(!$groupeid)$groupeid=0;
    if(!$replyto)$replyto=0;

    $my_post = array(
        'post_title' => time(),
        'post_content' => $post,
        'post_type' => 'wall',
        'post_status' => 'publish',
        'post_author' => $user
    );

// Insert the post into the database
    $idpost = wp_insert_post($my_post);
    update_field('groupe_de_travail', $groupeid, $idpost);
    update_field('reply-to', $replyto, $idpost);
    update_field('fichiers', $files, $idpost);

    
    /* format com */
    $com = get_post($idpost);
    ob_start();   
    $template = get_template_directory().'/template-parts/echanger/comment-single-part.php';    
    $class='la la-lg la-comments';
    if(!$replyto)$class ='la la-2x la-comment';
    ?><div class="media-object">
      <i class="<?=$class; ?>"></i>
    <?php
    include ($template);
    $var = ob_get_contents();
    ?></div><?php
    ob_end_clean();
    die($var);
}


/* display the galery */
function format_gallery_wall($json) {
    $array = json_decode($json);
    $images = array('.jpg', '.png');
    $images_array = array();
    $files_array = array();
    foreach ($array as $file) {
        $filtred = false;
        foreach ($images as $format) {
            if (strstr($file, $format)) {
                $images_array[] = $file;
                $filtred = true;
            }
        }
        if (!$filtred) {
            $files_array = $file;
        }
    }

    return(array(
        'images' => $images_array,
        'files' => $files_array
    ));
}




