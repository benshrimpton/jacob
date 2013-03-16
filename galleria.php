<?php
/**
 * Template Name: Galleria
 *
 * Tempalte for showign Galleria portoflios that are usign ACF Gallery field.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
include_once 'includes.php';
get_header(); ?>

<?php
if( $isiPad != 1 && $isiPhone ! = 1 && $isAndroid) {
	echo '<h1>not an ipad, iphone or an Android</h1>';
}
?>


<h1><?php the_title(); ?></h1>


<div id="galleria-wrap">
	<div id="galleria"></div>
</div>

<div class="clear"></div>


<script>
$(function(){

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
		imagePosition: 'top left',
		//maxScaleRatio: 1,
		showImagenav: false, //hides nav arrows
		thumbnails:true,
		swipe:true,
		responsive: true
});

	     
	
});//end dom ready
</script>

<?php get_footer(); ?>