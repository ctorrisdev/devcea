<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
get_header();
?>

<div class="grid-container full align-stretch">
    <div class="grid-x align-stretch">

        <div class="cell medium-12 large-8">
            <?php
            if (has_post_thumbnail($post->ID) != 1 && empty(get_field("infos")) && empty(get_field("credits"))) {
                $bg = 'blank-bg-1';
                $pady = 'grid-padding-y';
            } else {
                $margy = "padding-top: 1em; padding-bottom: 1em";
            }
            ?>
            <div class="grid-x grid-padding-x <?php echo $pady ?>" style="<?php echo $margy ?>">
                <div class="cell medium-6 small-order-2 medium-order-1 <?php echo $bg ?>" style="">
                    <?php get_template_part('template-parts/article-image'); ?>

                    <?php
                    if (get_field("infos")) {
                        ?>
                        <?php
                        if (has_post_thumbnail($post->ID) == 1) {
                            echo '<hr>';
                        }
                        ?>

                        <h3><?php _e('informations pratiques', 'cea'); ?></h3>
                        <?php
                        echo the_field("infos");
                    }
                    ?>

                    <?php
                    if (get_field("credits")) {
                        ?>
                        <hr>
                        <?php
                        echo the_field("credits");
                    }
                    ?>



                </div>

                <div class="cell medium-6 small-order-1 medium-order-2 border-left main-post">	

                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/content', ''); ?>
                        <?php //comments_template(); ?>
<?php endwhile; ?>
                </div>

            </div>

            <div class="grid-x grid-padding-x grid-padding-y text-center align-self-bottom bg-black">
                <div class="cell medium-12">	
<?php the_post_navigation(); ?>
                </div>
            </div>

        </div>

        <div class="cell medium-12 large-4 border-left bg-zigzag">

            <div class="grid-x grid-padding-x grid-padding-y">
                <div class="cell medium-12">
<?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>


</div>
<?php
get_footer();
