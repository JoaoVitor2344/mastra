<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        $orcamentos = DB::table('orcamentos')->get();
        return view('admin.index', [
            'orcamentos' => $orcamentos
        ]);
    }
}
