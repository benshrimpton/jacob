<?php
/* Template Name: Homepage2 */

include_once 'includes.php';
get_header();
?>

<? /*
	<?php query_posts('category_name=collections&posts_per_page=10'); ?>
	<?php if ( have_posts() ) : the_post(); ?>
		<h2><? the_title(); ?></h2>
		<?php
		$images = get_field('image');
		$image = $images[0];
		?>
		<?php foreach( $images as $image ): ?>
				<img
				src="<?php echo $image['sizes']['thumbnail']; ?>"
				/>
		<?php endforeach; ?>
	<?php endif;  ?>*/ ?>
	

<div id="galleria-wrap-home">
	<div id="galleria"></div>
</div>


<div id="grid"></div>
<script>


var data = [

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php
$images = get_field('images');
$image = $images[0];
?>
	<?php $image_text = array(); ?>
	<?php foreach( $images as $image ): ?>
		 <?php $image_text[] = "{ image :'". $image['sizes']['large'] . "', thumb: '".  $image['sizes']['thumbnail'] ."'}"; ?>
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
	$('.home .main-header').delay(1000).animate({ 'margin-top':'-'+headerheight+'px', 'top':'50%'}, 2000, 'easeInOutCubic');
	
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