<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first-name' => 'required|max:255',
            'last-name' => 'required|max:255',
            'birthday' => 'required|date_format:dd/mm/yyyy',
            'address' => 'required|max:255',
            'phone' => 'required|numeric|digits_between:9,10',
            'emergency-phone' =>'numeric|digits_between:9,10',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        if($data['emergency-phone'])
        {
            $data['emergency-phone'] = $data['phone'];
        }

        $data['birthday'] = date(Y/m/d, $data['birthday']);

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'birthday' => $data['birthday'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'emergency-phone' => $data['emergency-phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    // This function displays our templates login form instead of 
    // laravels defualt views/auth/login
    public function showLoginForm()
    {
        return view('loginTemplate');
    }

    public function showRegistrationForm()
    {
        return view('registerTemplate');
    }
}
