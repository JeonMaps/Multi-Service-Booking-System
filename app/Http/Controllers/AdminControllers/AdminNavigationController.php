<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminNavigationController extends Controller
{
    public function index()
    {
        // $services = Service::all()->where('id','LIKE','1');
        $services = DB::table('services')
                 ->select('category', DB::raw('count(*) as total'))
                 ->groupBy('category')
                 ->orderBy('total','desc')
                 ->get();
        return view('admin.home', compact('services'));
    }

    public function markAsRead(Request $request)
    {
        auth()->user()->unreadNotifications->markAsRead();

        return response()->json([
            'success' => true,
            'unreadCount' => auth()->user()->unreadNotifications->count()
        ]);
    }

    public function viewProfile()
    {
        return view('admin.profile-features.users-profile');
    }

    public function viewHelp()
    {
        return view('admin.profile-features.help');
    }
}
