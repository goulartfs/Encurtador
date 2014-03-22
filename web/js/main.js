$(function () {
    $('.form form:not(:first)').hide();
    $('.cadastro-login a:first img').rotateElement(90);
    $('.cadastro-login a').on('click', function (e) {
        $(this).find('img').rotateElement(90)
        $('.cadastro-login a').not(this).find('img').rotateElement(0)
        e.preventDefault();
        $('.form form').hide();
        $($(this).attr('href')).show();
    });

});

(function($){
    $.fn.rotateElement = function(degrees){
        $(this).animate({  borderSpacing: degrees }, {
            step: function(now,fx) {
                $(this).css('-webkit-transform','rotate('+now+'deg)');
                $(this).css('-moz-transform','rotate('+now+'deg)');
                $(this).css('transform','rotate('+now+'deg)');
            },
            duration:250
        },'linear');
    }
})(jQuery);