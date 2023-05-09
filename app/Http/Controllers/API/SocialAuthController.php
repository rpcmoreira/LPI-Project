<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
   /**
    * Redirect user to the Google authentication page
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectProvider(){
        return Socialite::driver('google')->redirect();
    }

    /**
    * Obtain the user information from Google
    *
    * @return \Illuminate\Http\Response
    */
    public function handleCallback(){
        try{
            $user = Socialite::driver('google')->user();
        } catch(\Exception $e){
            return redirect('/login');
        }
         // check if there is an existing user
    // $existingUser = User::where('email', $user->email)->first();
    $existingUser = User::where('client_id', $user->id)->first();
    //dd($user);
    if($existingUser){
        Auth::login($existingUser, true);
    } else{
        // create a new user
        $newUser = User::create([
           'nome' => $user->name,
           'email' => $user->email,
           'tipo_id' => 6,
           'password' => bcrypt('password'),
           'client_id' => $user->id,
           'email_verified_at' => now(),
           ]);
           User::where('client_id', $newUser->client_id)->first();
        Auth::login($newUser, true);
    }
    return redirect()->to('/logged');

    }

   
}
