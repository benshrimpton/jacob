<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
include_once 'includes.php';
get_header(); ?>
<div id="grid">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<?php
		$images = get_field('images');
		$image = $images[0];
		?>
				 
			<?php foreach( $images as $image ): ?>
					<a href="<?php echo $image['sizes']['large']; ?>">
					<img
					alt=""
					src="<?php bloginfo( 'template_url' ); ?>/css/img/loader.gif"
			        data-original="<?php echo $image['sizes']['thumbnail']; ?>"
			        alt=""
			        class="lazy"
			        />
			        </a>
			<?php endforeach; ?>
		
	<?php endwhile; endif;  ?>
	
</div>




<div id="galleria-wrap">

	<div id="toggle-grid">toggle grid</div>

	<div id="galleria">
	</div>
</div>
<div id="counter-wrapper">

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
		 <?php $image_text[] = "{ image :'". $image['sizes']['large'] . "', thumb: '".  $image['sizes']['thumbnail'] ."'}"; ?>
	<?php endforeach; ?>
	<?php echo implode( $image_text, ","); ?>
<?php endwhile; endif;  ?>

];
Galleria.loadTheme('<?php bloginfo( 'template_url' ); ?>/js/vendor/galleria-1.2.9/themes/classic/galleria.classic.min.js');

	var headerheight = $('.main-header').height() + 100;
	var galHeight = $(window).height() - headerheight;
	var galWidth = $(window).width();
	
	$('#galleria').animate({'height':galHeight+'px'}, 100, function() {
		Galleria.run('#galleria', {
		dataSource: '#grid', 
		keepSource: true,
		thumbnails: false,
		transition: 'flash',
		//imagePosition: 'left', 
		extend: function() {
				var gallery = this; // "this" is the gallery instance
			$("a#galleria-next").click(function() {gallery.next();});
			$("a#galleria-prev").click(function() {gallery.prev();});
			this.$('counter').appendTo('#counter-wrapper');
			}
		
		});
	});
	$(window).on('resize', function() {
		var headerheight = $('.main-header').height() + 100;
		var galHeight = $(window).height() - headerheight;
		var galWidth = $(window).width();
		$('#galleria').css({'height':galHeight+'px'});
	});
	//$('#galleria-wrap').width(galWidth);
	
	
</script>

<?php get_footer(); ?>