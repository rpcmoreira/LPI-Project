<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\projeto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class projetoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function home(){
        return view('home');
    }

    public function support()
    {
        return view('support');
    }

    public function about()
    {
        return view('about');
    }

    
 /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function destroy(projeto $projeto)
    {
        $projeto = projeto::where('id', $projeto->id)->pluck('id'); // Seleciona o ID
        projeto::whereIn('nome', $projeto->nome)->delete();
        projeto::whereIn('data_id', $projeto->data_id)->delete();
        projeto::whereIn('instituicao_id', $projeto->instituicao_id)->delete();
        projeto::where('area_id', $projeto->area_id)->delete();
        projeto::where('curso_id', $projeto->curso_id)->delete();
        projeto::where('tipo_id', $projeto->tipo_id)->delete();
        $projeto->delete();
    }
    
}
