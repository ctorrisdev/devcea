<?php

/* file created by charles.torris@gmail.com */

function cea_clean_roles() {
    remove_role('editor');
    remove_role('author');
    remove_role('contributor');
    remove_role('subscriber');
    remove_role('commissaire');
    remove_role('curator');
}

register_activation_hook(__FILE__, 'cea_clean_roles');


function wps_change_role_name() {
    global $wp_roles;
    if (!isset($wp_roles))
        $wp_roles = new WP_Roles();
    $wp_roles->roles['administrator']['name'] = __('Admin Système');
    $wp_roles->role_names['administrator'] = __('Admin Système');
    $wp_roles->roles['admin_cea']['name'] = __('Admin CEA');
    $wp_roles->role_names['admin_cea'] = __('Admin CEA');
}

add_action('init', 'wps_change_role_name');

function cea_roles() {
   add_role('curator', __('Commissaire'), array(
        'read' => true, 
        'edit_posts' => true,
        'delete_posts' => false, 
            )
    );
   add_role('admin_cea', __('Admin CEA'), array(
        'read' => true, 
        'edit_posts' => true,
        'delete_posts' => true, 
            )
    );
   add_role('member', __('Membre actif'), array(
        'read' => true, 
        'edit_posts' => true,
        'delete_posts' => true, 
            )
    );
   add_role('member_curator', __('Membre Commissaire'), array(
        'read' => true, 
        'edit_posts' => true,
        'delete_posts' => true, 
            )
    );
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






