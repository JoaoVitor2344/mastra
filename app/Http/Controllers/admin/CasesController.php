<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CasesController extends Controller
{
    public function index($id = null) {
        if($id == null) {
            $cases = DB::table('cases')->get();
            return view('admin.cases', [
                'cases' => $cases,
            ]);
        }
        else {
            $case = DB::table('cases')->where('id', $id)->first();
            return view('admin.cases', [
                'case' => $case,
            ]);
        }
    }

    public function form($page) {
        return view('admin.cases', [
            'page' => 'cadastrar'
        ]);
    }

    public function create(Request $request) {
        $validation = Validator::make($request->all(), [
            'descricao' => 'required|min:2|max:255',
            'detalhes' => 'required|min:2',
        ]);

        print_r($request->descricao);

        if($validation->fails()) return redirect()->back()->withErrors($validation)->withInput();
        else {
            DB::table('cases')->insert([
                'descricao' => $request->descricao,
                'detalhes' => $request->detalhes,
                'imagens' => '',
                'status' => (isset($request->ativo)) ? 1 : 0
            ]);

            return redirect('/admin/cases');
        }
    }

    public function update(Request $request) {
        $validation = Validator::make($request->all(), [
            'descricao' => 'required|min:2|max:255',
            'detalhes' => 'required|min:2',
        ]);

        print_r($request->descricao);

        if($validation->fails()) return redirect()->back()->withErrors($validation)->withInput();
        else {
            DB::table('cases')->insert([
                'descricao' => $request->descricao,
                'detalhes' => $request->detalhes,
                'imagens' => '',
                'status' => (isset($request->ativo)) ? 1 : 0
            ]);

            return redirect('/admin/cases');
        }
    }
}
