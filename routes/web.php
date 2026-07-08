<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncomiendaController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Route::get('/registro', [EncomiendaController::class, 'create'])
    ->name('registro');

Route::post('/registro', [EncomiendaController::class, 'store'])
    ->name('registro.store');

Route::get('/seguimiento', [SeguimientoController::class, 'index'])
    ->name('seguimiento');

Route::get('/admin/encomiendas', [EncomiendaController::class, 'index'])
    ->name('admin.encomiendas.index');

Route::get('/admin/encomiendas/{encomienda}/estado', [EncomiendaController::class, 'editEstado'])
    ->name('admin.encomiendas.estado');

Route::put('/admin/encomiendas/{encomienda}/estado', [EncomiendaController::class, 'updateEstado'])
    ->name('admin.encomiendas.estado.update');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

Route::get('/admin/encomiendas/{encomienda}/pdf', [EncomiendaController::class, 'pdf'])
    ->name('admin.encomiendas.pdf');