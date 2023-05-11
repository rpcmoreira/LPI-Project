<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\projeto;
use ConsoleTVs\Charts\Classes\Highcharts\Chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Facades\Charts;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Arr;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller {
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

    public function start(){
        return view('welcome');
    }

    public function storeForm(Request $request)
    {
        //$user = Auth::user()->id;
        $projeto = Projeto::where('id', $request->projeto);
        $file = new File;
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx'
        ]);

        $request->file('file')->store('public/files');

        //$user = Auth::user();
        $file->file = $request->file('file')->hashName();
        $file->projeto_id = $projeto;
        $file->save();

        return redirect()->route('home')->with('status', 'File Has been uploaded!');
    }

    public function get250()
    {
        $file = public_path() . "/forms/Q250-Formulário Elaboração Pareceres CES-HE-FFP.doc";
        return Response::download($file);
    }

    public function dashboard()
    {
        $projetosPorEstado = DB::table('estado')
            ->leftJoin('projetos', 'projetos.estado_id', '=', 'estado.id')
            ->select('estado.estado', DB::raw('COUNT(projetos.id) as project_count'))
            ->where('estado.estado', '!=', 'finalizado')
            ->groupBy('estado.estado')
            ->pluck('project_count', 'estado.estado');

        // Generate the chart using Laravel Charts
        $chart = new Chart;
        $chart->title('Projetos por Estado');
        $chart->labels($projetosPorEstado->keys());
        $chart->dataset('Projetos', 'bar', $projetosPorEstado->values());
        $chart->options([
            'yAxis' => [
                'type' => 'linear',
                'tickInterval' => 1,
            ],
        ]);


        return view('dashboard', ['chart' => $chart]);
    }

    public function projectList()
    {
        return view('projectlist');
    }
    public function q250() {
        return view('forms/q250');
    }
    public function q250_form(Request $request) {
        dd($request);
    }

    public function q251()
    {
        return view('forms/q251');
    }

    public function q251_form(Request $request)
    {
        //dd($request);
        $data = array('data' => $request->data_inicio);
        $data_f = array('data' => $request->data_fim);
        DB::table('data')->insert($data);
        DB::table('data')->insert($data_f);

        $data_inicio = DB::table('data')->where('data', $request->data_inicio)->value('id');
        $data_fim = DB::table('data')->where('data', $request->data_fim)->value('id');

        projeto::create([
            'nome' => $request->nome,
            'proponente_id' => Auth::user()->id,
            'objetivo' => $request->objetivo,
            'metodos' => $request->justificacao,
            'data_id' => $data_inicio,
            'data_final_id' => $data_fim,
            'coordenador_id' => $request->coordenador,
            'estudo_id' => $request->estudos,
            'area_id' => 1,
        ]);
        return redirect('dashboard');
    }

    

    public function q272_form(Request $request)
    {
        dd($request);
    }
    public function q272()
    {
        return view('forms/q272');
    }


    public function q381()
    {
        return view('forms/q381');
    }


    public function q381_form(Request $request)
    {
        dd($request);
    }
    public function q252()
    {
        return view('forms/q252');
    }

    public function q252_form(Request $request)
    {
        dd($request);
    }

    public function projetoInfo()
    {
        //dd($request);
        $data = session('project');
        return view('projeto_info', ['projeto' => $data]);
    }

    public function logged() {
        return view('loginTest');
    }
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))){
                return redirect()->route('home');
        }else{
            return redirect()->route('login')
                ->with('login','Email/Password are wrong, please try again');
        }
    }
}
