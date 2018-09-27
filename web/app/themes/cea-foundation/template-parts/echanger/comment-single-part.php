<?php
$author = get_user_by('id', $com->post_author);
$self = get_current_user_id();
?>

<div class="media-object-section" style='width:100%;'>
    <div class="clearfix">
        <h5 class="float-left"><small>par <?= $author->display_name; ?>, le <?= date('d.m.Y', strtotime($com->post_modified)); ?></small></h5>
        <?php if ($com->post_author == $self): ?>
            <div class="editor float-right" data-comid="<?= $com->ID; ?>">
                <i class="la la-pencil edit_com" data-comid="<?= $com->ID; ?>"></i>
                <i class="la la-trash del_com" data-txt="<?= __('Effacement irreversible, êtes-vous sûr ?'); ?>" data-comid="<?= $com->ID; ?>"></i>
            </div>
        <?php endif; ?>
    </div>
    <p><?= make_clickable(apply_filters('the_content', $com->post_content)); ?></p>
    <?php
    $json = get_field('fichiers', $com->ID);
    $galery = format_gallery_wall($json);
    $images = $galery['images'];
    $files = $galery['files'];
    if ($images) : foreach ($images as $image) :
        
           
        
            ?>
            <a href="<?= $image; ?>" class="fresco" data-fresco-group="comgalery<?= $com->ID; ?>" data-fresco-caption="<?= $com->post_content; ?>">
                <div class="picou" style="background-image:url(<?= $image; ?>);"></div>
            </a>


        <?php endforeach; ?><br/><?php endif;
    ?>
    <?php if ($files) : foreach ($files as $file) : ?>
            <?php
            $title = explode('/', $file);
            $title = $title[sizeof($title) - 1];
            $title = explode('___', $title);
            $title = $title[2];
            if (!$title)
                $title = __('fichier');
            ?>
            [<a href="<?= $file; ?>"> <?= $title; ?></a>]
        <?php
        endforeach;
    endif;
    ?>
</div>