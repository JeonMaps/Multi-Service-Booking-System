<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $serviceProviders = ServiceProvider::all();
        $categories = Category::all();

        return view('home', compact('serviceProviders', 'categories'));
    }

    public function serviceProviders()
    {
        $serviceProviders = ServiceProvider::all();
        $categories = Category::all();

        return view('services', compact('serviceProviders', 'categories'));
    }

    // public function filter(Request $request)
    // {
    //     $category = $request->input('category');

    //     if (!$category) {
    //         $serviceProviders = ServiceProvider::all();
    //     } else {
    //         $serviceProviders = ServiceProvider::where('category', $category)->get();
    //     }

    //     $categories = ServiceProvider::pluck('category')->unique();

    //     return view('home', compact('serviceProviders', 'categories', 'category'));
    // }

    public function filter(Request $request)
    {
        $category = $request->input('category');

        if (!$category) {
            $serviceProviders = ServiceProvider::all();
        } else {
            $serviceProviders = ServiceProvider::whereHas('categories', function ($query) use ($category) {
                $query->where('name', $category);
            })->with('categories')->get();
        }

        $categories = Category::all();

        return view('home', compact('serviceProviders', 'categories', 'category'));
    }

    public function services($id)
    {
        $serviceProvider = ServiceProvider::findOrFail($id);

        return view('app.services', compact('serviceProvider'));
    }

    public function checkout()
    {
        return view('app.checkout');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $serviceProviders = ServiceProvider::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhere('location', 'like', '%' . $query . '%')
            ->orWhereHas('categories', function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%');
            })
            ->get();

        $categories = Category::all();

        return view('search', compact('serviceProviders', 'query','categories'));
    }

    public function userChangePassword(){
        return view('user-change-password');
    }

    public function userEditProfile(){
        return view('user-edit-profile');
    }
}
