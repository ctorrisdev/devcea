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

function save_group_curator($post_id) {
    if (get_post_type($post_id) == 'groupes') {
        $user = wp_get_current_user();
        update_field('curator', $user->ID, $post_id);
    }
}

add_action('acf/save_post', 'save_group_curator', 20);











/* DISPLAY PAGE */

function display_wall($groupe = 0, $replyto = 0) {

    $posts_array = array(
        'posts_per_page' => -1,
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

function shortcode_wall() {
    display_wall(9);
}

/* GROUP LIST */


add_action('wp_ajax_get_groupes_list', 'get_groupes_list');
add_action('wp_ajax_nopriv_get_groupes_list', 'get_groupes_list');

function get_groupes_list() {
    $find = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
    $ajax = filter_input(INPUT_GET, 'ajax', FILTER_SANITIZE_STRING);

    if (!$find) {
        $posts_array = array(
            'posts_per_page' => 5,
            'post_type' => 'groupes',
        );
        $posts = get_posts($posts_array);
    } else {
        $posts = query_posts(array(
            'post_type' => 'groupes',
            's' => $find,
            'posts_per_page' => 5,
        ));
    }



    $display = '';


    if (empty($posts)) {
        $display = __('Aucun groupe correspondant');
    } else {
        foreach ($posts as $groupe) {
            $display .= '<li><a href="/workgroups/' . $groupe->post_name . '/">' . $groupe->post_title . '</a></li>';
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

add_action('wp_ajax_wall_post', 'wallPost');
add_action('wp_ajax_nopriv_wall_post', 'wallPost');

function wallPost() {
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

    die('Complete ' . $idpost);
}

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
