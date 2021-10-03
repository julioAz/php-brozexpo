$(document).ready(function () {
	$.scrollSuaveAncorasMobile();
	$.headerFixed ();
});

$.scrollSuaveAncorasMobile = function() {
	$('.navbar-nav a').click(function(e) {
    e.preventDefault()

		if($(this).attr('href')) {
			let id = $(this).attr('href')
			let container = $(id).offset().top - 120
			$('html, body').animate({
					scrollTop: container
			},500)
		}
	});
}

$.headerFixed = function(){
	let posicaoPreviaScroll

	$(window).scroll(function(){

	let currentScrollPosition=$(window).scrollTop() + $(window).height()
	let scroll = $(window).scrollTop();

	if (scroll >= 170) {
			$('header').addClass('header-fixed')
		}else{
			$('header').removeClass('header-fixed')
		}
	}
)}