/*
Author: Ben Shrimpton / Black & Black Creative
*/

/* Global Mobile Vars */ 
/* usage: if(iPadAgent || AndroidAgent) */
var iPadAgent = navigator.userAgent.match(/iPad/i) != null;
var iPhoneAgent = navigator.userAgent.match(/iPhone/i) != null;
var AndroidAgent = navigator.userAgent.match(/Android/i) != null;
var webOSAgent = navigator.userAgent.match(/webOS/i) != null;

$(function () {


//$('.home').addClass('white')
$('.general').addClass('shown');


$('#toggle-nav').on('click', function () {

	$('.main-nav').slideToggle(150).toggleClass('active');
	if( $('#toggle-nav').hasClass('active') ){
		$('#toggle-nav').html("+");
	}
	else {
		$('#toggle-nav').txt('&#9776;');
	}
});




$("img.lazy").lazyload({
	effect : "fadeIn"
});


$('.main-nav a').on('click', function(e) { 
	e.preventDefault();
	var theUrl = $(this).attr('href');
	$('.main').fadeOut(300, function() {
		window.location=theUrl;
	});
});
 
$('.thumb').on('click', function() { 
	var source = $('img', this).attr('src');
	var dataLarge = $('img', this).data('large');
	console.log(dataLarge, source)
	if($(this).hasClass('large')){
			$(this).toggleClass('large');
			$('img', this).attr('src', source)
	}
	else{
		$(this).toggleClass('large');
		$('img', this).attr('src', dataLarge)
	}

});
 
  
	
$(window).on('scroll', function() {
	if(!iPhoneAgent){ 
		var scrollDistance  = $(this).scrollTop();
		console.log(scrollDistance);
		if (scrollDistance > 100) {
	 	$('.main-header').addClass('fixed');
		}
		else {
	 	$('.main-header').removeClass('fixed');
	}
}	
});

			
$('.main-header .clear').on('click', function() { 
	$('.main-nav').toggle(300, 'easeinOutCubic');
});



}); //end dom ready

