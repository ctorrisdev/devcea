/* file created by charles.torris@gmail.com */


var files_for_this_post = [];

Dropzone.autoDiscover = false;
Dropzone.options.ceadrop = {
    init: function () {
        this.on("complete", function (file, response) {

            files_for_this_post.push(file.xhr.response);
            $('.dropmodalbutton').html('+' + files_for_this_post.length + ' doc(s)');
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


    /* 
     * WALL ECHANGER FUNCTIONS 
     * 
     * 
     * */


    $(document).on('click','.submit_wall_post',function () {
        var input = $(this).closest('.media-object').find('input');        
        var responsediv = $(this).data('response_loc');        
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
                    /* reset the form */
                    input.val('');
                    $('.dropmodalbutton').html('Add files');
                    var myDropzone = Dropzone.forElement("#ceadrop");
                    myDropzone.removeAllFiles();
                    $('.'+responsediv).after(response);
                }
        );
    });

    $(document).on('click','.show_dropzone',function(){
        $(this).hide();
       $(this).next('.dropzone').show();
    });
    $(document).on('click','.show-subform',function(){
        $('.subform').hide();
       $(this).hide();
       $(this).next('.subform').show();
    });

    $(document).on('click','.load_next_wall_chunk',function(){
        var offset = $(this).data('offset');
        var container = $('.comments-loader');
        var idgroupe = $(this).data('idgroupe');
        var that = $(this);
        that.removeClass('load_next_wall_chunk').removeClass('button').removeClass('hollow');
        that.html(' (...) ');
        
         $.post(
                ajaxurl,
                {
                    'action': 'comment_load',
                    'groupeid': idgroupe,
                    'offset' : offset,
                },
                function (response) {
                   container.append(response);
                   that.remove();
                }
        );
    });

    $(window).on("scroll load", function () {
        if ($(document).find('.load_next_wall_chunk').length) {
            var scrollHeight = $(document).find('.load_next_wall_chunk').position().top;
           // console.log('look4' + $(window).scrollTop() + ' vs ' + scrollHeight);
            if ($(window).scrollTop() + $(window).height() > scrollHeight) {
                $(document).find('.load_next_wall_chunk').trigger('click');
            }
        }
    });
});