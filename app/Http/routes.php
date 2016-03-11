<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    // Calls login functions at vendor/laravel/framework/src/Illuminate/Routing/Router.php ()
    Route::auth();

    /**
  	* TODO: SHOULD BE /cr/{$crID}/calendar ; should also be protected by authentication and only
  	* visible to those subscribed to this cr
  	*/
	Route::get('/calendar', function() {
		return view('calendar');
	});

    Route::get('/home', 'HomeController@index');
});
