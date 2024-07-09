<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\LoginController as BaseLoginController;
use App\Providers\RouteServiceProvider;

class AdminLoginController extends BaseLoginController
{
    protected $redirectTo = '/admin/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials['role'] = 'Admin';
        return $credentials;
    }
}
