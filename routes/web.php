<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EncomiendaController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| RUTAS PRINCIPALES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
})->name('inicio');

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/ingresar', function () {
    return view('login');
})->name('login');

Route::post('/ingresar', function (Request $request) {

    $credenciales = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credenciales)) {
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    return back()
        ->withInput()
        ->withErrors([
            'email' => 'Correo o contraseña incorrectos.',
        ]);

})->name('ingresar');

/*
|--------------------------------------------------------------------------
| CERRAR SESIÓN
|--------------------------------------------------------------------------
*/

Route::post('/salir', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');

})->name('salir');

/*
|--------------------------------------------------------------------------
| RUTA EXTRA PARA EVITAR ERROR route('dashboard')
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

Route::get('/registro', [EncomiendaController::class, 'create'])
    ->name('registro');

Route::post('/registro', [EncomiendaController::class, 'store'])
    ->name('registro.store');

Route::get('/seguimiento', [SeguimientoController::class, 'index'])
    ->name('seguimiento');

/*
|--------------------------------------------------------------------------
| RUTAS ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

Route::get('/admin/encomiendas', [EncomiendaController::class, 'index'])
    ->name('admin.encomiendas.index');

Route::get('/admin/encomiendas/{encomienda}/estado', [EncomiendaController::class, 'editEstado'])
    ->name('admin.encomiendas.estado');

Route::put('/admin/encomiendas/{encomienda}/estado', [EncomiendaController::class, 'updateEstado'])
    ->name('admin.encomiendas.estado.update');

Route::get('/admin/encomiendas/{encomienda}/pdf', [EncomiendaController::class, 'pdf'])
    ->name('admin.encomiendas.pdf');