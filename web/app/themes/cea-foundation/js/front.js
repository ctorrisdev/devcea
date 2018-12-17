/* file created by charles.torris@gmail.com */


/* 
 * 
 * WALL / ECHANGER
 * 
 * 
 */

var files_for_this_post = [];
var myDropZone;
Dropzone.autoDiscover = false;
Dropzone.options.ceadrop = {
    addRemoveLinks: true,
    init: function () {
        this.on("complete", function (file, response) {
            if (file.xhr) {
                file.xhr.response = file.xhr.response.replace(/(\r\n|\n|\r)/gm, "");
                file.xhr.response = file.xhr.response.replace(/\s/g, '');
                file.xhr.response = file.xhr.response.replace('↵', '');
                file.xhr.response = file.xhr.response.replace(' ', '');
                console.log(file.xhr.response);
                files_for_this_post.push(file.xhr.response);
                $('.dropmodalbutton').html('+' + files_for_this_post.length + ' doc(s)');
                console.log(files_for_this_post);
            }

        });
        this.on("removedfile", function (file, response) {
            if (file) {
                file = file.name;
                console.log(file);
                console.log("removed");
                files_for_this_post.splice(files_for_this_post.indexOf(file), 1);
                console.log(files_for_this_post);
                $('.dropmodalbutton').html('+' + files_for_this_post.length + ' doc(s)');
            }

        });
        this.on('resetFiles', function () {
            if (this.files.length != 0) {
                for (i = 0; i < this.files.length; i++) {
                    this.files[i].previewElement.remove();
                }
                this.files.length = 0;
            }
        });
        myDropZone = this;
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


    $(document).on('click', '.submit_wall_post', function () {
        var input = $(this).parents('.input-group').find('input');
        var responsediv = $(this).data('response_loc');
        var typecom = $(this).data('typecom');
        if (!input.val()) {
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
                    $('.dropmodalbutton').html($(this).data('txt'));
                    files_for_this_post = [];
                    var ceadrop = Dropzone.forElement("#ceadrop");
                    ceadrop.removeAllFiles();
                    if(typecom =='sub'){
                        $('.' + responsediv).before(response);
                    }else {
                        $('.' + responsediv).after(response);
                    }
                }
        );
    });

    $(document).on('click', '.show_dropzone', function () {
        $(this).hide();
        $(this).next('.dropzone').show();
    });
    $(document).on('click', '.show-subform', function () {
        $('.subform').hide();
        $(this).hide();
        $(this).next('.subform').show();
    });

    $(document).on('click', '.load_next_wall_chunk', function () {
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
                    'offset': offset,
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

    /* effacement */
    $(document).on('click', '.del_com', function () {

        var id = $(this).data('comid');
        var r = confirm($(this).data('txt'));
        if (r === true) {
            $(document).find('.dacom-' + id).remove();
            $.post(
                    ajaxurl,
                    {
                        'action': 'delete_post',
                        'id': id,
                    },
                    function (response) {
                        console.log(response);
                    }
            );
        }

    });
    $(document).on('click', '.dropmodalbutton', function (e) {
        $('.editmode').hide();
    });

    $(document).on('click', '.edit_com', function () {
        var id = $(this).data('comid');
        $('.edition_submit').data('id', id);
        $('#com_editor').val($('#edit-post-' + id).html());
        if ($('#edit-galery-' + id).html()) {
            files_for_this_post = JSON.parse($('#edit-galery-' + id).html());
        }

        console.log(files_for_this_post);
        for (i = 0; i < files_for_this_post.length; i++) {
            var url = files_for_this_post[i];
            addToDrop(url);
        }
        console.log(files_for_this_post);
        $('.editmode').show();

    });

    function addToDrop(url) {
        var mockFile = {name: url, size: 12345};
        myDropZone.emit("addedfile", mockFile);
        myDropZone.emit("thumbnail", mockFile, url);
        myDropZone.emit("complete", mockFile);
    }

    $('.edition_submit').click(function () {
        var id = $(this).data('id');
        var msg = $('#com_editor').val();
        var files = JSON.stringify(files_for_this_post);
        $('#mydropmodal').foundation('close');
        $.post(
                ajaxurl,
                {
                    'action': 'wall_post',
                    'post': msg,
                    'fichiers': files,
                    'id': id,
                },
                function (response) {
                    /* reset the form */
                    $('#com_editor').val('');
                    files_for_this_post = [];
                    $('.dropmodalbutton').html($(this).data('txt'));
                    myDropZone.emit('resetFiles');
                    $('.dacom-' + id).html(response);

                }
        );
    });
    
    $('.modifprof').click(function(){
        $('.off-canvas').find('.close-button').trigger('click');
    });
    
    if(jQuery('#show_edit_profil').val()){
        console.log('oui');
        setTimeout(function(){
            $('#opentrigger').trigger('click');
        },1000);
        
    }
    
});