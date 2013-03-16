<!-- single view page -->

<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
include_once 'includes.php';
get_header(); ?>




<?php
// This is  just a debug block
// remove for production
if( $isiPad != 1) {
//	echo '<h1 style="font-size:30px; float: left">not an ipad / </h1>';
}
if( $isiPhone != 1) {
//	echo '<h1 style="font-size:30px; float: left">not an iphone / </h1>';
}
if( $isiAndroid != 1) {
//	echo '<h1 style="font-size:30px; float: left">not an Android</h1>';
}
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>

<? //whats gonna go here? ?>

<?php endif; ?>
<?php endwhile; endif;  ?>

<div id="galleria-wrap">
	<div id="galleria"></div>
</div>

<div class="clear"></div>


<script>
$(function(){


<? if( $isiPhone || $isiAndroid):?>

var data = [

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php
$images = get_field('images');
$image = $images[0];
?>
	<?php $image_text = array(); ?>
		<?php foreach( $images as $image ): ?>
			 <?php $image_text[] = "{ image :'". $image['sizes']['medium'] . "', thumb: '".  $image['sizes']['thumbnail'] ."'}"; ?>
		<?php endforeach; ?>
	<?php echo implode( $image_text, ","); ?>
<?php endwhile; endif;  ?>

];


//use two set ups for mobile / desktop

var headerHeight = $('.main-header').height();
var winHeight = $(window).height() + 60; //where does 60 come from???
var galleriaHeight = winHeight - headerHeight;

Galleria.run('#galleria',{
		dataSource: data,
		height: galleriaHeight,
	   	autoplay: 2000 ,// will move forward every 2 seconds
	   	initialTransition: 'fade',
	   	transition: 'flash',
	   	touchTransition: 'fadeslide',
		transitionSpeed: 600,
		//imageCrop: true,
		imageTimeout: 6000,
		debug: false,
		showInfo: false,
		preload: 5,
		showCounter: false,
		showInfo: false,
		//imageMargin: 70,
		imagePosition: 'center',
		//maxScaleRatio: 1,
		showImagenav: false, //hides nav arrows
		thumbnails: true,
		swipe:true,
		responsive: true
});

<? else: ?>


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


Galleria.run('#galleria',{
		dataSource: data,
	   	autoplay: 2000 ,// will move forward every 2 seconds
	   	initialTransition: 'fade',
		transitionSpeed: 600,
		//imageCrop: true,
		transition: 'flash',
		imageTimeout: 6000,
		debug: false,
		showInfo: false,
		preload: 5,
		showCounter: false,
		showInfo: false,
		//imageMargin: 70,
		imagePosition: 'center',
		//maxScaleRatio: 1,
		showImagenav: false, //hides nav arrows
		thumbnails: true,
		swipe:true,
		responsive: true
});
<? endif; ?>

	


	     
	
});//end dom ready
</script>

<?php get_footer(); ?>