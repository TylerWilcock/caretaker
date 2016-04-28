<?php

use \App\Models\User;
use \App\Models\CareRecipient;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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

Route::post('/ct/profile/{ctID}', function(Request $request)
{
    if(Input::get('submitType') == "addRecipient"){ //run query to add care recipient
		User::addCareRecipient(Input::get('ctID'), Input::get('crName'), Input::get('crBirthday'), Input::get('crHomeAddress'), Input::get('crPhoneNumber'), Input::get('crEmergencyContact'), Input::get('crDrContact'), Input::get('crNotes'));
	}
	else if(Input::get('submitType') == "adminDeleteCr"){ //run query to delete care recipient (for admin)
		
	}
	else if(Input::get('submitType') == "deleteCr"){ //run query to delete care recipient (for non-admin)
		
	}
	else{ //run query to edit care recipient

	}
	
    // create a success message
	// $request->session()->put('success', 'Successfully added the Care Recipient!');

    // redirect
    $id = User::find($request->ctID);
    return redirect()->route('profile', ['ctID' => $id]);
    // return Redirect::to('/ct/profile/{ctID}');
});

Route::post('/cr/profile/{crID}', function(Request $request)
{
	$addTeammate = Carerecipient::addCareteammate(Input::get('crID'), Input::get('email'));

	//create a success message
	//$request->session()->put('success', 'Successfully added the Care Teammate!');

	$crID = Carerecipient::find($request->crID);
	return redirect()->route('crprofile', ['crID' => $crID]);
});

Route::post('/cr/medication/{crID}', function(Request $request)
{
	if(Input::get('submitType') == "addMed"){ //run query to add medication
		$addMedication = Carerecipient::addMedication(Input::get('crID'), Input::get('medicationName'), Input::get('dosage'), Input::get('prescribedDate'), Input::get('refillDate'));
	}
	else if(Input::get('submitType') == "deleteMed"){ //run query to delete medication
		$deleteMedication = Carerecipient::deleteMedication(Input::get('deleteID'));
	}
	else{ //run query to edit medication
		$updateMedication = Carerecipient::updateMedication(Input::get('editID'), Input::get('editMedicationName'), Input::get('editDosage'), Input::get('editPrescribedDate'), Input::get('editRefillDate'));
	}	

	//create a success message
	//$request->session()->put('success', 'Successfully added the Care Teammate!');

	$crID = Carerecipient::find($request->crID);
	return redirect()->route('medication', ['crID' => $crID]);
});

Route::post('/cr/messageboard/{crID}', function(Request $request)
{

	Carerecipient::addMessage(Input::get('crID'), Input::get('ctID'), Input::get('userMessage'));

	// return view('messageBoard')->with('crInfo', Carerecipient::find($request->crID))
	// 						   ->with('ctID', User::find($request->ctID))
	// 						   ->with('messages', Carerecipient::getMessages($request->crID));

	$crID = Carerecipient::find($request->crID);
	return redirect()->route('messageboard', ['crID' => $crID]);

});

Route::post('/cr/notes/{crID}', function(Request $request){

	Carerecipient::addNotes(Input::get('crID'), Input::get('ctID'), Input::get('userNote'));

	$crID = Carerecipient::find($request->crID);
	return redirect()->route('notes', ['crID' => $crID]);

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

  	Route::group(['middleware' => ['auth']], function () {

	  	Route::get('/home', 'HomeController@index', ['middleware' => 'auth', function() {

		}]);

		Route::get('/ct/profile/{ctID}', ['as' => 'profile', function(Request $request) {
			return view('ctProfile')->with('caretakerInfo', User::find($request->ctID))
									->with('careRecipientInfo', User::getCareRecipients($request->ctID));
		}]);

		Route::get('/cr/profile/{crID}', ['as' => 'crprofile', function(Request $request) {
			return view('crProfile')->with('crInfo', Carerecipient::find($request->crID))
									->with('careTakersInfo', Carerecipient::getCareTakers($request->crID))
									->with('admin', User::getAdmin($request->crID))
									->with('ctID', User::getID());
		}]);

		Route::get('/cr/calendar/{crID}', function(Request $request) {
			//call a function (or multiple) to get the information to populate the calendar page
			//you can chain ->with('dataLabel', dataStuff) to pass multiple different variables with different labels
			return view('calendar')->with('crInfo', Carerecipient::find($request->crID))
								   ->with('ctID', User::getID());
		});

		Route::get('/cr/messageboard/{crID}', ['as' => 'messageboard', function(Request $request) {
			//call a function (or multiple) to get the information to populate the message board page
			//you can chain ->with('dataLabel', dataStuff) to pass multiple different variables with different labels
			return view('messageBoard')->with('crInfo', Carerecipient::find($request->crID))
									   ->with('ctID', User::getID())
									   ->with('messages', Carerecipient::getMessages($request->crID));
		}]);

		Route::get('/cr/notes/{crID}', ['as' => 'notes', function(Request $request) {
			//call a function (or multiple) to get the information to populate the message board page
			//you can chain ->with('dataLabel', dataStuff) to pass multiple different variables with different labels

			$id = User::find($request->ctID);

			return view('notes')->with('crInfo', Carerecipient::find($request->crID))
								->with('ctID', User::getID())
								->with('notes', Carerecipient::getNotes($request->crID));
								
		}]);

		Route::get('/cr/medication/{crID}', ['as' => 'medication', function(Request $request) {
			//call a function (or multiple) to get the information to populate the message board page
			//you can chain ->with('dataLabel', dataStuff) to pass multiple different variables with different labels
			return view('medication')->with('crInfo', Carerecipient::find($request->crID))
									 ->with('medication', Carerecipient::getMedication($request->crID))
									 ->with('admin', User::getAdmin($request->crID))
									 ->with('ctID', User::getID());
		}]);

	});

	// Route::controller('calendar', 'CalendarController');
});
