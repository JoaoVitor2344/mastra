<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class casesController extends Controller
{
    public function index() {
        return view('cases');
    }

    public function select($id) {
        $case = (object) [
            'descricao' => 'Foi realizado inspeção técnica em todos os sistemas construtivos do condomínio para a análise da conformidade construtiva do empreendimento. Foi inspecionada uma área de 46.200 m².',
            'detalhes' => (object) [
                'projeto' => 'Corporate Jd. Botânico',
                'categoria' => 'Inspeção Predial',
                'cliente' => 'Corporate Jardim Botânico'
            ],
            'imagens' => [
                'teste1.jpg',
                'teste2.jpg',
                'teste3.jpg',
                'teste4.jpg'
            ]
        ];
        return view('cases', ['case' => $case]);
    }
}
