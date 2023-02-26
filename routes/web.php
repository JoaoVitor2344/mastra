<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ServicosController as AdminServicosController;
use App\Http\Controllers\casesController;
use App\Http\Controllers\contatosController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\orcamentoController;
use App\Http\Controllers\servicosController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', [indexController::class, 'index']);

Route::get('/servico/{id}', [servicosController::class, 'index']);

Route::get('/cases', [casesController::class, 'index']);
Route::get('/cases/{id}', [casesController::class, 'select']);

Route::get('/contatos', [contatosController::class, 'index']);

Route::get('/orcamento', [orcamentoController::class, 'index']);
Route::post('/orcamento', [orcamentoController::class, 'insert']);

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/servicos/{method?}/{servico?}', [AdminServicosController::class, 'index']);
Route::post('/admin/servicos/editar/{page}', [AdminServicosController::class, 'editar']);