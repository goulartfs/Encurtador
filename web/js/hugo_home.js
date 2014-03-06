$('.cadastro').click(function(){
	$('#form').removeClass('esconder').hasClass('esconder');
	$('#form-login').addClass('esconder');
	$('.cadastro-login').addClass('border');
	$('#form-cadastro').removeClass('esconder');
	$('.cadastro img').css('transform', 'rotate(90deg)');
	$('.login img').css('transform', 'rotate(0deg)');
})

$('.login').click(function() {
	$('#form').removeClass('esconder').hasClass('esconder');
	$('.cadastro-login').addClass('border');
	$('#form-login').removeClass('esconder');
	$('#form-cadastro').addClass('esconder');
	$('.cadastro img').css('transform', 'rotate(0deg)');
	$('.login img').css('transform', 'rotate(90deg)');
})