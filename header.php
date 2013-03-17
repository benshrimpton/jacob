<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="initial-scale=1, width=device-width, user-scalable=no, maximum-scale=1.0">
<title><?php
/*
* Print the <title> tag based on what is being viewed.
* We filter the output of wp_title() a bit -- see
* boilerplate_filter_wp_title() in functions.php.
*/
wp_title( '|', true, 'right' );
include_once 'includes.php';
?></title>

<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<meta http-equiv="cleartype" content="on">
<meta property="og:title" content="<?php bloginfo( 'name' ); ?>">
<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
<meta property="og:description" content="Description will be here">
<meta property="og:type" content="website">
<meta property="og:image" content="<!-- path to image -->">
<meta property="og:url" content="<?php bloginfo( 'template_url' ); ?>">

<!-- jQuery scripts 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.js"><\/script>')</script>
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

<!-- plugin files for dev - put into one file fro production -->
<script src="<?php bloginfo( 'template_url' ); ?>/js/vendor/galleria-1.2.8/galleria-1.2.8.min.js"></script>


<!--
<script src="<?php bloginfo( 'template_url' ); ?>/js/vendor/royalslider/jquery.royalslider.min.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/vendor/jquery.masonry.min.js"></script>
-->

<!-- main site files for production -->
<script src="<?php bloginfo( 'template_url' ); ?>/js/plugins.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/main.js"></script>




<?php
/* We add some JavaScript to pages with the comment form
* to support sites with threaded comments (when in use).
*/
if ( is_singular() && get_option( 'thread_comments' ) )
wp_enqueue_script( 'comment-reply' );

/* Always have wp_head() just before the closing </head>
* tag of your theme, or you will break many plugins, which
* generally use this hook to add elements to <head> such
* as styles, scripts, and meta tags.
*/
wp_head();
?>


</head>
<body <?php body_class(); ?>>

<header role="banner" class="main-header">

<!-- <a href="#" id="toggle-nav">&#9776;</a> -->
	<!-- <a href="#" id="toggle-grid">&#9776;</a> -->

<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
<?php if(is_front_page() ) : ?>
	<img src="<?php bloginfo( 'template_url' ); ?>/css/img/logo-small.png" alt="Sarah Cobb Logo" id="logo"/>
<? else :  ?>
	<img src="<?php bloginfo( 'template_url' ); ?>/css/img/logo-small.png" alt="Sarah Cobb Logo" id="logo"/>
<?php endif; ?>
</a>


<nav id="access" role="navigation" class="main-nav">
<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
</nav><!-- #access -->
	<div class="clear"></div>
</header>



<section class="main" role="main">