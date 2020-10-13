<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteAuthController extends Controller
{
    public function redirectToProviderFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallbackFacebook(Request $request)
    {

        $facebook = Socialite::driver('facebook')->user();
        $user = User::where('email', $facebook->email?$facebook->email:$facebook->id)->first();
        if(!$user){
            $user = User::create([
                'name' => $facebook->name,
                'email' => $facebook->email?$facebook->email:$facebook->id,
                'password' => bcrypt('1234')
            ]);
        }
        Auth::login($user);
        return redirect('/home');;
    }

    public function redirectToProviderGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallbackGithub()
    {
        $github = Socialite::driver('github')->user();
        //dd($github);
        $user = User::where('email', $github->email?$github->email:$github->id)->first();
        if(!$user){
            $user = User::create([
                'name' => $github->name,
                'email' => $github->email?$github->email:$github->id,
                'password' => bcrypt('123456')
            ]);
        }
        Auth::login($user);
        return redirect('/home');
    }


    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackGoogle()
    {
        $google = Socialite::driver('google')->user();
        dd($google);
    }
}
