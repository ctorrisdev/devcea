<?php
/**
 * The default template for displaying pool content
 */
?>

<article id="post-<?php the_ID(); ?>" class="cell post-search bg-blanc text-center" <?php post_class(); ?>>
    <header>
        <?php the_title('<h3 class="entry-title">', '</h3>'); ?>
    </header>
    <div class="entry-content">
           <p class="h6 serif"><?php _e('Créé par','cea'); ?> <?php the_author_link(); ?></p>
           <br>
        <?php
            nl2br(the_excerpt());
            echo '<a class="hollow button" href="' . esc_url(get_permalink()) . '" rel="bookmark">Lire la suite</a>';
        ?>
    </div>
</article>
