<?php
/* Template Name: Homepage */

include_once 'includes.php';
get_header();
?>


<div id="galleria-wrap-home">
	<div id="galleria"></div>
</div>

<script>
var data = [

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php
$images = get_field('images');
$image = $images[0];
?>
	<?php $image_text = array(); ?>
	<?php foreach( $images as $image ): ?>
		 <?php $image_text[] = "{ image :'". $image['sizes']['large']."'}"; ?>
	<?php endforeach; ?>
	<?php echo implode( $image_text, ","); ?>
<?php endwhile; endif;  ?>

];
Galleria.loadTheme('<?php bloginfo( 'template_url' ); ?>/js/vendor/galleria-1.2.8/themes/classic/galleria.classic.min.js');
	Galleria.run('#galleria', {
			dataSource: data,
			thumbnails: false,
			responsive: true,
			autoplay: 4000,
			transitionSpeed: 2000,
			imageTimeout: 3000,
			showImagenav: false,
			showCounter: false,
			transition: 'fade',
			imageCrop: true
		});


$('.home .main-header').imagesLoaded(function() {
	var headerheight = $('.main-header').outerHeight() / 2;
	var galHeight = $(window).height();
	var galWidth = $(window).width();
	var headerTop = galHeight / 2;
	$('.main-header').animate({ 'top': headerTop+'px'}, 600, 'easeInOutCubic');
});


/*
	
$(window).on('resize', function() {
		var headerheight = $('.main-header').outerHeight() / 2;
		var galHeight = $(window).height();
		var galWidth = $(window).width();
		console.log(headerheight, galHeight);
		$('#galleria').animate({'height':galHeight+'px'});
});	
	
*/
	

</script>
<? get_footer() ?>