<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Select2AutocompleteController extends Controller
{
    public function layout()
    {
        return view('q251');
    }
    public function dataAjax(Request $request){
        $data = [];
        if ($request->has('q')) {

            $search = $request->q;

            $data =  DB::table('users')->whereIn('users.tipo_id', [8])->where('users.nome', 'LIKE', '%' . $search . '%')->get();
        }

        return response()->json($data);
    }
}
