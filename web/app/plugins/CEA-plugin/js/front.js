/* file created by charles.torris@gmail.com */


var files_for_this_post = [];

Dropzone.autoDiscover = false;
Dropzone.options.ceadrop = {
    init: function () {
        this.on("complete", function (file, response) {

            files_for_this_post.push(file.xhr.response);

        });
    }
}

jQuery(document).ready(function ($) {


    $("#ceadrop").dropzone({
        url: ajaxurl + "?action=upload_photo_social",
    });





    /* ECHANGER / GROUPES */
    $('#groupsearch .input-group-label').click(function () {
        $("#groupsearch").submit();
    });


    $("#groupsearch").on("submit", function (e) {
        e.preventDefault();
        $('.group-list').html('...');
        $.get(
                ajaxurl,
                {
                    'action': 'get_groupes_list',
                    'name': $('.input-group-field').val(),
                    'ajax': 1
                },
                function (response) {
                    $('.group-list').html(response);
                }
        );
    });


    $('.submit_wall_post').click(function () {
        var input = $(this).closest('.media-object').find('input');
        if(!input.val()){
            console.log('input empty');
            return(null);
        }
        $.post(
                ajaxurl,
                {
                    'action': 'wall_post',
                    'post': input.val(),
                    'replyto': $(this).data('replyto'),
                    'groupeid': $(this).data('groupe'),
                    'fichiers': JSON.stringify(files_for_this_post)
                },
                function (response) {
                    input.val('');
                    console.log(response);
                    var myDropzone = Dropzone.forElement("#ceadrop");
                    myDropzone.removeAllFiles();
                    window.location.reload();
                }
        );
    });




});