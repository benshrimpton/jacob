<?php 
//this file is for global vars and must be included on every page where the vars are required.


// Create Mobile vars
//use as so if ($isiPad) or not an ipad if($isiPad != 1)
$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
$isiPhone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPhone'); //ipod has same user agent 
$isAndroid = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'Android');


?>