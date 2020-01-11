$( document ).ready(function() {
    M.AutoInit();

    // for archive sidebar
    $('#wordpress_archive').children().addClass('collection-item');


    //For comment page
    $('.comment-form-comment').addClass('input-field');
    $('#comment').addClass('materialize-textarea');
    $('#submit').addClass('waves-effect waves-light btn');
    $('.avatar').addClass('circle responsive-img');
    $('.comment-body').addClass('s12 card-panel grey lighten-5 ');
    $('#reply-title').addClass('flow-text');
});