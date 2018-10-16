<?php
$author = get_user_by('id', $com->post_author);
$self = get_current_user_id();
$json = get_field('fichiers', $com->ID);
?>

<div class="media-object-section" style='width:100%;'>
    <div class="clearfix">
        <h5 class="float-left"><small>par <?= $author->display_name; ?>, le <?= date('d.m.Y', strtotime($com->post_modified)); ?></small></h5>
        <?php if ($com->post_author == $self): ?>
            <div class="editor float-right" data-comid="<?= $com->ID; ?>">
                <span data-tooltip tabindex="1" title="<?= __('modifier'); ?>"><i data-open="mydropmodal" class="la la-pencil edit_com" data-comid="<?= $com->ID; ?>" ></i></span>
                <span data-tooltip tabindex="2" title="<?= __('supprimer'); ?>"><i class="la la-trash del_com" data-txt="<?= __('Effacement irreversible, êtes-vous sûr ?'); ?>" data-comid="<?= $com->ID; ?>"></i></span>
            </div>
        <?php endif; ?>
    </div>
    <div id="post-<?= $com->ID; ?>"><?= make_clickable(apply_filters('the_content', $com->post_content)); ?></div>
    <div class="hidden" id="edit-post-<?= $com->ID; ?>"><?= $com->post_content; ?></div>
    <div class="hidden" id="edit-galery-<?= $com->ID; ?>"><?= $json; ?></div>


    <?php
    $galery = format_gallery_wall($json);
    $images = $galery['images'];
    $files = $galery['files'];
    if ($images) :

        echo "<div class=\"grid-x grid-margin-x grid-margin-y small-up-1 medium-up-3 large-up-6\">";

        foreach ($images as $image) :
            ?>

            <a href="<?= $image; ?>" class="cell fresco" data-fresco-group="comgalery<?= $com->ID; ?>" data-fresco-caption="<?= $com->post_content; ?>">    
                <img src="<?= $image; ?>" class="pj-img" alt="<?= $com->post_content; ?>">
                <div class="lookat"><i class="la la-2x la-eye"></i></div>
            </a>


        <?php endforeach; ?>
        <br/></div>
<?php endif; ?>
<?php if ($files) : foreach ($files as $file) : ?>
        <?php
        $title = explode('/', $file);
        $title = $title[sizeof($title) - 1];
        $title = explode('___', $title);
        $title = $title[2];
        if (!$title)
            $title = __('fichier');
        ?>
        <a href="<?= $file; ?>" class="pj-txt"> <i class="la la-lg la-paperclip"></i> <?= $title; ?></a>
        <?php
    endforeach;
endif;
?>
</div>