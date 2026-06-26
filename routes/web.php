<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/ingresar', function (Request $request) {
    $credenciales = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credenciales)) {
        $request->session()->regenerate();

        if (Auth::user()->rol === 'admin') {
            return redirect()->route('dashboard');
        }

        if (Auth::user()->rol === 'cliente') {
            return redirect()->route('panel.cliente');
        }
    }

    return back()->with('error', 'Correo o contraseña incorrectos.');
})->name('ingresar');

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
})->name('logout');

Route::get('/panel-cliente', function () {
    return view('panel_cliente');
})->name('panel.cliente');