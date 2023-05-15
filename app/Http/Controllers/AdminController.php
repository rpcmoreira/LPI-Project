<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminController extends Controller
{
    public function adminPage(){
            return view('admin.adminDash');
    }

    public function adicionarEstado(Request $request){
        DB::table('estado')->insert([
            'estado' => $request->estado,
        ]);
        return redirect()->route('adminPage')->with('adicionado', 'Estado foi adicionado com sucesso');
    }

    public function removerEstado(Request $request){
        DB::table('estado')->where('id', $request->id)->delete();
        return redirect()->route('adminPage')->with('aviso', 'Estado foi apagado com sucesso');
    }

    public function editarEstado(Request $request){
        $estado = DB::table('estado')->where('id', $request->id)->first();
        return view('admin.editEstado',  ['estado' => $estado]);
    }

    public function editEstado(Request $request){
        DB::table('estado')->where('id', $request->id)->update(['estado' => $request->estado]);
        return redirect()->route('adminPage')->with('adicionado', 'Estado foi editado com sucesso');
    }
}
