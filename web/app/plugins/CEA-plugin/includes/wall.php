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
        'post_content' => true,
        'new_post' => array(
            'post_type' => 'wall',
            'post_status' => 'publish',
        ),
        'submit_value' => __('Poster', 'cea'),
        'fields'=>array('reply-to','groupe_de_travail')
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

function display_wall($groupe = 0) {
    $form = '<input type="hidden" id="current_group" value="' . $groupe . '" />';
    $posts_array = array(
        'posts_per_page' => -1,
        'post_type' => 'wall',
    );

    if ($groupe) {
        $posts_array['meta_query'] = array(
            array(
                'key' => 'groupe',
                'value' => $groupe,
                'compare' => '=',
            )
        );
    }
    $posts = get_posts($posts_array);
    foreach ($posts as $wallpost) {
        setup_postdata($wallpost);
        $form .= '<hr/>';
        $form .= get_the_author();
        $form .= get_the_date();
        $form .= get_the_content();
    }
    wp_reset_postdata();

    return($form);
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
function group_join_quit(){
     $act = filter_input(INPUT_GET, 'act', FILTER_SANITIZE_STRING);
     $group_id = filter_input(INPUT_GET, 'groupe', FILTER_SANITIZE_STRING);
     
     $user = wp_get_current_user();
     $cea_user = new cea_user($user->ID);
     
     if($act=='join'){
         $cea_user->add_groupe($group_id);
     }
     
     if($act=='quit'){
         $cea_user->remove_groupe($group_id);
     }
}





function get_users_from_group($id) {

    // Get all users. you can use the WodPress args to filter them.
    $blogusers = get_users();
    $results = array();
    // Array of WP_User objects.
  
    foreach ($blogusers as $user) {
        $json =get_field('mes_groupes','user_'.$user->ID);
         $groupes = json_decode($json);         
         if($groupes && is_array($groupes) && in_array($id,$groupes)){
             $results[]=$user;
         }
    }
   
    return($results);
}
