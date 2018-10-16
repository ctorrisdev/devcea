<?php

/*
  Plugin Name: C-E-A Plugin Fonctionnalités
  Plugin URI:
  Description: Le plugin des fonctionnalités pour C-E-A
  Author: C.Torris
  Author URI:
  Version: 0
  Text Domain:
  License:
 */
global $plugs_version;
$plugs_version = 1;
if (getenv('WP_ENV') != 'production') {
    $plugs_version = time();
}

add_action('init', 'register_cpt', 0);

function register_cpt() {
    register_post_type('wall', array(
        'label' => __('Echanges','cea'),
        'public' => true,
        'has_archive' => true,
    ));

    register_post_type('groupes', array(
        'label' => __('Groupes de Travail','cea'),
        'public' => true,
        'has_archive' => true,
    ));

    register_post_type('creations', array(
        'label' => __('Créations','cea'),
        'public' => true,
        'has_archive' => true,
        'map_meta_cap ' => true,
        'capabilities' => array(
            'edit_post' => 'edit_creation',
            'edit_posts' => 'edit_creations',
            'edit_others_posts' => 'edit_other_creations',
            'publish_posts' => 'publish_creations',
            'read_post' => 'read_creation',
            'read_private_posts' => 'read_private_creations',
            'delete_post' => 'delete_creation',
            'edit_published_posts' => 'edit_published_creations'
        ),
    ));
}

require('includes/users.php');
require('includes/class-user.php');
require('includes/curator.php');

if (function_exists('acf_add_options_page')) {

    acf_add_options_page();
}

function add_scripts() {
    global $plugs_version;    
    wp_enqueue_style('cea-plugin-css-front',get_stylesheet_directory_uri() . '/css/front.css',null,$plugs_version);
    wp_enqueue_script('dropzone',get_stylesheet_directory_uri() . '/js/dropzone.js', array('jquery'));
    wp_enqueue_script('cea-front-script',get_stylesheet_directory_uri() . '/js/front.js', array('jquery','dropzone'), $plugs_version, true);
    wp_localize_script('cea-front-script', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
    
}

add_action('wp_enqueue_scripts', 'add_scripts');

function load_custom_wp_admin_style() {
    global $plugs_version;
    wp_enqueue_style('cea-plugin-css',get_stylesheet_directory_uri() . '/css/admin_css.css',null,$plugs_version);
}

add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');



/* rewrite rules */

add_action( 'init', 'rewrite_rules' );
function rewrite_rules()
{
    add_rewrite_rule(
        'members/([^/]+)/?',
        'index.php?pagename=curator&designer_slug=$matches[1]',
        'top' );
     add_rewrite_rule(
        'workgroups/([^/]+)/?',
        'index.php?pagename=echanger&groupe_slug=$matches[1]',
        'top' );
}

add_filter( 'query_vars', 'cea_query_vars' );
function cea_query_vars( $query_vars )
{
    $query_vars[] = 'designer_slug';
    $query_vars[] = 'groupe_slug';
    return $query_vars;
}