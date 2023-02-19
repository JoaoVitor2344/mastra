<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class orcamentoController extends Controller
{
    public function index() {
        return view('orcamento');
    }

    public function insert(Request $request) {
        $validation = Validator::make($request->all(), [
            'nome' => 'required|min:2|max:255',
            'email' => 'required|email|min:2|max:255',
            'assunto' => 'required|min:2|max:255',
            'mensagem' => 'required|min:2|max:255',
        ]);

        if($validation->fails()) return redirect()->back()->withErrors($validation)->withInput();
        else {
            DB::table('orcamentos')->insert([
                'nome' => $request->nome,
                'email' => $request->email,
                'assunto' => $request->assunto,
                'mensagem' => $request->mensagem,
            ]);

            return redirect()->back()->with('mensagem', 'Em breve entraremos em contato.');
        }
    }
}
