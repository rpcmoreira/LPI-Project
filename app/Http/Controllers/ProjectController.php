<?php

namespace App\Http\Controllers;

use App\Events\StateChange;
use App\Events\MessageRead;
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

/* The above code is defining a PHP class called "ProjectController" that extends a parent class called
"Controller". It is likely that this class is used to handle requests and responses related to a
specific project in a web application. However, without seeing the implementation of the class
methods, it is difficult to determine its exact purpose. */
class ProjectController extends Controller
{
    use WithPagination;
    public $search = "";


    /**
     * The "start" function returns a view called "welcome" in PHP.
     * 
     * @return A view called "welcome" is being returned.
     */
    public function start()
    {
        return view('welcome');
    }

    /**
     * This function stores a file uploaded through a form and associates it with a project.
     * 
     * @param request  is an instance of the Illuminate\Http\Request class which represents an
     * HTTP request. It contains information about the request such as the HTTP method, headers, and
     * input data. In this case, it is used to retrieve the uploaded file and the project ID from the
     * form data. It is also used to
     * 
     * @return a redirect to the 'home' route with a success message in the session data.
     */
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

    /**
     * This PHP function downloads a specific file from a public path.
     * 
     * @return a file download response for the file located at the specified path. The file being
     * downloaded is a Word document titled "Q250-Formulário Elaboração Pareceres CES-HE-FFP.doc".
     */
    public function get250()
    {
        $file = public_path() . "/forms/Q250-Formulário Elaboração Pareceres CES-HE-FFP.doc";
        return Response::download($file);
    }

    /**
     * This function generates a chart showing the number of projects per state using Laravel Charts.
     * 
     * @return a view called 'dashboard' with a chart object as a parameter. The chart object is
     * generated using Laravel Charts and contains data on the number of projects per state.
     */
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

    /**
     * This function returns a view for a project list.
     * 
     * @return A view called "projectlist" is being returned.
     */
    public function projectList()
    {
        return view('projectlist');
    }


    /**
     * The function q250 returns a view for a form.
     * 
     * @return a view called 'forms/q250'.
     */
    public function q250()
    {
        return view('forms/q250');
    }

    /**
     * The function returns a view for a form with the name "q251".
     * 
     * @return a view named 'forms/q251'.
     */
    public function q251()
    {
        return view('forms/q251');
    }

    /**
     * This function creates a new project in the database based on the input data from a form.
     * 
     * @param request  is an object that contains the data sent through an HTTP request. It can
     * contain data from the URL parameters, form data, headers, cookies, and more. In this specific
     * code, it is used to retrieve data from a form submitted by the user.
     * 
     * @return a redirect to the 'dashboard' page.
     */
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


    /**
     * The function downloads a Word document for a request for authorization to conduct an
     * investigation.
     * 
     * @return a file download response for a Word document located at the specified file path.
     */
    public function q272()
    {
        $file = public_path() . "/forms/Q272-Pedido-de-Autorização-Realização-de-investigação.docx";
        return Response::download($file);
    }


    /**
     * The function returns a view for a form with the name "q381".
     * 
     * @return a view named 'q381' located in the 'forms' directory.
     */
    public function q381()
    {
        return view('forms/q381');
    }


    /**
     * The function returns a view for the q252 form in PHP.
     * 
     * @return a view called 'forms/q252'.
     */
    public function q252()
    {
        return view('forms/q252');
    }

    /**
     * This PHP function returns a view with project information stored in the session.
     * 
     * @return The function `projetoInfo()` is returning a view called `projeto_info` with a variable
     * `` that contains the data stored in the `project` session.
     */
    public function projetoInfo()
    {
        //dd($request);
        $data = session('project');
        return view('projeto_info', ['projeto' => $data]);
    }


    /**
     * The function updates the "is_read" field of a message with the given ID to 1 and triggers a
     * "MessageRead" event.
     * 
     * @param request  is an instance of the Request class which contains the HTTP request
     * information such as headers, parameters, and cookies. It is used to retrieve data from the
     * request and pass it to the function.
     * @param id  is a parameter that represents the ID of the message that needs to be marked as
     * read. This function updates the 'is_read' column of the 'messages' table to 1 for the message
     * with the given ID.
     * 
     * @return A JSON response with a key-value pair of 'success' => true.
     */
    public function markAsRead(Request $request, $id)
    {
        DB::table('messages')->where('id', $id)->update(['is_read' => 1]);
        event(new MessageRead($id));
        return response()->json(['success' => true]);
    }

    /**
     * This function changes the state of a project and sends notifications to relevant users.
     * 
     * @param request  is an instance of the Illuminate\Http\Request class, which represents an
     * HTTP request. It contains information about the request such as the HTTP method, headers, and
     * parameters. In this specific function, it is used to retrieve the values of the 'projeto_id' and
     * 'projectState' parameters sent
     * 
     * @return a redirect to the 'projectlist' route with a success message. The success message
     * includes the name of the project, the name of the proponent, and the new state of the project.
     */
    public function changeProjectState(Request $request)
    {
        $projeto_id = $request->projeto_id;
        $new_state = $request->projectState;

        // Assuming 'estado_id' is the column where the state id is stored in the 'projeto' table
        DB::table('projetos')->where('id', $projeto_id)->update(['estado_id' => $new_state]);

        $user = User::find(DB::table('projetos')->where('id', $projeto_id)->value('proponente_id'));
        $secretariado = User::where('tipo_id', 6)->first();

        $estado = DB::table('estado')->where('id', $new_state)->value('estado');
        $projeto = DB::table('projetos')->where('id', $projeto_id)->value('nome');
        $nome = DB::table('users')->where('id', DB::table('projetos')->where('id', $projeto_id)->value('proponente_id'))->value('nome');

        $users = collect([$user, $secretariado]);
        Notification::send($users, new ProjetoState($projeto_id, $new_state, 1));

        //event(new StateChange($nome, $projeto, $estado));

        $id = DB::table('projetos')->where('id', $projeto_id)->value('proponente_id');

        $message = new Message;
        $message->user_id = $id;
        $message->projeto_id = 1;
        $message->type = 1;
        $message->estado_id = $new_state;
        $message->save();

        $message = new Message;
        $message->type = 1;
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

    /**
     * The "logged" function returns a view for the dashboard in PHP.
     * 
     * @return A view named "dashboard" is being returned.
     */
    public function logged()
    {
        return view('dashboard');
    }

    /**
     * This is a PHP function that validates user input for email and password, attempts to
     * authenticate the user, and redirects them to the home page if successful or back to the login
     * page with an error message if unsuccessful.
     * 
     * @param request  is an instance of the Illuminate\Http\Request class which represents an
     * incoming HTTP request. It contains information about the request such as the HTTP method,
     * headers, and any data that was sent with the request.
     * 
     * @return If the user's email and password match with the database, the function will redirect the
     * user to the home page. If the email and password are incorrect, the function will redirect the
     * user back to the login page with a message "Email/Password are wrong, please try again".
     */
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

    /**
     * This PHP function returns a view for adding files.
     * 
     * @return The function `addForms()` is returning a view called `addFiles`.
     */
    public function addForms()
    {
        return view('addFiles');
    }

    /**
     * This function saves files uploaded by a user and updates the state of a project if the files
     * have not been previously submitted.
     * 
     * @param request  is an instance of the Illuminate\Http\Request class, which represents an
     * HTTP request. It contains information about the request such as the HTTP method, headers, and
     * input data. In this specific code, it is used to validate the input data and retrieve files
     * uploaded by the user.
     * 
     * @return a redirect response to the dashboard route with a status or warning message depending on
     * whether the forms were successfully submitted or not.
     */
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

    /**
     * This PHP function downloads a file from a specified file path and renames it based on
     * information retrieved from a database.
     * 
     * @param filename The name of the file that needs to be downloaded.
     * 
     * @return a file download response. If the file exists, it will download the file with the given
     * filename. If the file does not exist, it will return a 404 error.
     */
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

    /**
     * This function updates the approval status of a project and sends notifications to relevant users
     * based on the new status.
     * 
     * @param request  is an instance of the Illuminate\Http\Request class, which represents an
     * HTTP request. It contains information about the request such as the HTTP method, headers, and
     * input data. In this specific function, it is used to retrieve the values of the 'projeto_id' and
     * 'projectAproved'
     * 
     * @return a redirect to the 'projectlist' route.
     */
    public function changeAprovacao(Request $request)
    {
        $projeto_id = $request->projeto_id;
        $aprovacao = $request->projectAproved;
        DB::table('projetos')->where('id', $projeto_id)->update(['aprovacao' => $aprovacao]);
        $id = DB::table('projetos')->where('id', $projeto_id)->value('proponente_id');

        if ($aprovacao == 'Apr_Rec') {
            $user = User::find(DB::table('projetos')->where('id', $projeto_id)->value('proponente_id'));
            $secretariado = User::where('tipo_id', 6)->first();
            $users = collect([$user, $secretariado]);
            $state = DB::table('estado')->where('estado', 'Pendente')->value('id');
            Notification::send($users, new ProjetoState($projeto_id, $state, 2));
            DB::table('projetos')->where('id', $projeto_id)->update(['estado_id' => $state]);
            $message = new Message;
            $message->type = 2;
            $message->projeto_id = $projeto_id;
            $message->estado_id = $state;
            $message->user_id = $id;
            $message->save();

            $message = new Message;
            $message->type = 2;
            $message->projeto_id = $projeto_id;
            $message->estado_id = $state;
            $message->user_id = DB::table('users')->where('email', 'sec.ces.he@ufp.edu.pt')->value('id');
            $message->save();
        } else if ($aprovacao == "Apr_NRec") {
            $user = User::find(DB::table('projetos')->where('id', $projeto_id)->value('proponente_id'));
            $secretariado = User::where('tipo_id', 6)->first();
            $users = collect([$user, $secretariado]);
            $state = DB::table('estado')->where('estado', 'Pendente')->value('id');
            Notification::send($users, new ProjetoState($projeto_id, $state, 3));
            $state = DB::table('estado')->where('estado', 'Pendente')->value('id');
            DB::table('projetos')->where('id', $projeto_id)->update(['estado_id' => $state]);
            $message = new Message;
            $message->type = 3;
            $message->projeto_id = $projeto_id;
            $message->estado_id = $state;
            $message->user_id = $id;
            $message->save();

            $message = new Message;
            $message->type = 3;
            $message->projeto_id = $projeto_id;
            $message->estado_id = $state;
            $message->user_id = DB::table('users')->where('email', 'sec.ces.he@ufp.edu.pt')->value('id');
            $message->save();
        } else if ($aprovacao == "NRec") {
            $state = DB::table('estado')->where('estado', 'Cancelado')->value('id');
            $user = User::find(DB::table('projetos')->where('id', $projeto_id)->value('proponente_id'));
            $secretariado = User::where('tipo_id', 6)->first();
            $users = collect([$user, $secretariado]);
            Notification::send($users, new ProjetoState($projeto_id, $state, 4));
            DB::table('projetos')->where('id', $projeto_id)->update(['estado_id' => $state]);
            $message = new Message;
            $message->user_id = $id;
            $message->type = 4;
            $message->projeto_id = $projeto_id;
            $message->estado_id = $state;
            $message->save();

            $message = new Message;
            $message->type = 4;
            $message->projeto_id = $projeto_id;
            $message->estado_id = $state;
            $message->user_id = DB::table('users')->where('email', 'sec.ces.he@ufp.edu.pt')->value('id');
            $message->save();
        } else abort(501);

        return redirect()->route('projectlist');
    }

    /**
     * This function changes the relator of a project and sends a notification to the proponent and the
     * secretariat.
     * 
     * @param request  is an instance of the Illuminate\Http\Request class, which represents an
     * HTTP request. It contains information about the request such as the HTTP method, headers, and
     * any data sent in the request body. In this specific function, it is used to retrieve the values
     * of the 'projeto_id' and
     * 
     * @return a redirect to the 'projectlist' route.
     */
    public function changeRelator(Request $request)
    {
        $projeto_id = $request->projeto_id;
        $relator = $request->relator;
        DB::table('projetos')->where('id', $projeto_id)->update(['relator_id' => $relator]);

        $id = DB::table('projetos')->where('id', $projeto_id)->value('proponente_id');
        $state = DB::table('estado')->where('estado', 'Pendente')->value('id');
        $user = User::find(DB::table('projetos')->where('id', $projeto_id)->value('proponente_id'));
        $secretariado = User::where('tipo_id', 6)->first();
        $users = collect([$user, $secretariado]);
        $state = DB::table('estado')->where('estado', 'Pendente')->value('id');
        Notification::send($users, new ProjetoState($projeto_id, $state, 5));

        DB::table('projetos')->where('id', $projeto_id)->update(['estado_id' => $state]);
        $message = new Message;
        $message->type = 5;
        $message->projeto_id = $projeto_id;
        $message->estado_id = $state;
        $message->user_id = $id;
        $message->save();

        $message = new Message;
        $message->type = 5;
        $message->projeto_id = $projeto_id;
        $message->estado_id = $state;
        $message->user_id = DB::table('users')->where('email', 'sec.ces.he@ufp.edu.pt')->value('id');
        $message->save();

        return redirect()->route('projectlist');
    }
}
