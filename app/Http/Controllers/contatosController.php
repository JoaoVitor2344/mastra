<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contatosController extends Controller
{
    public function index() {
        return view('contatos');
    }
}
