/*
Author: Ben Shrimpton / Black & Black Creative
date: March 2013
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

//ppup the overlay and add the nextand prev items into the container 
$('.thumb img').on('click', function() { 

	var source = $( this).attr('src');
	var dataLarge = $( this).data('large');
	var nextImg = $(this).parent().next('.thumb').clone();
	var prevImg = $(this).parent().prev('.thumb').clone();
	console.log(dataLarge, source, nextImg);
	
	if($(this).parent().hasClass('large')){
			$(this).parent().removeClass('large');
			$(this).attr('src', source);
	/*
		$('.thumb.next').remove();
			$('.thumb.prev').remove();
*/
	}
	else{
		//var nextImg = $(this).next('.thumb');
		$(this).parent().addClass('large');
		$(this).attr('src', dataLarge);
		/* $(this).parent().append(nextImg, prevImg); */
		nextImg.addClass('next');
		prevImg.addClass('prev');
	}

});

//a button to close the overlay also
 $('.thumb.large .thumb-close').live('click', function() {
 	$(this).parent().removeClass('large');
 	$(this).parent().find('.next').remove();
 	$(this).parent().find('.prev').remove();
 });
 
 
$('.thumb.next').live('click', function() {
 alert("next");

/*
var centereImage = $(this).prev('.thumb');
console.log(centereImage ).clone();
$(this).parent().append(centereImage);
*/


});

/*
$('.thumb.prev').live('click', function() {
var $this = $(this);
	$(this).parent().find('img:first').css({'border':'solid 1px red'}).animate({'margin-top':'-3000px'}, 600, function() {
	$this.animate({
		'left':'50%',
		'top':'0',
		'height':'100%'
	})	
 });
}); 
*/



	
$(window).on('scroll', function() {
	if(!iPhoneAgent){ 
		var scrollDistance  = $(this).scrollTop();
		console.log(scrollDistance);
		if (scrollDistance > 200) {
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


$('.thumb').hover(function() {

var thetitle = $(this).find('.data h3').text();
	//console.log(thetitle);
		$('#look-title').text(thetitle);
		}, function() {
		var emptytext = "";
		$('#look-title').text(emptytext);
});


///we do this so when the user mouse leaves the menu item
// before the page goes to new URL
// the class will stick.
$('.main-nav ul li').click(function() { 
	$('.main-nav ul li').removeClass('current_page_item')
	$(this).addClass('current_page_item');
});


/*
$('.main-nav ul li').hover(function() { 
		$('.main-nav ul li').removeClass('current_page_item')
		$(this).addClass('current_page_item');
	}, function() {
		$(this).removeClass('current_page_item');
});
*/

}); //end dom ready

