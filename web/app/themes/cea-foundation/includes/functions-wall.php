<?php
/* file created by charles.torris@gmail.com */



add_shortcode('cea_wall_form', 'shortcode_wallform');
add_shortcode('cea_group_form', 'shortcode_groupform');
add_shortcode('cea_wall', 'shortcode_wall');




/* FORMS */

function display_wall_add_form() {
    acf_form(array(
        'post_id' => 'new_post',
        'post_title' => false,
        'post_content' => false,
        'new_post' => array(
            'post_type' => 'wall',
            'post_status' => 'publish',
        ),
        'submit_value' => __('Poster', 'cea'),
        'fields' => array('reply-to', 'groupe_de_travail', 'fichiers', 'post')
    ));
}

function shortcode_wallform() {
    display_wall_add_form();
}

/* ajout de nouveau groupe */

function display_wall_add_group_form() {
    acf_form(array(
        'post_id' => 'new_post',
        'post_title' => true,
        'post_content' => false,
        'fields' => array("description"),
        'new_post' => array(
            'post_type' => 'groupes',
            'post_status' => 'publish',
        ),
        'submit_value' => __('Créer le groupe', 'cea')
    ));
}

function shortcode_groupform() {
    display_wall_add_group_form();
}


/* action après creation de groupe */

function save_group_curator($post_id) {
    if (get_post_type($post_id) == 'groupes') {
        $user = wp_get_current_user();
        update_field('curator', $user->ID, $post_id);

        /* auto join the group you created */
        $user = wp_get_current_user();
        $cea_user = new cea_user($user->ID);
        $cea_user->add_groupe($post_id);
        $slug = get_post_field('post_name',$post_id);
        wp_redirect('/workgroups/'.$slug.'/');
        exit();
    }
}

add_action('acf/save_post', 'save_group_curator', 20);



/* DISPLAY PAGE */

/* GROUP LIST */


add_action('wp_ajax_get_groupes_list', 'get_groupes_list');
add_action('wp_ajax_nopriv_get_groupes_list', 'get_groupes_list');

function get_groupes_list() {
    $find = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
    $ajax = filter_input(INPUT_GET, 'ajax', FILTER_SANITIZE_STRING);

    if (!$find) {
        $posts_array = array(
            'posts_per_page' => 10,
            'post_type' => 'groupes',
        );
        $posts = get_posts($posts_array);
    } else {
        $posts = query_posts(array(
            'post_type' => 'groupes',
            's' => $find,
            'posts_per_page' => 10,
        ));
    }



    $display = '';


    if (empty($posts)) {
        $display = __('Aucun groupe correspondant','cea');
    } else {
        foreach ($posts as $groupe) {
						$curator = get_userdata($groupe->curator);
            $display .= '<li class="clearfix"><a href="/workgroups/' . $groupe->post_name . '/"><span class="float-left">' . $groupe->post_title . '</span><span class="float-right">'. $curator->display_name .' '.$curator->last_name . '</span></a></li>';
        }
        $display .= '';
    }

    if ($ajax) {
        echo $display;
        die();
    } else {
        return($display);
    }
}

/* JOIN / QUIT */

add_action('wp', 'group_join_quit');

function group_join_quit() {
    $act = filter_input(INPUT_GET, 'act', FILTER_SANITIZE_STRING);
    $group_id = filter_input(INPUT_GET, 'groupe', FILTER_SANITIZE_STRING);
    $user = wp_get_current_user();
    $cea_user = new cea_user($user->ID);

    if ($act == 'join') {
        $cea_user->add_groupe($group_id);
    }

    if ($act == 'quit') {
        $cea_user->remove_groupe($group_id);
    }
}

function get_users_from_group($id) {

    // Get all users. you can use the WodPress args to filter them.
    $blogusers = get_users();
    $results = array();
    // Array of WP_User objects.

    foreach ($blogusers as $user) {
        $json = get_field('mes_groupes', 'user_' . $user->ID);
        $groupes = json_decode($json);
        if ($groupes && is_array($groupes) && in_array($id, $groupes)) {
            $results[] = $user;
        }
    }

    return($results);
}

/* basic wall post fetching  */

function display_wall($groupe = 0, $replyto = 0, $offset = 0,$order = 'DESC') {

    $posts_array = array(
        'posts_per_page' => 10,
        'offset' => $offset,
        'post_type' => 'wall',
        'orderby' => 'date',
        'order' => $order,
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
      echo '</pre>'; */
    $posts = get_posts($posts_array);


    return($posts);
}

/* AJAX DISPLAY OF THE WALL */

add_action('wp_ajax_comment_load', 'ajax_comment_load');
add_action('wp_ajax_nopriv_comment_load', 'ajax_comment_load');

function ajax_comment_load() {
    $groupeid = filter_input(INPUT_POST, "groupeid", FILTER_SANITIZE_NUMBER_INT);
    $offset = filter_input(INPUT_POST, "offset", FILTER_SANITIZE_NUMBER_INT);

    if (!$groupeid)
        $groupeid = 0;

    $wall = display_wall($groupeid, 0, $offset);
    if (!$wall) {
        //  echo 'groupe '.$groupeid.',offset '.$offset;
        die(__('Plus de posts','cea'));
    }
    foreach ($wall as $com) {
        ?>
        <div class="filbloc fil-<?= $com->ID; ?> dacom-<?= $com->ID; ?>">
            <div class="media-object">
                <i class="la la-2x la-comment"></i>
                <?php
                set_query_var('com', $com);
                get_template_part('template-parts/echanger/comment-single-part', 'com');
                $subs = display_wall($groupeid, $com->ID,0,'ASC');
                ?>
            </div>
            <div class="subcomment">
                <div class="submessages">
                    <?php
                    foreach ($subs as $sub) {
                        ?>
                        <!-- sous commentaire -->
                        <div class="media-object dacom-<?= $sub->ID; ?>">
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
                
                        <?php
                        $user = new cea_user(get_current_user_id());
                        if ($user->is_group_autorized($groupeid)) :
                        ?>
                <!-- BUTTON nouveau sous commentaire -->
                <a href="#e" class="small button hollow show-subform sub-reply" data-subform="subform-<?= $com->ID; ?>"><?= __('répondre','cea'); ?> <i class="la la-lg la-reply"></i></a>
                <div class="media-object subform subform-<?= $com->ID; ?>" style="display:none;">
                    <div class="input-group">
                        <span class="input-group-label"><i class="la la-lg la-comments"></i></span>
                        <input class="input-group-field" type="text">
                        <div class="input-group-button">
                            <button type="submit" class="button hollow submit_wall_post" 
                                    data-replyto="<?= $com->ID; ?>" 
                                    data-groupe="<?= $groupeid; ?>"
                                    data-response_loc="fil-<?= $com->ID; ?>-response"
                                    data-typecom="sub"
                                    >
                                <i class="la la-lg la-mail-reply"></i>
                            </button>
                            <button class="button hollow dropmodalbutton" data-open="mydropmodal" data-txt="<?= __('Ajouter fichiers','cea'); ?>" data-tooltip tabindex="1" title="<?= __('Ajouter fichiers','cea'); ?>"><i class="la la-lg la-paperclip"></i> <span class="show-for-sr"><?= __('Ajouter fichiers','cea'); ?></span></button>
                        </div>
                        

                    </div>
                </div>
                <?php endif ; ?>
            </div>
            <!-- fin nouveau sous commentaire -->
        </div>
    <?php }
    ?>
    <div class="button hollow load_next_wall_chunk" 
         data-offset="<?= $offset + 10; ?>"          
         data-idgroupe="<?= $groupeid; ?>"         
         ><?= __('Afficher les posts suivant','cea'); ?>
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
        $imagename = explode('.', $_FILES['file']['name']);
        $filename = $user . '___' . time() . '___' . sanitize_title($imagename[0]) . '.' . strtolower($imagename[1]);
        $targetFile = $path . '/' . $filename;
        $url_finale = $url . '/' . $filename;
        move_uploaded_file($tempFile, $targetFile);
        die($url_finale);
    }

    die('empty upload call');
}


add_action('wp_ajax_delete_post', 'ajaxwallPostDelete');
add_action('wp_ajax_nopriv_delete_post', 'ajaxwallPostDelete');

function ajaxwallPostDelete() {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    $post = get_post($id);
    $userid = get_current_user_id();
    $user = wp_get_current_user();

    if($post->author == $userid || in_array('administrator', (array) $user->roles) || in_array('admin_cea', (array) $user->roles)){
        wp_delete_post($id);
        /* TODO clean child comments */
        die('ok');
    } 
    die('forbidden');
    
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
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    
    if(!$id){
    if (!$groupeid)
            $groupeid = 0;
        if (!$replyto)
            $replyto = 0;

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
   
    } else { /* edit mode */
        $idpost = $id;
         $my_post = array(
            'ID' => $id,
            'post_content' => $post,
        );
         wp_update_post( $my_post );
    }

     update_field('fichiers', $files, $idpost);
     
    /* format com */
    $com = get_post($idpost);
    ob_start();
    $template = get_template_directory() . '/template-parts/echanger/comment-single-part.php';
    $class = 'la la-lg la-comments';
    if (!$replyto)
        $class = 'la la-2x la-comment';
    ?><div class="media-object dacom-<?= $idpost;?>">
        <i class="<?= $class; ?>"></i>
        <?php
        include ($template);
        $var = ob_get_contents();
        ?></div><?php
    ob_end_clean();
    die($var);
}

function json_clean_decode($json, $assoc = false, $depth = 512, $options = 0) {
    // search and remove comments like /* */ and //
    $json = preg_replace("#(/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+/)|([\s\t]//.*)|(^//.*)#", '', $json);
    if (version_compare(phpversion(), '5.4.0', '>=')) {
        return json_decode($json, $assoc, $depth, $options);
    } elseif (version_compare(phpversion(), '5.3.0', '>=')) {
        return json_decode($json, $assoc, $depth);
    } else {
        return json_decode($json, $assoc);
    }
}

/* display the galery */

function format_gallery_wall($json) {

    $array = json_clean_decode(html_entity_decode($json));

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
            $files_array[] = $file;
        }
    }

    return(array(
        'images' => $images_array,
        'files' => $files_array
    ));
}
