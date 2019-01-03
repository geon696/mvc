<?php
$route = new Route();

// This is the index page. The first route.
$route->set('', function() {
  Root::make('Root');
});

$route->set('about-us', function() {
  AboutUs::make('AboutUs');
});

$route->set('more',function(){
  More::make('More');
});

$route->set('upload',function(){
  Upload::make('Upload');
});

$route->set('mail',function(){
  Mail::make();
});

$route->set('nopage', function(){
	Nopage::make('Nopage');
});

$route->set('user', function(){
	User::make('User');
});

// This is a route for the User Login / Registration popup.
// Route::set('popups/user-login', function() {
//   popupUserLogin::make('popupUserLogin');
// });
/*
 * This is an example of a dynamic route. In this example,
 * this route would display a users profile page.
*/
// Route::set('user/<1>', function() {
//   UserProfile::make('UserProfile');
// });
