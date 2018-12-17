<?php
/*
  Template Name: tpl-archives
 */

get_header();
$curator = filter_input(INPUT_GET, 'curator', FILTER_SANITIZE_NUMBER_INT);
?>

<div class="grid-container full">
    <div class="grid-x align-top bg-zigzag">

        <!-- SIDEBAR WIDGETS -->
        <div class="cell small-12">
            <div class="grid-container full">
                <aside class="sidebar grid-x grid-padding-x grid-padding-y small-up-1 medium-up-3	bg-black align-middle">
                    <div class="cell medium-3 archives-widget">
                    <form>
                        <div class="input-group">    
                            <select name="curator" class="input-group-field">
                                <option value=""><?= __('Tous les commissaires','cea'); ?></option>
                                <?php
                                $args = array(
                                    'role' => 'curator',
                                    'orderby' => 'user_nicename',
                                    'order' => 'ASC'
                                );
    
                                $users = get_users($args);
                                foreach ($users as $user) {
                                    if ($curator == $user->ID) {
                                        $preselected = 'selected="selected"';
                                    } else
                                        $preselected = '';
                                    echo '<option value="' . $user->ID . '" ' . $preselected . '>' . esc_html($user->display_name) . '</option>';
                                }
                                ?>
                            </select>
                            <div class="input-group-button">
                                <button type="submit" class="button"><?= __('filtrer', 'cea'); ?></button>
                            </div>
                        </div>
                    </form>
                </aside>
            </div>
        </div>
        <!-- // SIDEBAR WIDGETS -->


        <div class="cell bg-blanc">

            <?php
            $args = array(
                'post_type' => 'creations',
                'posts_per_page' => '12',
                'paged' => $paged
            );

            if ($curator) {

                $args['author'] = $curator;
            }
            $wp_query = new WP_Query($args);
            ?>
            <div class="grid-container full">
                <div class="grid-x grid-padding-x grid-padding-y list-posts bg-black small-up-1 medium-up-3" >
                    <?php if ($wp_query->have_posts()) : ?>
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                            <?php get_template_part('template-parts/content', 'pool'); ?>
    <?php endwhile; ?>
                <?php endif; ?>
                </div>		    

<?php get_template_part('template-parts/pagination-part'); ?>
            </div>
        </div>

    </div>
</div>
<?php
get_footer();
