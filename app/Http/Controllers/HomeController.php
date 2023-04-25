<?php

namespace App\Http\Controllers;

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
use \App\Models\projeto;
use App\Models\Tipo;

class ProjectController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOME;
   
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('create');
    }

    public function account()
    {
        $user = Auth::user();
        $data = Tipo::where('id', $user->id)->get();
        return view('adminHome', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(projeto $projeto)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(projeto $projeto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, projeto $projeto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remove_projeto(Request $request)
    {
        $projeto = projeto::where('id', $request->id)->first();
        return view('remove', ['projeto' => $projeto]);
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
    public function projetoHome()
    {
        return view('projeto');
    }


}
