<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ServicosController extends Controller
{
    public function index($method = null, $servico = null) {
        $servicos = DB::table('servicos')->get();
        $categorias = DB::table('categorias')->get();

        if($servico != null) $servico = DB::table('servicos')->where('id', $servico)->first();

        return view('admin.servicos', [
            'servicos' => $servicos,
            'categorias' => $categorias,
            'method' => $method,
            'servico' => $servico
        ]);
    }

    public function editar(Request $request) {
        Validator::extend('validarImagem', function ($attribute, $value, $parameters, $validator) use ($request) {
            if($value != null) {
                if(!$request->hasFile('imagem') && !file_exists('/uploads/servicos/'.$request->imagem)) {
                    $validator->errors()->add($attribute, 'O diretório da imagem não foi encontrado.');
                    return false;
                }
                else if($request->file('imagem')->isValid() && !in_array($request->imagem->extension(), ['jpg', 'jpeg', 'png', 'fif', 'gif'])) { 
                    $validator->errors()->add($attribute, 'O format da imagem não é válido.');
                    return false;
                }
            }
            return true;
        });

        $validation = Validator::make($request->all(), [
            'titulo' => 'required|min:2|max:255',
            'subtitulo' => 'required|min:2|max:255',
            'conteudo' => 'required|min:2',
            'categoria' => [
                'required',
                function($attribute, $value, $fail) {
                    $categoria = DB::table('categorias')->where('id', $value)->count();
                    if($categoria == 0) $fail("O campo categoria não foi encontrado"); 
                }
            ],
            'imagem' => 'validarImagem'
        ]);

        if(!$request->hasFile('imagem') && !file_exists('/uploads/servicos/'.$request->imagem)) $fail = "O diretório da imagem não foi encontrado";
        else if($request->file('imagem')->isValid() && !in_array($request->imagem->extension(), ['jpg', 'jpeg', 'png', 'fif', 'gif'])) $fail = "O format da imagem não é válido";

        if($validation->fails()) return redirect()->back()->withErrors($validation)->withInput();
        else {
            if($request->imagem == null) $imagem = DB::table('servicos')->where('id', $request->id)->first('imagem')->imagem;
            else if(file_exists('/uploads/servicos/'.$request->imagem)) $imagem = $request->imagem;
            else {
                $imagem = $request->imagem->getClientOriginalName(); 
                file_put_contents("uploads/servicos/$imagem", file_get_contents($request->file('imagem')));
            }
            
            DB::table('servicos')->where('id', $request->id)->update([
                'titulo' => $request->titulo,
                'subtitulo' => $request->subtitulo,
                'conteudo' => $request->conteudo,
                'categoria' => $request->categoria,
                'imagem' => $imagem,
                'status' => (isset($request->ativo)) ? 1 : 0
            ]);
           

            return Redirect::back()->with([
                'mensagem' => 'Serviço #'.$request->id.' atualizado.'
            ]);
        }
    }
}
