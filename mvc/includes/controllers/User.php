<?php 
	class User extends Controller
	{
		public static function make($view) {
			$userStatus = self::checkUserStatus();
			$status = '';
			if ($userStatus == 0) {
				$status = 'Login';
			}
			if (Route::isRouteValid()) {
				$filetoload = $view.$status;
				require_once( './includes/views/View.php' );
				return 1;
			}

		}

		public static function checkUserStatus(){
			//TODO : implement user login status with cookies and stuff
			//will return 1 for logged in 
			//will return 0 for not logged in
			
			return 0;
		}
	}

	
?>