<?php


class Controller {

  public static function make($view) {

    if (Route::isRouteValid()) {
    	$filetoload = $view;
        require_once( './includes/views/View.php' );
        return 1;
    }

  }

}
