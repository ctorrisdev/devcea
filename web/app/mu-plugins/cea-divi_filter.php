<?php
ini_set('memory_limit','1G');


/* file created by charles.torris@gmail.com */
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$is_admin = strpos($request_uri, '/wp-admin/');

// add filter in front pages only
if (false === $is_admin) {
    add_filter('option_active_plugins', 'kinsta_option_active_plugins');
}

function kinsta_option_active_plugins($plugins) {
    
    global $request_uri;
    $is_curater = strpos($request_uri, '/curater/');
    $is_creations = strpos($request_uri, '/creations/');

    $unnecessary_plugins = array();

    // conditions
    // if this is not contact page
    // deactivate plugin
    if (false === $is_curater && false === $is_creations) {
        $unnecessary_plugins[] = 'divi-builder-master/divi-builder.php';
      // die('Dev Testing '.$is_curater.' . '.$is_creations);
    }

    foreach ($unnecessary_plugins as $plugin) {
        $k = array_search($plugin, $plugins);
        if (false !== $k) {
            unset($plugins[$k]);
        }
    }
    return $plugins;
}
