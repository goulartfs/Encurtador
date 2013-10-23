$(function() {
    $('.dialog').click(function() {
        $($(this).attr('href')).dialog();
        return false;
    });
});


