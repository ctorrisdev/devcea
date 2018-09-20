<?php

if (!function_exists('get_posts_marquee')) {

    function get_posts_marquee() {
        
        $recent_posts = wp_get_recent_posts();
        foreach ($recent_posts as $recent) {
// print_r($recent);
            $marquee = '<span class="marquee-space">&nbsp;&nbsp;&mdash;&nbsp;&nbsp;</span>';
            $marquee .= '<span>';
            $marquee .= '<a title="' . $recent["post_title"] . '" class="by-place" href="' . get_permalink($recent["ID"]) . '" data-id="' . $recent["ID"] . '">' . $recent["post_title"] . '</a></span>';

            echo $marquee;
        }

        //wp_reset_query();
    }

}
?>