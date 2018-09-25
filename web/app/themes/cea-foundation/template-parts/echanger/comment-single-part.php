<?php  
extract($wp_query->query_vars, EXTR_SKIP);

$author = get_user_by('id',$com->post_author); 
?>

    <div class="media-object-section">
        <div class="clearfix">
            <h5 class="float-left"><small>par <?= $author->display_name; ?>, le <?= date('d.m.Y',strtotime($com->post_modified)); ?></small></h5>
            <div class="editor float-right">
                <i class="la la-pencil"></i>
                <i class="la la-trash"></i>
            </div>
        </div>
        <p><?= strip_tags($com->post_content); ?></p>
        
        
    </div>