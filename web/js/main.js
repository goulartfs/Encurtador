$(function () {
    $('.form form:not(:first)').hide();
    $('.cadastro-login a:first img').css('transform', 'rotate(90deg)');
    $('.cadastro-login a').on('click', function (e) {
        e.preventDefault();
        $('.form form').hide();
        $($(this).attr('href')).show();
    });
})