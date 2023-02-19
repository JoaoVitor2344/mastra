<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class servicosController extends Controller
{
    public function index($id) {
        $servico = DB::table('servicos')->where('id', $id)->first();
        $servicos = DB::table('servicos')->where('status', 1)->get();

        return view('servicos', [
            'servico' => $servico,
            'servicos' => $servicos
        ]);
    }
}
