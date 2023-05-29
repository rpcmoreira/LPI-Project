<?php

namespace App\Http\Controllers;

use App\Events\StateChange;
use App\Models\File;
use App\Models\projeto;
use App\Models\User;
use App\Models\Message;
use App\Notifications\ProjetoState;
use ConsoleTVs\Charts\Classes\Highcharts\Chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Facades\Charts;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Arr;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Termwind\Components\Dd;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Livewire\Component;
use Livewire\WithPagination;
use Pusher\Pusher;

class ProjectController extends Controller
{
    use WithPagination;
    public $search = "";


    public function start()
    {
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
    

    public function q250()
    {
        return view('forms/q250');
    }
    public function q250_form(Request $request)
    {
        dd($request);
    }

    public function q251()
    {
        return view('forms/q251');
    }

    public function q251_form(Request $request)
    {
        $data = array('data' => $request->data_inicio);
        $data_f = array('data' => $request->data_fim);
        DB::table('data')->insert($data);
        DB::table('data')->insert($data_f);

        $data_inicio = DB::table('data')->where('data', $request->data_inicio)->value('id');
        $data_fim = DB::table('data')->where('data', $request->data_fim)->value('id');

        $coordenador = DB::table('users')->where('nome', $request->coordenador)->value('id');
        $estudos = DB::table('estudos')->where('nome', $request->estudos)->value('id');
        $area = DB::table('area')->where('nome', $request->area)->value('id');
        projeto::create([
            'nome' => $request->nome,
            'proponente_id' => Auth::user()->id,
            'objetivo' => $request->objetivo,
            'metodos' => $request->justificacao,
            'data_id' => $data_inicio,
            'data_final_id' => $data_fim,
            'coordenador_id' => $coordenador,
            'estudo_id' => $estudos,
            'area_id' => $area,
        ]);
        return redirect('dashboard');
    }


    public function q272()
    {
        $file = public_path() . "/forms/Q272-Pedido-de-Autorização-Realização-de-investigação.docx";
        return Response::download($file);
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

    public function changeProjectState(Request $request)
    {
        $projeto_id = $request->projeto_id;
        $new_state = $request->projectState;

        // Assuming 'estado_id' is the column where the state id is stored in the 'projeto' table
        DB::table('projetos')->where('id', $projeto_id)->update(['estado_id' => $new_state]);

        $user = User::find(DB::table('projetos')->where('id', $projeto_id)->value('proponente_id'));
        $secretariado = DB::table('users')->where('email', 'sec.ces.he@ufp.edu.pt')->value('id');

        $estado = DB::table('estado')->where('id', $new_state)->value('estado');
        $projeto = DB::table('projetos')->where('id', $projeto_id)->value('nome');
        $nome = DB::table('users')->where('id', DB::table('projetos')->where('id', $projeto_id)->value('proponente_id'))->value('nome');

        $users = collect([$user, $secretariado]);
        //Notification::send($users, new ProjetoState($projeto_id, $new_state));

        //event(new StateChange($nome, $projeto, $estado));

        $id = DB::table('projetos')->where('id', $projeto_id)->value('proponente_id');
        
        $message = new Message;
        $message->user_id = $id;
        $message->projeto_id = $projeto_id;
        $message->estado_id = $new_state;
        $message->save();

        $message = new Message;
        $message->projeto_id = $projeto_id;
        $message->estado_id = $new_state;
        $message->user_id = DB::table('users')->where('email', 'sec.ces.he@ufp.edu.pt')->value('id');
        $message->save();

        $options = array(
            'cluster' => 'eu',
            'useTLS' => true,
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options,
        );

        $data = ['user' => $id, 'project' => $projeto_id, 'estado' => $new_state];
        $pusher->trigger('event_not', 'my-event', $data);

        // After the update, redirect back to the previous page with a success message
        return redirect()->route('projectlist')->with('success', 'O projeto ' . $projeto . ' de ' . $nome . ' foi alterado para o estado ' . $estado);
    }

    public function logged()
    {
        return view('dashboard');
    }
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')
                ->with('login', 'Email/Password are wrong, please try again');
        }
    }

    public function addForms()
    {
        return view('addFiles');
    }

    public function guardarFicheiros(Request $request)
    {
        $request->validate([
            'Q251' => 'required',
            'Q252' => 'required',
            'Q272' => 'required',
        ]);


        //$q252 = $request->file('Q252')->store('files');
        //$q272 = $request->file('Q272')->store('files');

        $projeto = DB::table('projetos')->where('proponente_id', Auth::user()->id)->value('id');

        if (
            DB::table('files')->where('projeto_id', $projeto)->where('tipo', 'q251')->value('file') == null &&
            DB::table('files')->where('projeto_id', $projeto)->where('tipo', 'q252')->value('file') == null &&
            DB::table('files')->where('projeto_id', $projeto)->where('tipo', 'q272')->value('file') == null
        ) {
            $q251 = $request->file('Q251')->store('files');
            File::create([
                'tipo' => 'q251',
                'file' => $q251,
                'projeto_id' => $projeto,
            ]);
            $q252 = $request->file('Q252')->store('files');
            File::create([
                'tipo' => 'q252',
                'file' => $q252,
                'projeto_id' => $projeto,
            ]);
            $q272 = $request->file('Q272')->store('files');
            File::create([
                'tipo' => 'q272',
                'file' => $q272,
                'projeto_id' => $projeto,
            ]);

            DB::table('projetos')->where('proponente_id', Auth::user()->id)->update(['estado_id' => 1]);


            return redirect()->route('dashboard')->with('status', 'Formulários Submetidos');
        } else return redirect()->route('dashboard')->with('warning', 'Formulários ja tinham sido submetidos');
    }

    public function download($filename)
    {
        //dd($filename);
        $filePath = storage_path('app/files/' . $filename);
        $tipo = DB::table('files')->where('file', 'files/' . $filename)->value('tipo');
        $projeto = DB::table('projetos')->where('id', DB::table('files')->where('file', 'files/' . $filename)->value('projeto_id'))->value('nome');
        $nome = DB::table('users')->where('id', DB::table('projetos')->where('id', DB::table('files')
            ->where('file', 'files/' . $filename)->value('projeto_id'))->value('proponente_id'))->value('nome');

        $ficheiro = $projeto . '_' . $tipo . '_' . $nome . '.pdf';
        //dd($filename);  
        // Check if the file exists
        if (file_exists($filePath)) {
            // Return the file download response
            return response()->download($filePath, $ficheiro);
        } else {
            // File not found, handle the error
            abort(404);
        }
    }
}
