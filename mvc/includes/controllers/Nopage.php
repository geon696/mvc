<?php 

class Nopage extends Controller 
{
	public static function make($view)
	{
		$page = $_SERVER['REQUEST_URI'];
		$filetoload = $view;
        require_once( './includes/views/View.php' );
	}
}
?>