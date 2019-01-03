<?php

require_once( './includes/_Globals.php' );

require_once( './includes/routes/Routes.php' );

function __autoload($class_name) {
	if (file_exists('./includes/classes/'.$class_name.'.php')){
	    require_once './includes/classes/'.$class_name.'.php';
	} 
	else if ('./includes/controllers/'.$class_name.'.php'){
		require_once './includes/controllers/'.$class_name.'.php';
	}
}

$main = new Main();
$main->run();