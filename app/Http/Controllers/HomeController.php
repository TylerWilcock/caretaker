<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;

class HomeController extends Controller
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

    // Where user is taken directly after login
    public function index()
    {
        $id = Auth::user()->id;
        $redirectString = '/ct/profile/' + $id;

        return redirect($redirectString);
    }
}
