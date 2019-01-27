<?php
/*
  Template Name: tpl-home
 */

get_header();
?>
<?php while (have_posts()) : the_post(); ?>
    <div class="grid-container full">
        <div class="grid-x align-strech">

            <!-- PART 1 -->
            <div class="cell medium-4 list-posts small-order-2 medium-order-1">
                 <?= slider_post('35', '3', 'bg-white',true); ?>
                
            </div>

            <!-- PART 2 -->
            <div class="cell medium-4  bg-informer text-center border-left border-right small-order-1 medium-order-2">
                <div class="padding-x padding-y bg-blanc">
                    <p class="h2 serif" style=" margin:auto;font-weight: 600; ">
                        <?= nl2br(strip_tags(get_the_content())); ?>
                    </p>
                </div>
            </div>

            <!-- PART 3 -->
            <div class="cell medium-4 bg-zigzag small-order-3">
                <?= slider_post('4', '3', 'bg-black'); ?>
            </div>

        </div>
    </div>
<div id="btn_curator" class="macaron"><span><?= __('Plateforme curatoriale','cea'); ?></span></div>
    <?php
endwhile;

get_footer();
