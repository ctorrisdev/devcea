<?php
/*
  Template Name: pleine page sans marge
 */
get_header();

?>

<?php get_template_part('template-parts/featured-image'); ?>
<div class="grid-container full">
    <div class="">
        <main>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'page'); ?>
                <?php comments_template(); ?>
            <?php endwhile; ?>
        </main>
    </div>
</div>
<?php
get_footer();
