<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/favicon/site.webmanifest">
        <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon/safari-pinned-tab.svg" color="#000000">
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon.ico">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/favicon/mstile-144x144.png">
        <meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/images/favicon/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">


        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>><h1>CREATIONS TEMPLATE</h1>

      
