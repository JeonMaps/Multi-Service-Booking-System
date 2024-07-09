<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
        // return Socialite::driver('google')->redirect([
        //     'redirect_uri' => 'http://bookly.com.ph/auth/google/callback'
        // ]);
    }
    
    public function handleCallback()
    {
        try{
            $user = Socialite::driver('google')->user();
        } catch(\Exception $e){
            return redirect('/login');
        }

        //check if they're an existing user
        
        $existingUser = User::where('google_id', $user->id)->first();

        if($existingUser){
            Auth::login($existingUser, true);
        }

        else{
            //creates new user
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => bcrypt(Str::random(24))
            ]);
            Auth::login($newUser, true);
        }
        return redirect('/home');
    }
}
