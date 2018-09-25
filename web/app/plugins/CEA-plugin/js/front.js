/* file created by charles.torris@gmail.com */

jQuery(document).ready(function ($) {
    
    /* ECHANGER / GROUPES */
    $('#groupsearch .input-group-label').click(function(){
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
                    'ajax':1
                },
                function (response) {
                    $('.group-list').html(response);
                }
        );
    });
    
    /* formulaire postage wall */
    $('.ajout_media_post').click(function(){
        $('.replyto-form').find('.add_media').trigger('click');
    });
    
    $('.submit_wall_post').click(function(){
        $('#tinymce').find('body').append($('.new_wall_post_content').val());
        $('.replyto-form').find('form').submit();
        
    });
    
    
    
   
});