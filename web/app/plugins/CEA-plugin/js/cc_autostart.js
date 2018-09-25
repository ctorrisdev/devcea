/* file created by charles.torris@gmail.com */


jQuery(document).ready(function( $ ) {   
    var url = $(document).find('#wp-admin-bar-et-use-visual-builder a').attr('href');
    window.location.replace(url);
    $("body").hide();
});