<?php
class Globals {

  public function getOS() 
  { 

    $user_agent = $_SERVER["HTTP_USER_AGENT"];
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
                            '/windows nt 10/i'      =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );
    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }   
    return $os_platform;
  }


  public function getPage(){
    $uri = $_SERVER['REQUEST_URI'];
    $uri = explode("/",$uri);
    $uri = str_replace("-"," ",$uri[2]);
    if ($uri == "") {
        $uri = "Home";
    }
    return $uri;
  }
}

$globals = new Globals;

$Routes = array();

/*
 * We define the BASEDIR. This is the directory that root directory is stored in.
*/
define( 'BASEDIR', '/mvc/' );
define( 'MY_MAIL', 'bageorge123@hotmail.com' );
define( 'CLIENT_OS', $globals->getOs() );
define( 'PAGE', ucfirst($globals->getPage()) );
