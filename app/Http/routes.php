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
		User::adminDeleteCareRecipient(Input::get('adminDeleteID'));
	}
	else if(Input::get('submitType') == "deleteCr"){ //run query to delete care recipient (for non-admin)
		User::deleteCareRecipient(Input::get('deleteID'), Input::get('ctID'));
	}
	else{ //run query to edit care recipient
		User::editCareRecipient(Input::get('editID'), Input::get('editCrName'), Input::get('editCrBirthday'), Input::get('editCrHomeAddress'), Input::get('editCrPhoneNumber'), Input::get('editCrEmergencyContact'), Input::get('editCrDrContact'), Input::get('editCrNotes'));
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
	if(Input::get('submitType') == "deleteCt"){ //run query to delete a care teammate
		$deleteTeammate = Carerecipient::deleteCareteammate(Input::get('crID'), Input::get('ctID'));
	}
	else{ //run query to add a care teammate
		$addTeammate = Carerecipient::addCareteammate(Input::get('crID'), Input::get('email'));
	}
	

	//create a success message
	//$request->session()->put('success', 'Successfully added the Care Teammate!');

	$crID = Carerecipient::find($request->crID);
	return redirect()->route('crprofile', ['crID' => $crID]);
});

Route::post('/cr/calendar/{crID}', function(Request $request)
{
	if(Input::get('submitType') == "addEvent"){ //run query to add event
		$addEvent = Carerecipient::addEvent(Input::get('addCRID'), Input::get('newTitle'), Input::get('newDescription'), Input::get('newDate'), Input::get('newTime'), Input::get('newRepeatRadioSelection'), Input::get('newLocation'), Input::get('newNotes'));
	}
	else if(Input::get('submitType') == "deleteEvent"){ //run query to delete event
		$deleteEvent = Carerecipient::deleteEvent(Input::get('deleteID'));
	}
	else{ //run query to edit event
		$editEvent = Carerecipient::updateEvent(Input::get('editID'), Input::get('editTitle'), Input::get('editDescription'), Input::get('editDate'), Input::get('editTime'), Input::get('editRepeatRadioSelection'), Input::get('editLocation'), Input::get('editNotes'));
	}	

	//create a success message
	//$request->session()->put('success', 'Successfully added the Care Teammate!');

	$crID = Carerecipient::find($request->crID);
	return redirect()->route('calendar', ['crID' => $crID]);
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
	if(Input::get('submitType') == "addMessage"){ //run query to add message
		Carerecipient::addMessage(Input::get('crID'), Input::get('ctID'), Input::get('userMessage'));
	}
	else if(Input::get('submitType') == "deleteMessage"){ //run query to delete message
		Carerecipient::deleteMessage(Input::get('deleteID'));
	}
	else{ //run query to edit message
		Carerecipient::editMessage(Input::get('editID'), Input::get('editMessage'));
	}

	// return view('messageBoard')->with('crInfo', Carerecipient::find($request->crID))
	// 						   ->with('ctID', User::find($request->ctID))
	// 						   ->with('messages', Carerecipient::getMessages($request->crID));

	$crID = Carerecipient::find($request->crID);
	return redirect()->route('messageboard', ['crID' => $crID]);

});

Route::post('/cr/notes/{crID}', function(Request $request){

	if(Input::get('submitType') == "addNote"){ //run query to add note
		Carerecipient::addNotes(Input::get('crID'), Input::get('ctID'), Input::get('userNote'));
	}
	else if(Input::get('submitType') == "deleteNote"){ //run query to delete note
		Carerecipient::deleteNote(Input::get('deleteID'));
	}
	else{ //run query to edit message
		Carerecipient::editNote(Input::get('editID'), Input::get('editNote'));
	}

	

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
    * A user should not be able to view the main caretaker index if they are logged in
    * This route will redirect logged-in users to their caretaker profile when '/' is 
    * entered into the url. For users who are not logged in, the index views will be made
    */
    Route::get('/', ['as' => 'index', function(Request $request) {
    	if(Auth::check()){
    		return redirect('/ct/profile/'.User::getID());
    	}else{
    		//a user is not authenticated, route to the main index view
    		return view('index');
    	}
	}]);

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

		Route::get('/cr/calendar/{crID}', ['as' => 'calendar', function(Request $request) {
			//call a function (or multiple) to get the information to populate the calendar page
			//you can chain ->with('dataLabel', dataStuff) to pass multiple different variables with different labels
			return view('calendar')->with('crInfo', Carerecipient::find($request->crID))
								   ->with('calendarEvents', Carerecipient::getEvents($request->crID))
								   ->with('admin', User::getAdmin($request->crID))
								   ->with('ctID', User::getID());
		}]);

		Route::get('/cr/messageboard/{crID}', ['as' => 'messageboard', function(Request $request) {
			//call a function (or multiple) to get the information to populate the message board page
			//you can chain ->with('dataLabel', dataStuff) to pass multiple different variables with different labels
			return view('messageBoard')->with('crInfo', Carerecipient::find($request->crID))
									   ->with('ctID', User::getID())
									   ->with('admin', User::getAdmin($request->crID))
									   ->with('messages', Carerecipient::getMessages($request->crID));
		}]);

		Route::get('/cr/notes/{crID}', ['as' => 'notes', function(Request $request) {
			//call a function (or multiple) to get the information to populate the message board page
			//you can chain ->with('dataLabel', dataStuff) to pass multiple different variables with different labels

			$id = User::find($request->ctID);

			return view('notes')->with('crInfo', Carerecipient::find($request->crID))
								->with('ctID', User::getID())
								->with('admin', User::getAdmin($request->crID))
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
