<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class servicosController extends Controller
{
    public function index($id = null) {
        if($id == null) {
            $id = DB::table('servicos')->where('status', '1')->first();
            $id = $id->id;

            return redirect("/servico/$id");
        }
        else {
            $servico = DB::table('servicos')->where('id', $id)->first();
            $servicos = DB::table('servicos')->where('status', 1)->get();
    
            return view('servicos', [
                'servico' => $servico,
                'servicos' => $servicos
            ]);
        }
    }
}
