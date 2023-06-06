<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

/* `class GoogleController extends Controller` is defining a PHP class called `GoogleController` that
extends the `Controller` class. This means that the `GoogleController` class inherits all the
properties and methods of the `Controller` class and can also define its own properties and methods. */
class GoogleController extends Controller
{
    
    /**
     * This function redirects the user to Google's login page using the Socialite package in PHP.
     * 
     * @return a redirect to the Google login page using the Socialite package.
     */
    public function loginWithGoogle(){
        return Socialite::driver('google')->redirect();
    }
}