<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    private static $vars;

    public function postAddEvent()
    {
        if(Response::ajax())
        {
            if(Input::get('type') == 'addEvent')
            {
                return CalendarModel::addEvent(Input::get('title'),
                                               Input::get('description'),
                                               Input::get('date'),
                                               Input::get('time'),
                                               Input::get('repeat'),
                                               Input::get('location'),
                                               Input::get('notes'));
            }
        }
    }
    
}