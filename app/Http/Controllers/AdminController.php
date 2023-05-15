<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminController extends Controller
{
    public function adminPage(){
            return view('admin.adminDash');
    }

    public function estadosAdmin(){
        return view('admin.estados');
    }

    public function adicionarEstado(Request $request){
        dd($request);
    }

    public function removerEstado(Request $request){
        dd($request);
    }

    public function editarEstado(Request $request){
        dd($request);
    }
}
