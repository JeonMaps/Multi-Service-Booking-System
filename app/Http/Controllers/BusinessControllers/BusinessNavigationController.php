<?php

namespace App\Http\Controllers\BusinessControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BusinessNavigationController extends Controller
{
    public function index()
    {
        return view('business.home');
    }

    public function viewProfile()
    {
        return view('business.profile-features.users-profile');
    }
    
    public function viewHelp()
    {
        return view('business.profile-features.help');
    }
}
