<?php

register_sidebar(
        array(
            'id' => 'archives-widgets',
            'name' => __('Footer widgets', 'foundationpress'),
            'description' => __('Drag widgets to this footer container', 'foundationpress'),
            'before_widget' => '<section id="%1$s" class="cell medium-4 widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h6>',
            'after_title' => '</h6>',
        )
);
?>