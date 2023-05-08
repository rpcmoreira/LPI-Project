<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Response;
use vendor\autoload\php;
// This is a public sample test API key.
// Don’t submit any personally identifiable information in requests made with this key.
// Sign in to see your own test API key embedded in code samples.
\Stripe\Stripe::setApiKey('sk_test_QUXcoU3BnbZXp6IMVi7BkW8s');

use App\Models\Photo;
//require 'vendor/autoload.php';
// This is a public sample test API key.
// Don’t submit any personally identifiable information in requests made with this key.
// Sign in to see your own test API key embedded in code samples.
//\Stripe\Stripe::setApiKey('sk_test_QUXcoU3BnbZXp6IMVi7BkW8s');

class HomeController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function account()
    {
        $u = Auth::user();
        return view('dashboard');
    }

    public function delete()
    {
        $user = Auth::user();
        return view('delete', ['user' => $user]);
    }

    public function erase()
    {
        $u = Auth::user();
        $email = $u->email;
        $data = User::where('email', $email)->get();

        $user = User::find(Auth::user()->id);
        Auth::logout();
        $user->delete();

        if (count($data) == 1) {
            return redirect()->route('first')->with('global', 'Your account has been deleted!');
        }
    }
}
