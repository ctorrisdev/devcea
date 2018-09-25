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
        'label' => __('Echanges'),
        'public' => true,
        'has_archive' => true,
    ));

    register_post_type('groupes', array(
        'label' => __('Groupes de Travail'),
        'public' => true,
        'has_archive' => true,
    ));

    register_post_type('creations', array(
        'label' => __('Créations'),
        'public' => true,
        'has_archive' => true,
    ));
}

require('includes/users.php');
require('includes/class-user.php');
require('includes/wall.php');
require('includes/curator.php');

if (function_exists('acf_add_options_page')) {

    acf_add_options_page();
}

function add_scripts() {
    global $plugs_version;
    wp_enqueue_script('cea-front-script', plugin_dir_url(__FILE__) . '/js/front.js', array('jquery'), $plugs_version, true);
    wp_localize_script('cea-front-script', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
}

add_action('wp_enqueue_scripts', 'add_scripts');

function load_custom_wp_admin_style() {
    global $plugs_version;
    wp_enqueue_style('cea-plugin-css', plugin_dir_url(__FILE__) . '/css.css',null,$plugs_version);
}

add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');



/* rewrite rules */

add_action( 'init', 'rewrite_rules' );
function rewrite_rules()
{
    add_rewrite_rule(
        'members/([^/]+)/?',
        'index.php?pagename=dev-curator&designer_slug=$matches[1]',
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