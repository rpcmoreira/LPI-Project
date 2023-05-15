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
        return redirect()->route('adminPage')->with('adicionado', 'Estado adicionado com sucesso');
    }

    public function removerEstado(Request $request){
        DB::table('estado')->where('id', $request->id)->delete();
        return redirect()->route('adminPage')->with('aviso', 'Estado apagado com sucesso');
    }

    public function editarEstado(Request $request){
        $estado = DB::table('estado')->where('id', $request->id)->first();
        return view('admin.editEstado',  ['estado' => $estado]);
    }

    public function editEstado(Request $request){
        DB::table('estado')->where('id', $request->id)->update(['estado' => $request->estado]);
        return redirect()->route('adminPage')->with('adicionado', 'Estado editado com sucesso');
    }

    public function adicionarArea(Request $request){
        DB::table('area')->insert([
            'nome' => $request->area,
        ]);
        return redirect()->route('adminPage')->with('adicionado', 'Área adicionada com sucesso');
    }

    public function removerArea(Request $request){
        DB::table('area')->where('id', $request->id)->delete();
        return redirect()->route('adminPage')->with('aviso', 'Área apagada com sucesso');
    }

    public function editarArea(Request $request){
        $area = DB::table('area')->where('id', $request->id)->first();
        return view('admin.editArea',  ['area' => $area]);
    }

    public function editArea(Request $request){
        DB::table('area')->where('id', $request->id)->update(['nome' => $request->area]);
        return redirect()->route('adminPage')->with('adicionado', 'Área editada com sucesso');
    }

    public function adicionarTipo(Request $request){
        DB::table('tipo')->insert([
            'nome' => $request->tipo,
        ]);
        return redirect()->route('adminPage')->with('adicionado', 'Área adicionada com sucesso');
    }

    public function removerTipo(Request $request){
        DB::table('tipo')->where('id', $request->id)->delete();
        return redirect()->route('adminPage')->with('aviso', 'Área apagada com sucesso');
    }

    public function editarTipo(Request $request){
        $tipo = DB::table('tipo')->where('id', $request->id)->first();
        return view('admin.editTipo',  ['tipo' => $tipo]);
    }

    public function editTipo(Request $request){
        DB::table('tipo')->where('id', $request->id)->update(['nome' => $request->area]);
        return redirect()->route('adminPage')->with('adicionado', 'Área editada com sucesso');
    }

    public function adicionarEstudo(Request $request){
        DB::table('estudos')->insert([
            'nome' => $request->estudo,
        ]);
        return redirect()->route('adminPage')->with('adicionado', 'Estudo adicionado com sucesso');
    }

    public function removerEstudo(Request $request){
        DB::table('estudos')->where('id', $request->id)->delete();
        return redirect()->route('adminPage')->with('aviso', 'Estudo apagado com sucesso');
    }

    public function editarEstudo(Request $request){
        $estudo = DB::table('estudos')->where('id', $request->id)->first();
        return view('admin.editEstudo',  ['estudo' => $estudo]);
    }

    public function editEstudo(Request $request){
        DB::table('estudos')->where('id', $request->id)->update(['nome' => $request->estudo]);
        return redirect()->route('adminPage')->with('adicionado', 'Estudo editado com sucesso');
    }

    public function removerUser(Request $request){
        DB::table('users')->where('id', $request->id)->delete();
        return redirect()->route('adminPage')->with('aviso', 'User apagado com sucesso');
    }

    public function editarUser(Request $request){
        $user = DB::table('users')->where('id', $request->id)->first();
        return view('admin.editUser',  ['user' => $user]);
    }

    public function editUser(Request $request){
        DB::table('users')->where('id', $request->id)->update(['tipo_id' => $request->tipo]);
        return redirect()->route('adminPage')->with('adicionado', 'User editado com sucesso');
    }
}
