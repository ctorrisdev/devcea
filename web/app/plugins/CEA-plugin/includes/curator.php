<?php

/* file created by charles.torris@gmail.com */

add_shortcode('cea_curation_form', 'display_shortcode_curator_page');

function start_new_crea() {

    // TODO user rights
    $cea_cc_title = filter_input(INPUT_POST, "start_creation_curatoriale", FILTER_SANITIZE_STRING);
    if ($cea_cc_title) {
        $my_post = array(
            'post_title' => wp_strip_all_tags($cea_cc_title),
            'post_status' => 'publish',
            'post_content' => '',
            'post_type' => 'creations',
            'post_author' => get_current_user_id(),
        );
        $curation_id = wp_insert_post($my_post, true);
        wp_redirect(get_permalink($curation_id) . '?ccautostart=1');
        exit();
    }

    $autostart = filter_input(INPUT_GET, "ccautostart", FILTER_SANITIZE_STRING);
    if ($autostart) {
        global $plugs_version;

        wp_enqueue_script('cc_autostart', plugin_dir_url(__FILE__) . '../js/cc_autostart.js', array('jquery'),$plugs_version);
    }
}

add_action('wp', 'start_new_crea');

function display_shortcode_curator_page() {    
    $user = wp_get_current_user();
    if (!in_array('curator', (array) $user->roles) && !in_array('administrator', (array) $user->roles)) {
        return(__('Seul les commissaires peuvent utiliser l\'outil de création curatoriale'));
    }
    $form = '
        <div class="curator_menu">    
            <a href="#a">' . __('Commencer une nouvelle création curatoriale') . '</a>
            <form method="post">
                ' . __('Titre de la création') . '
                <input required type="text" name="start_creation_curatoriale" />
                <input class="button hollow" type="submit" value="' . __('Demarrer l\'éditeur visuel') . '" />
            </form>
        </div>';
    return($form);
}

