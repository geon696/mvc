<?php

class UserProfile  extends Controller{

  public static function getUserDetails($username) {
    print_r(DB::select('SELECT * FROM users WHERE username=:username', [':username'=>$username]));
  }

}
