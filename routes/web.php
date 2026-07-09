<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

use App\Models\User;
use App\Http\Controllers\EncomiendaController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| INICIO DEL SISTEMA
|--------------------------------------------------------------------------
| Al entrar a http://127.0.0.1:8000/ primero saldrá el login.
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

    if (Auth::attempt($credenciales, $request->boolean('remember'))) {

        $request->session()->regenerate();

        if (Auth::user()->rol === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('cliente.inicio');
    }

    return back()
        ->withInput()
        ->withErrors([
            'email' => 'Correo o contraseña incorrectos.',
        ]);

})->name('ingresar');

/*
|--------------------------------------------------------------------------
| CLIENTE / USUARIO
|--------------------------------------------------------------------------
| El usuario normal entra aquí después del login.
*/

Route::get('/cliente', function () {

    if (!Auth::check()) {
        return redirect()->route('login');
    }

    if (Auth::user()->rol === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return view('welcome');

})->name('cliente.inicio');

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
| RECUPERAR CONTRASEÑA
|--------------------------------------------------------------------------
*/

Route::get('/recuperar-contrasena', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/recuperar-contrasena', function (Request $request) {

    $request->validate([
        'email' => ['required', 'email'],
    ]);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    if ($status === Password::RESET_LINK_SENT) {
        return back()->with('status', 'Se envió el enlace de recuperación. Revisa tu correo o el archivo laravel.log.');
    }

    return back()->withErrors([
        'email' => 'No se encontró un usuario con ese correo.',
    ]);

})->name('password.email');

Route::get('/restablecer-contrasena/{token}', function (string $token) {
    return view('auth.reset-password', [
        'token' => $token
    ]);
})->name('password.reset');

Route::post('/restablecer-contrasena', function (Request $request) {

    $request->validate([
        'token' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8', 'confirmed'],
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {

            $user->forceFill([
                'password' => Hash::make($password),
                'remember_token' => Str::random(60),
            ])->save();

            event(new PasswordReset($user));
        }
    );

    if ($status === Password::PASSWORD_RESET) {
        return redirect()->route('login')
            ->with('status', 'Contraseña actualizada correctamente.');
    }

    return back()->withErrors([
        'email' => 'No se pudo restablecer la contraseña.',
    ]);

})->name('password.update');

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