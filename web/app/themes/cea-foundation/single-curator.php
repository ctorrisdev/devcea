<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
get_header();
?>

<div class="grid-container full">
    <div class="grid-x align-stretch">

        <div class="cell medium-12 large-8">

            <div class="grid-x grid-padding-x <?php echo $pady ?>" style="<?php echo $margy ?>">
                <div class="cell medium-6 small-order-2 medium-order-1 <?php echo $bg ?>" style="">
                    <?php get_template_part('template-parts/article-image'); ?>		
                </div>

                <div class="cell medium-6 small-order-1 medium-order-2 border-left main-post">	

                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/content', ''); ?>
                    <?php endwhile; ?>
                </div>

            </div>

            <div class="grid-x grid-padding-x grid-padding-y text-center" style="border-top: 1px solid #000; background: #000; color: #fff">
                <div class="cell medium-12">	
                    <?php the_post_navigation(); ?>
                </div>
            </div>

        </div>

        <div class="cell medium-12 large-4 border-left" style="">

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
