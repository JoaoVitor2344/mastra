<?php

use App\Http\Controllers\casesController;
use App\Http\Controllers\contatosController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\orcamentoController;
use App\Http\Controllers\servicosController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;

Route::get('/', [indexController::class, 'index']);

Route::get('/servico/{id}', [servicosController::class, 'index']);

Route::get('/contatos', [contatosController::class, 'index']);

Route::get('/cases', [casesController::class, 'index']);
Route::get('/cases/{id}', [casesController::class, 'select']);

Route::get('/orcamento', [orcamentoController::class, 'index']);
Route::post('/orcamento', [orcamentoController::class, 'insert']);