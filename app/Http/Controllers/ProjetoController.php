<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Response;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
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
    public function destroy(projeto $projeto)
    {
        //
    }

    public function storeForm(Request $request)
    {
        //$user = Auth::user()->id;
        $projeto = Projeto::where('id', $request->projeto);
        $file = new File; 
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx']);

        $request->file('file')->store('public/files');

        //$user = Auth::user();
        $file->file = $request->file('file')->hashName();
        $file->projeto_id = $projeto;
        $file->save();

        return redirect()->route('home')->with('status', 'File Has been uploaded!');
    }

    public function get250(){
        $file=public_path()."/forms/Q250-Formulário Elaboração Pareceres CES-HE-FFP.doc";
        return Response::download($file);
}
}
