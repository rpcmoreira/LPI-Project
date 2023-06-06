<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;


/* The `class AdminController extends Controller` is defining a new class called `AdminController` that
extends the `Controller` class. This means that the `AdminController` class inherits all the
properties and methods of the `Controller` class and can also define its own properties and methods. */
class AdminController extends Controller
{

    /**
     * This function returns a view for the admin dashboard page in PHP.
     * 
     * @return The function `adminPage()` is returning a view called `adminDash` located in the `admin`
     * folder inside the `views` directory.
     */
    public function adminPage(){
            return view('admin.adminDash');
    }

    /**
     * This PHP function adds a new state to a database table and redirects the user to an admin page
     * with a success message.
     * 
     * @param request  is an instance of the Request class which contains the data sent by the
     * user through an HTTP request. It is used to retrieve input data, files, cookies, and other
     * information related to the request. In this specific function, it is used to retrieve the value
     * of the 'estado' input field
     * 
     * @return a redirect to the 'adminPage' route with a success message 'Estado adicionado com
     * sucesso' stored in the session using the with() method.
     */
    public function adicionarEstado(Request $request){
        DB::table('estado')->insert([
            'estado' => $request->estado,
        ]);
        return redirect()->route('adminPage')->with('adicionado', 'Estado adicionado com sucesso');
    }

    /**
     * This PHP function removes a state from a database table and redirects to an admin page with a
     * success message.
     * 
     * @param request  is an instance of the Request class which contains the data sent by the
     * client in the HTTP request. It is used to retrieve data from the request such as form data,
     * query parameters, and request headers. In this case, it is used to retrieve the ID of the state
     * to be deleted from
     * 
     * @return a redirect to the 'adminPage' route with a success message ('Estado apagado com
     * sucesso') stored in the session flash data.
     */
    public function removerEstado(Request $request){
        DB::table('estado')->where('id', $request->id)->delete();
        return redirect()->route('adminPage')->with('aviso', 'Estado apagado com sucesso');
    }

    /**
     * The function retrieves a specific state from the database and returns a view for editing it.
     * 
     * @param request  is an instance of the Request class which contains the data sent by the
     * client in the HTTP request. It is used to retrieve input data, such as form data or query
     * parameters, and to interact with the request headers and cookies. In this specific code snippet,
     *  is used to retrieve the
     * 
     * @return a view called 'admin.editEstado' with a variable called 'estado' that contains the data
     * of a specific state retrieved from the database based on the ID passed in the request.
     */
    public function editarEstado(Request $request){
        $estado = DB::table('estado')->where('id', $request->id)->first();
        return view('admin.editEstado',  ['estado' => $estado]);
    }

    /**
     * This PHP function updates the "estado" field in the "estado" table where the "id" matches the
     * value provided in the request and redirects to the admin page with a success message.
     * 
     * @param request  is an instance of the Request class which contains the data sent by the
     * client in the HTTP request. It is used to retrieve input data, such as form data or query
     * parameters, and to handle file uploads. In this case, it is used to retrieve the ID and the new
     * state value of
     * 
     * @return a redirect to the 'adminPage' route with a success message 'Estado editado com sucesso'
     * stored in the session variable 'adicionado'.
     */
    public function editEstado(Request $request){
        DB::table('estado')->where('id', $request->id)->update(['estado' => $request->estado]);
        return redirect()->route('adminPage')->with('adicionado', 'Estado editado com sucesso');
    }

    /**
     * This PHP function adds a new area to a database table and redirects the user to an admin page
     * with a success message.
     * 
     * @param request  is an instance of the Request class which contains the data sent by the
     * user through an HTTP request. It is used to retrieve input data, files, cookies, and other
     * information related to the request. In this specific function, it is used to retrieve the value
     * of the 'area' input field
     * 
     * @return a redirect to the 'adminPage' route with a success message 'Área adicionada com sucesso'
     * stored in the session using the 'with' method.
     */
    public function adicionarArea(Request $request){
        DB::table('area')->insert([
            'nome' => $request->area,
        ]);
        return redirect()->route('adminPage')->with('adicionado', 'Área adicionada com sucesso');
    }

    /**
     * This PHP function removes an area from a database table based on the provided ID and redirects
     * to an admin page with a success message.
     * 
     * @param request  is an instance of the Request class which contains the data sent by the
     * client in the HTTP request. It is used to retrieve data from the request, such as form data,
     * query parameters, and request headers. In this case, it is used to retrieve the ID of the area
     * to be deleted
     * 
     * @return a redirect to the 'adminPage' route with a success message ('Área apagada com sucesso')
     * stored in the session flash data.
     */
    public function removerArea(Request $request){
        DB::table('area')->where('id', $request->id)->delete();
        return redirect()->route('adminPage')->with('aviso', 'Área apagada com sucesso');
    }

    /**
     * The function retrieves an area from the database based on its ID and returns a view for editing
     * it.
     * 
     * @param request  is an instance of the Request class which contains the data sent by the
     * client in the HTTP request. It is used to retrieve input data, such as form data or query
     * parameters, from the request. In this case, it is used to retrieve the ID of the area to be
     * edited.
     * 
     * @return a view called 'admin.editArea' with an array that contains the data of an area retrieved
     * from the database based on the ID passed in the request.
     */
    public function editarArea(Request $request){
        $area = DB::table('area')->where('id', $request->id)->first();
        return view('admin.editArea',  ['area' => $area]);
    }

    /**
     * This PHP function updates the name of an area in a database table based on the provided ID and
     * redirects to an admin page with a success message.
     * 
     * @param request  is an instance of the Request class which contains the data sent by the
     * user through an HTTP request. It can contain data from the URL, form data, and other HTTP
     * request data. In this case, it is used to retrieve the ID and the new name of the area to be
     * edited.
     * 
     * @return a redirect to the 'adminPage' route with a success message 'Área editada com sucesso'
     * stored in the session variable 'adicionado'.
     */
    public function editArea(Request $request){
        DB::table('area')->where('id', $request->id)->update(['nome' => $request->area]);
        return redirect()->route('adminPage')->with('adicionado', 'Área editada com sucesso');
    }

    /**
     * This PHP function adds a new "tipo" (type) to a database table and redirects the user to an
     * admin page with a success message.
     * 
     * @param request  is an object of the Request class which contains the data sent by the
     * user through an HTTP request. It can contain data from the URL, form data, and other HTTP
     * request methods like GET, POST, PUT, DELETE, etc. In this case, it is used to get the value of
     * 
     * @return a redirect to the 'adminPage' route with a success message 'Área adicionada com sucesso'
     * stored in the session variable 'adicionado'.
     */
    public function adicionarTipo(Request $request){
        DB::table('tipo')->insert([
            'nome' => $request->tipo,
        ]);
        return redirect()->route('adminPage')->with('adicionado', 'Área adicionada com sucesso');
    }

    /**
     * This PHP function removes a record from a database table based on the provided ID and redirects
     * to a specific page with a success message.
     * 
     * @param request  is an instance of the Request class which contains the data sent by the
     * client in the HTTP request. It can be used to retrieve input data, files, cookies, headers, and
     * other information related to the request. In this case, it is used to retrieve the ID of the
     * area to be
     * 
     * @return a redirect to the 'adminPage' route with a success message ('Área apagada com sucesso')
     * stored in the session flash data.
     */
    public function removerTipo(Request $request){
        DB::table('tipo')->where('id', $request->id)->delete();
        return redirect()->route('adminPage')->with('aviso', 'Área apagada com sucesso');
    }

    /**
     * The function retrieves a specific record from the "tipo" table in the database and returns a
     * view for editing it.
     * 
     * @param request  is an instance of the Request class which contains the data sent by the
     * client in the HTTP request. It is used to retrieve input data, such as form data or query
     * parameters, and to interact with the session and cookies. In this specific code, it is used to
     * retrieve the 'id'
     * 
     * @return a view called 'admin.editTipo' with a variable called 'tipo' that contains the data of a
     * specific record from the 'tipo' table in the database, based on the 'id' parameter received in
     * the request.
     */
    public function editarTipo(Request $request){
        $tipo = DB::table('tipo')->where('id', $request->id)->first();
        return view('admin.editTipo',  ['tipo' => $tipo]);
    }

    /**
     * This PHP function updates the name of a record in the "tipo" table based on the provided ID and
     * redirects to the admin page with a success message.
     * 
     * @param request  is an instance of the Request class which contains the data sent by the
     * user through an HTTP request. It can contain data from the URL, form data, and other HTTP
     * request data. In this case, it is used to retrieve the 'id' and 'area' parameters sent through a
     * form
     * 
     * @return a redirect to the 'adminPage' route with a success message 'Área editada com sucesso'
     * stored in the session variable 'adicionado'.
     */
    public function editTipo(Request $request){
        DB::table('tipo')->where('id', $request->id)->update(['nome' => $request->area]);
        return redirect()->route('adminPage')->with('adicionado', 'Área editada com sucesso');
    }

    /**
     * This PHP function adds a new study to a database table and redirects the user to an admin page
     * with a success message.
     * 
     * @param request  is an instance of the Request class which contains the data sent by the
     * user through an HTTP request. It can contain data from the URL, form data, and other information
     * related to the request. In this case, it is used to retrieve the value of the 'estudo' input
     * field from
     * 
     * @return a redirect to the 'adminPage' route with a success message 'Estudo adicionado com
     * sucesso' stored in the session variable 'adicionado'.
     */
    public function adicionarEstudo(Request $request){
        DB::table('estudos')->insert([
            'nome' => $request->estudo,
        ]);
        return redirect()->route('adminPage')->with('adicionado', 'Estudo adicionado com sucesso');
    }

    /**
     * This PHP function removes a study from the database based on its ID and redirects the user to
     * the admin page with a success message.
     * 
     * @param request  is an instance of the Request class, which is used to retrieve data from
     * HTTP requests. It contains information about the current request, such as the HTTP method,
     * headers, and any data submitted in the request body. In this specific function,  is used
     * to retrieve the ID of the study
     * 
     * @return a redirect to the 'adminPage' route with a success message ('Estudo apagado com
     * sucesso') stored in the session flash data.
     */
    public function removerEstudo(Request $request){
        DB::table('estudos')->where('id', $request->id)->delete();
        return redirect()->route('adminPage')->with('aviso', 'Estudo apagado com sucesso');
    }

    /**
     * This PHP function retrieves a specific study from a database and returns a view for editing it.
     * 
     * @param request  is an instance of the Illuminate\Http\Request class, which represents an
     * HTTP request. It contains information about the request such as the HTTP method, headers, and
     * parameters. In this specific code snippet,  is used to retrieve the ID of the study to
     * be edited from the request parameters.
     * 
     * @return a view called 'admin.editEstudo' with an array containing the data of a specific
     * 'estudo' (study) that was retrieved from the database based on the 'id' parameter received in
     * the request.
     */
    public function editarEstudo(Request $request){
        $estudo = DB::table('estudos')->where('id', $request->id)->first();
        return view('admin.editEstudo',  ['estudo' => $estudo]);
    }

    /**
     * This PHP function updates the name of a study in a database and redirects to an admin page with
     * a success message.
     * 
     * @param request  is an instance of the Request class which contains the data sent by the
     * user through an HTTP request. It contains information such as the request method, headers,
     * parameters, and input data. In this case, it is used to retrieve the ID and the new name of the
     * study to be updated in
     * 
     * @return a redirect to the 'adminPage' route with a success message 'Estudo editado com sucesso'
     * stored in the session variable 'adicionado'.
     */
    public function editEstudo(Request $request){
        DB::table('estudos')->where('id', $request->id)->update(['nome' => $request->estudo]);
        return redirect()->route('adminPage')->with('adicionado', 'Estudo editado com sucesso');
    }

    /**
     * This PHP function removes a user from the database and redirects to the admin page with a
     * success message.
     * 
     * @param request  is an object of the Request class which contains the data that was sent
     * to the server through an HTTP request. It can contain data from the URL, form data, and other
     * types of data. In this case, it is used to get the ID of the user that needs to be deleted from
     * 
     * @return a redirect to the 'adminPage' route with a success message ('User apagado com sucesso')
     * stored in the session flash data.
     */
    public function removerUser(Request $request){
        DB::table('users')->where('id', $request->id)->delete();
        return redirect()->route('adminPage')->with('aviso', 'User apagado com sucesso');
    }

    /**
     * This PHP function retrieves a user from the database based on their ID and returns a view for
     * editing the user's information.
     * 
     * @param request  is an instance of the Request class which contains the data sent by the
     * client in the HTTP request. It is used to retrieve input data, such as form data or query
     * parameters, from the request. In this case, it is used to retrieve the user ID from the request
     * so that the corresponding
     * 
     * @return a view called 'admin.editUser' with a variable called 'user' that contains the data of a
     * user retrieved from the database based on the ID passed in the request.
     */
    public function editarUser(Request $request){
        $user = DB::table('users')->where('id', $request->id)->first();
        return view('admin.editUser',  ['user' => $user]);
    }

    /**
     * This function updates the "tipo_id" field of a user in the database based on the provided user
     * ID and redirects to the admin page with a success message.
     * 
     * @param request  is an instance of the Request class which contains the data sent by the
     * user in the HTTP request. It is used to retrieve input data, such as form data or query
     * parameters, and to access the HTTP headers and cookies. In this specific function, it is used to
     * retrieve the user ID and
     * 
     * @return a redirect to the adminPage route with a success message "User editado com sucesso"
     * (User edited successfully) stored in the session.
     */
    public function editUser(Request $request){
        DB::table('users')->where('id', $request->id)->update(['tipo_id' => $request->tipo]);
        return redirect()->route('adminPage')->with('adicionado', 'User editado com sucesso');
    }
}
