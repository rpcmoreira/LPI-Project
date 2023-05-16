<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('query');
    
    // Perform the search based on the query
    // Modify this part based on your specific search logic
    
    $results = DB::table('users')
        ->whereIn('users.tipo_id', [2, 3, 4])
        ->where('users.nome', 'LIKE', '%' . $query . '%')
        ->get();
        
    return view('search-results', ['results' => $results]);
}
}
