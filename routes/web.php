<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\EncomiendaController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReporteController;

/*
|--------------------------------------------------------------------------
| PÁGINA PRINCIPAL DEL CLIENTE
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

/*
|--------------------------------------------------------------------------
| LOGIN ADMINISTRATIVO
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

    if (Auth::attempt($credenciales, $request->boolean('remember'))) {
        $request->session()->regenerate();

        return redirect()->route('admin.encomiendas.index');
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
| Al cerrar sesión vuelve al login para que sea más realista.
*/

Route::post('/salir', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');

})->name('salir');

/*
|--------------------------------------------------------------------------
| RUTA EXTRA
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return redirect()->route('admin.encomiendas.index');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS DEL CLIENTE
|--------------------------------------------------------------------------
*/

Route::get('/seguimiento', [SeguimientoController::class, 'index'])
    ->name('seguimiento');

/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS DEL ADMINISTRADOR
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/registro', [EncomiendaController::class, 'create'])
        ->name('registro');

    Route::post('/registro', [EncomiendaController::class, 'store'])
        ->name('registro.store');

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

    /*
    |--------------------------------------------------------------------------
    | PERFIL / MI CUENTA
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/perfil', function () {
        return view('admin.perfil');
    })->name('admin.perfil');

    Route::put('/admin/perfil/datos', function (Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo es obligatorio.',
            'email.email' => 'Ingrese un correo válido.',
            'email.unique' => 'Ese correo ya está registrado.',
        ]);

        $request->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Datos de la cuenta actualizados correctamente.');
    })->name('admin.perfil.datos');

    Route::put('/admin/perfil/password', function (Request $request) {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ], [
            'current_password.required' => 'Ingrese su contraseña actual.',
            'current_password.current_password' => 'La contraseña actual no es correcta.',
            'password.required' => 'Ingrese la nueva contraseña.',
            'password.confirmed' => 'La nueva contraseña no coincide.',
            'password.min' => 'La nueva contraseña debe tener mínimo 8 caracteres.',
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Contraseña actualizada correctamente.');
    })->name('admin.perfil.password');

    /*
    |--------------------------------------------------------------------------
    | REPORTES
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/reportes', [ReporteController::class, 'index'])
    ->name('admin.reportes');

Route::get('/admin/reportes/general/excel', [ReporteController::class, 'generalExcel'])
    ->name('admin.reportes.general.excel');

});