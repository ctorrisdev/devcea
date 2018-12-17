<?php

/* file created by charles.torris@gmail.com */

function cea_clean_roles() {

    remove_role('editor');
    remove_role('author');
    remove_role('contributor');
    remove_role('subscriber');
    remove_role('commissaire');
    remove_role('curator');
    remove_role('member');
    remove_role('new_role');


    $role = get_role('administrator');
    $role->add_cap('edit_creation');
    $role->add_cap('edit_creations');
    $role->add_cap('publish_creations');
    $role->add_cap('delete_creation');



    add_role('curator', __('Commissaire', 'cea'), array(
        'edit_files' => true,
        'manage_links' => true,
        'upload_files' => true,
        'unfiltered_html' => true,
        'edit_posts' => true,
        //  'edit_others_posts' => true,
        'edit_published_posts' => true,
        'publish_posts' => true,
        'read' => true,
        'unfiltered_upload' => true,
        'edit_creation' => true,
        'edit_creations' => true,
        'publish_creations' => true,
        'delete_creation' => true,
        'edit_published_creations' => true,
            )
    );


    add_role('admin_cea', __('Admin CEA', 'cea'), array(
        'read' => true,
        'edit_posts' => true,
        'delete_post' => true,
            )
    );


    add_role('member', __('Membre actif', 'cea'), array(
        'read' => true,
        'edit_posts' => false,
        'delete_post' => false,
            )
    );
    add_role('member_curator', __('Membre Commissaire Européen', 'cea'), array(
        'read' => true,
        'edit_posts' => false,
        'delete_post' => false,
            )
    );
}

register_activation_hook(__FILE__, 'cea_clean_roles');

function wps_change_role_name() {
    exit('debug - activation only');
    global $wp_roles;
    if (!isset($wp_roles))
        $wp_roles = new WP_Roles();
    $wp_roles->roles['administrator']['name'] = __('Admin Système', 'cea');
    $wp_roles->role_names['administrator'] = __('Admin Système', 'cea');
    $wp_roles->roles['admin_cea']['name'] = __('Admin CEA', 'cea');
    $wp_roles->role_names['admin_cea'] = __('Admin CEA', 'cea');
}

add_action('after_switch_theme', 'wps_change_role_name');

function cea_roles() {
    // cea_clean_roles();
}

add_action('init', 'cea_roles');


add_action('admin_init', 'my_remove_menu_pages');

function my_remove_menu_pages() {
    if (current_user_can('curator')) {
        remove_menu_page('tools.php'); // Tools
        remove_menu_page('users.php'); // Users
        remove_submenu_page('index.php', 'update-core.php'); // Dashboard - Updates
        remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag'); // Posts - Tags 
        remove_submenu_page('themes.php', 'theme-editor.php'); // Appearance - Editor
        remove_submenu_page('plugins.php', 'plugin-editor.php'); // Plugins - Editor
        remove_menu_page('edit.php');
        remove_menu_page('page.php');
        remove_menu_page('wpcf7');
        remove_menu_page('edit.php?post_type=wall');
        remove_menu_page('edit.php?post_type=groupes');
    }
    remove_menu_page('edit-comments.php');
}

add_filter('ajax_query_attachments_args', 'wpb_show_current_user_attachments');

function wpb_show_current_user_attachments($query) {
    $user_id = get_current_user_id();
    if ($user_id && !current_user_can('activate_plugins') && !current_user_can('edit_others_posts')) {
        $query['author'] = $user_id;
    }
    return $query;
}

add_action('wp_ajax_conversion_annuaire', 'conversion_annuaire');
add_action('wp_ajax_nopriv_conversion_annuaire', 'conversion_annuaire');

function conversion_annuaire() {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    cea_clean_roles();
    
    $posts_array = array(
        'posts_per_page' => -1,
        'post_type' => 'post',
        'category' => 24
    );
    $membs = get_posts($posts_array);
    foreach ($membs as $mb) {
        
        
        echo '<hr>' . $mb->post_title . '</br>';
        $name = explode(' ', $mb->post_title);
        $prenom = $name[sizeof($name) - 1];
        $nom = '';
        for ($i = 0; $i < sizeof($name) - 1; $i++) {
            $nom .= $name[$i];
        }
        echo $prenom;
        echo ' ' . $nom;
        $email = strtolower($nom . $prenom . '@c-e-a.asso.fr');
        $login = sanitize_title($nom . '.' . $prenom);
        echo '<br/>Login : ' . $login;
        echo '<br/>Email : ' . $email;
        $newman = new cea_user(null, $login, $email);
        if ($newman) {
            if (!is_object($newman->id)) {
                echo '<br/>Id : ' . $newman->id;
                $u = new WP_User($newman->id);
                $u->add_role('member');
                update_field('contenu_ancien_annuaire', $mb->post_content, 'user_' . $newman->id);
                wp_update_user(array('ID' => $newman->id, 'first_name' => $prenom, 'last_name' => $nom));
            }
        }
        wp_delete_post( $mb->ID);
    }

    die('done');
}
