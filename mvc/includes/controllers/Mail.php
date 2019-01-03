<?php 

class Mail extends Controller {

	public static function make($view = null) {
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'more') != false){
		    if (Route::isRouteValid()) {
		        require_once( './modules/mail.php' );
		        return 1;
		    }
		}
		else {
			die('Invalid Route');
		}

	}
}
?>