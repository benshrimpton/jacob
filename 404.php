<?php
/**
<<<<<<< HEAD
 * The 404 template is found here.
=======
sdfghjkjhgfdfghjhgf yjh ghjhjskajgs akh hjskah 
>>>>>>> 4a110ac32c6ae9e5b263d14aec9044a3d0a0c082
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
include_once 'includes.php';

get_header(); ?>
			<article id="post-0" class="post error404 not-found" role="main">
				<h1><?php _e( 'Not Found', 'boilerplate' ); ?></h1>
				<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'boilerplate' ); ?></p>
				<?php get_search_form(); ?>
				<script>
					// focus on search field after it has loaded
					document.getElementById('s') && document.getElementById('s').focus();
				</script>
			</article>
<?php get_footer(); ?>
