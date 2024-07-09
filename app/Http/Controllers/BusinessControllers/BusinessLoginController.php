<?php

namespace App\Http\Controllers\BusinessControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController as BaseLoginController;
use App\Providers\RouteServiceProvider;

class BusinessLoginController extends BaseLoginController
{
    protected $redirectTo = RouteServiceProvider::BUSINESSHOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('business.auth.login');
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials['role'] = 'Service Provider';
        return $credentials;
    }
}
