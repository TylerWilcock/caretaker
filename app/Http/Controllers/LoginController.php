<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LoginController extends BaseController
{
    public static function verifyLogin($username, $password) {
    	$username = Input::get('username');
    	$password = Input::get('password');
    	return $username + $password;
    	return LoginModel::verifyLogin($username, $password);
    }
}
