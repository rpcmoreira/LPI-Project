<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/* The `class SocialAuthController extends Controller` is defining a PHP class called
`SocialAuthController` that extends the `Controller` class. This class is used to handle social
authentication using Google as the provider. It contains two methods: `redirectProvider()` and
`handleCallback()`. The `redirectProvider()` method redirects the user to the Google authentication
page, while the `handleCallback()` method handles the callback from Google after the user has
authenticated. The method checks if the user already exists in the database and logs them in if they
do, otherwise it creates a new user and logs them in. Finally, it redirects the user to the
dashboard page with a success message. */
class SocialAuthController extends Controller
{
    public function redirectProvider(){
        return Socialite::driver('google')->redirect();
    }

    /**
     * This function handles the callback from a Google login and either logs in an existing user or
     * creates a new user and logs them in.
     * 
     * @return This function is returning a redirect to the dashboard route with a success message in
     * the session if the user is successfully authenticated through Google. If there is an exception,
     * it redirects to the login page.
     */
    public function handleCallback(){
        try{
            $user = Socialite::driver('google')->user();
        } catch(\Exception $e){
            return redirect('/login');
        }
    $existingUser = User::where('client_id', $user->id)->first();
    if($existingUser){
        Auth::login($existingUser, true);
    } else{
        // create a new user
        $newUser = User::create([
           'nome' => $user->name,
           'email' => $user->email,
           'tipo_id' => 7,
           'password' => bcrypt('password'),
           'client_id' => $user->id,
           'email_verified_at' => now(),
           ]);
           User::where('client_id', $newUser->client_id)->first();
        Auth::login($newUser, true);
    }
    return redirect()->route('dashboard')->with('status', 'Login Bem Sucedido, Bem Vindo!');

    }

   
}
