<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the id=main div and all content
* after.  Calls sidebar-footer.php for bottom widgets.
*
* @package WordPress
* @subpackage Boilerplate
* @since Boilerplate 1.0
*/
?>
</section><!-- .content -->
<footer role="contentinfo" class="main-footer clear">



<ul class="social mobile-no-float">
<li><a href="" class="mobile-no-float" target="_blank" title="Twitter">Twitter</a></li>
<li><a href="" class="mobile-no-float" target="_blank" title="Facebook">Facebook</a></li>
<li><a href="" class="mobile-no-float" target="_blank" title="Pinterest">Pintrest</a></li>
</ul>

<div class="footer-credits mobile-no-float">
&copy; <?php the_time('Y'); ?> | <?php bloginfo( 'title' ); ?> | website by <a href="http://blackandblackcreative.com" target="_blank" title="Website by Black &amp; Black Creative">Black &amp; Black Creative</a>
</div>

</footer><!-- footer -->
<?php
/* Always have wp_footer() just before the closing </body>
* tag of your theme, or you will break many plugins, which
* generally use this hook to reference JavaScript files.
*/
wp_footer();
?>





<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
        
</body>
</html>