<?
/* Template Name: custom loop */

?>

<? //get_header() ?>


<?php


$args = array(
	'cat'      => 6,
	'year'     => $current_year,
	'monthnum' => $current_month,
	'order'    => 'ASC'
);

query_posts($args);
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<h2><? the_title(); ?></h2>






<?php endwhile; endif; ?>

<? //get_footer() ?>