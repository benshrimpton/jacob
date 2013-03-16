<?php
/**
 * Template Name: JSON
 *
 * Template for showing BLOG category posts that are using ACF Gallery field.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
header("Content-Type: text/json");
?>
var data [
<?php
global $post;
$myposts = get_posts();
foreach($myposts as $post){
$id = get_the_ID();
$title = get_the_title();
$content = get_the_content();
$images = get_field('images');
$image = $images[0];
?>
{ image:'<?php echo $image['sizes']['large']; ?>'},
<?php } ?>
]


var data = [

<?php
global $post;
$myposts = get_posts();
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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