<?php

use \App\Models\Caretaker;

use Illuminate\Http\Request;

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

Route::get('/ct/profile/{ctID}/', function(Request $request) {
	return view('ctProfile')->with('caretakerInfo', Caretaker::find($request->ctID));
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
    
    /**
    * Calls login functions at vendor/laravel/framework/src/Illuminate/Routing/Router.php ()
    * Changes to the page a newly registered user is directed to is handled in AuthController
    * HomeController controls what page a user is directed to upon logging in
    **/
    Route::auth();

       /**
	  	* TODO: SHOULD BE /cr/{$crID}/calendar ; should also be protected by authentication and only
	  	* visible to those subscribed to this cr
	  	*
	  	* edit: the middleware now only allows access to this route if the user is logged in
	  	*       if not, the user is directed to the login page
	  	*/
		Route::get('/calendar', ['middleware' => 'auth', function() {
			return view('calendar');
		}]); 	
});
