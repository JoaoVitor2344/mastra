<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class casesController extends Controller
{
    public function index() {
        return view('cases');
    }

    public function select($id) {
        $case = DB::table('cases')->where('id', $id)->first();
        return view('cases', ['case' => $case]);
    }
}
