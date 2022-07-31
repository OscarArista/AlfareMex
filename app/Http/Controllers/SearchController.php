<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $data = trim($request->valor);
        $result = DB::table('productos')
        ->where('name','like','%'.$data.'%')
        ->limit(3)
        ->get();
        return response()->json([
            "estado"=>1,
            "result" => $result
        ]); 
    }
}
