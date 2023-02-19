<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    public function index() {
        $servicos = DB::table('servicos')->where('status', 1)->get();
        return view('index', [
            'servicos' => $servicos
        ]);
    }
}
