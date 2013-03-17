<!-- single view -->
<?php

include_once 'includes.php';
get_header();
?>


<div id="galleria-single-wrap">
	<div id="galleria-single"></div>
</div>



<div id="grid">	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<?php
		$images = get_field('image');
		$image = $images[0];
		?>
			<?php foreach( $images as $image ): ?>
					<a href="<?php echo $image['sizes']['large']; ?>">
					<img
					src="<?php echo $image['sizes']['thumbnail']; ?>"
			        data-original="<?php echo $image['sizes']['thumbnail']; ?>"
			        class="lazy"
			        />
			        </a>
			<?php endforeach; ?>
	<?php endwhile; endif;  ?>
</div>

	
<script>
$(document).ready(function() {

  
Galleria.loadTheme('<?php bloginfo( 'template_url' ); ?>/js/vendor/galleria-1.2.9/themes/classic/galleria.classic.min.js');




$('.main-header').imagesLoaded(function() {
		//set height vars
		var winheight = $(window).innerHeight();
		var headheight = $('.main-header').outerHeight() + 60;
		var galHeight = winheight - headheight ;
		var gridTop = winheight + 20;
		
		console.log(winheight, headheight, galHeight)
		
		$('#grid').css({'top': gridTop+'px'});
		
		//animate galleria wrapper then init the galleria
		$('#galleria-single').animate({'height': galHeight+'px'}, 100, function() {
		
			Galleria.run('#galleria-single', {
				autoPlay: 3000,
				transitionSpeed: 600,
				dataSource: '#grid',
				keepSource: true,
				thumbnails: false,
				transition: 'flash',
				extend: function() {
					var gallery = this; // "this" is the gallery instance
					//$("a#galleria-next").click(function() {gallery.next();});
					//$("a#galleria-prev").click(function() {gallery.prev();});
					this.$('counter').appendTo('#counter-wrapper');
				}
			});
			
		});

}); //end imagesLoaded





$('#grid').on('click', 'a', function(e) {

	e.preventDefault();
	$('body, html').animate({scrollTop: 0},300);
	
	var winheight = $(window).height();
	var gridTop = $('.main-header').outerHeight() + 20;
	var gridBottom = $(window).height() + 20;
	
	if( $('#grid').hasClass('shown') ){
		$('#grid').animate({'top':gridBottom+'px'}).removeClass('shown');
	}
	else{
			$('#grid').animate({'top':gridBottom+'px'}, 600).addClass('shown');
	}
		
});



$('#toggle-grid').on('click', function(e) { 

	e.preventDefault();
	var gridTop = $('.main-header').outerHeight() + 20;
	var gridBottom = $(window).height() + 20;
	
	$('body, html').animate({scrollTop: 0}, 50);
	
	if( $('#grid').hasClass('shown') ){
		$('#grid').animate({'top':gridBottom+'px'}, 300, 'jswing').removeClass('shown');
	}
	else{
			$('#grid').animate({'top':gridTop+'px'}, 300, 'jswing').addClass('shown');
	}
});


	
$(window).on('resize', function() {
		var winheight = $(window).innerHeight();
		var headheight = $('.main-header').outerHeight() + 60;
		var galHeight = winheight - headheight ;
		var gridTop = winheight + 20;
	
		$('#galleria-single').animate({'height':galHeight+'px'});
});	



}); //end dom ready
</script>
<? get_footer() ?>