<?php
/**
 * Template Name: Royal Slider
 *
 * Tempalte for showign Royal Slider portoflios that are usign ACF Gallery field.
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


<h1><?php the_title(); ?></h1>
				
				
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php
	$images = get_field('images');
	$image = $images[0];
	?>
			 
		<?php foreach( $images as $image ): ?>
			 
			<a href="<?php echo $image['sizes']['large']; ?>" class="rsImg"/>
		      
		<?php endforeach; ?>
	
	<?php endwhile; endif;  ?>



<?php get_footer(); ?>