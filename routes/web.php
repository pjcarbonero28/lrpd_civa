<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

use App\Models\User;
use App\Http\Controllers\EncomiendaController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReporteController;

/*
|--------------------------------------------------------------------------
| INICIO
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

    if (Auth::check()) {
        if (Auth::user()->rol === 'admin') {
            return redirect()->route('admin.encomiendas.index');
        }

        return redirect()->route('cliente.inicio');
    }

    return view('login');

})->name('login');

Route::post('/ingresar', function (Request $request) {

    $credenciales = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ], [
        'email.required' => 'Ingrese su correo electrónico.',
        'email.email' => 'Ingrese un correo válido.',
        'password.required' => 'Ingrese su contraseña.',
    ]);

    if (Auth::attempt($credenciales, $request->boolean('remember'))) {
        $request->session()->regenerate();

        if (Auth::user()->rol === 'admin') {
            return redirect()->route('admin.encomiendas.index');
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
| REGISTRO DE CUENTA CLIENTE
|--------------------------------------------------------------------------
*/

Route::get('/registrarse', function () {
    return view('auth.register');
})->name('register');

Route::post('/registrarse', function (Request $request) {

    $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'email', 'unique:users,email'],
        'telefono' => ['required', 'string', 'max:20', 'unique:users,telefono'],
        'password' => ['required', 'min:8', 'confirmed'],
    ], [
        'name.required' => 'El nombre es obligatorio.',

        'email.required' => 'El correo es obligatorio.',
        'email.email' => 'Ingrese un correo válido.',
        'email.unique' => 'Este correo ya está registrado. Inicie sesión o use otro correo.',

        'telefono.required' => 'El número celular es obligatorio.',
        'telefono.unique' => 'Este número celular ya está registrado. Use otro número.',

        'password.required' => 'La contraseña es obligatoria.',
        'password.min' => 'La contraseña debe tener mínimo 8 caracteres.',
        'password.confirmed' => 'Las contraseñas no coinciden.',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->telefono = $request->telefono;
    $user->password = Hash::make($request->password);
    $user->rol = 'cliente';
    $user->save();

    Auth::login($user);

    return redirect()->route('cliente.inicio');

})->name('register.store');

/*
|--------------------------------------------------------------------------
| RECUPERAR CONTRASEÑA CON SMS SIMULADO
|--------------------------------------------------------------------------
*/

Route::get('/olvidaste-contrasena', function (Request $request) {

    if (!$request->has('paso')) {
        session()->forget(['password_reset', 'reset_step']);
    }

    return view('auth.forgot-password');

})->name('password.request');

Route::post('/olvidaste-contrasena/enviar-codigo', function (Request $request) {

    session()->forget(['password_reset', 'reset_step']);

    $request->validate([
        'email' => ['required', 'email'],
    ], [
        'email.required' => 'Ingrese su correo electrónico.',
        'email.email' => 'Ingrese un correo válido.',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()
            ->withInput()
            ->withErrors([
                'email' => 'No existe una cuenta registrada con ese correo.',
            ]);
    }

    if (empty($user->telefono)) {
        return back()
            ->withInput()
            ->withErrors([
                'email' => 'Esta cuenta no tiene un número celular registrado.',
            ]);
    }

    $codigo = random_int(100000, 999999);

    session([
        'reset_step' => 'codigo',
        'password_reset' => [
            'user_id' => $user->id,
            'email' => $user->email,
            'telefono' => $user->telefono,
            'codigo' => $codigo,
            'expira' => now()->addMinutes(5)->timestamp,
            'intentos' => 0,
            'verificado' => false,
        ]
    ]);

    \Log::info('SMS SIMULADO - Código de recuperación CIVA', [
        'cliente' => $user->name,
        'correo' => $user->email,
        'telefono' => $user->telefono,
        'codigo' => $codigo,
        'vence' => now()->addMinutes(5)->format('Y-m-d H:i:s'),
    ]);

    return redirect()
        ->route('password.request', ['paso' => 'codigo'])
        ->with('status', 'Se envió un código de verificación por SMS al número celular registrado.');

})->name('password.send.code');

Route::post('/olvidaste-contrasena/verificar-codigo', function (Request $request) {

    $request->validate([
        'codigo' => ['required', 'digits:6'],
    ], [
        'codigo.required' => 'Ingrese el código de verificación.',
        'codigo.digits' => 'El código debe tener 6 dígitos.',
    ]);

    $data = session('password_reset');

    if (!$data) {
        return redirect()->route('password.request')
            ->withErrors(['email' => 'Primero debe solicitar un código.']);
    }

    if (now()->timestamp > $data['expira']) {
        session()->forget(['password_reset', 'reset_step']);

        return redirect()->route('password.request')
            ->withErrors(['email' => 'El código expiró. Solicite uno nuevo.']);
    }

    if ($data['intentos'] >= 3) {
        session()->forget(['password_reset', 'reset_step']);

        return redirect()->route('password.request')
            ->withErrors(['email' => 'Superó el número de intentos. Solicite un nuevo código.']);
    }

    if ($request->codigo != $data['codigo']) {
        $data['intentos']++;
        session(['password_reset' => $data]);

        return back()->withErrors([
            'codigo' => 'El código ingresado es incorrecto.',
        ]);
    }

    $data['verificado'] = true;

    session([
        'password_reset' => $data,
        'reset_step' => 'password',
    ]);

    return redirect()
        ->route('password.request', ['paso' => 'password'])
        ->with('status', 'Código verificado correctamente. Ahora cree su nueva contraseña.');

})->name('password.verify.code');

Route::post('/olvidaste-contrasena/cambiar', function (Request $request) {

    $request->validate([
        'password' => ['required', 'min:8', 'confirmed'],
    ], [
        'password.required' => 'Ingrese la nueva contraseña.',
        'password.min' => 'La contraseña debe tener mínimo 8 caracteres.',
        'password.confirmed' => 'Las contraseñas no coinciden.',
    ]);

    $data = session('password_reset');

    if (!$data || empty($data['verificado'])) {
        return redirect()->route('password.request')
            ->withErrors(['email' => 'Debe verificar el código antes de cambiar la contraseña.']);
    }

    $user = User::find($data['user_id']);

    if (!$user) {
        return redirect()->route('password.request')
            ->withErrors(['email' => 'Usuario no encontrado.']);
    }

    $user->password = Hash::make($request->password);
    $user->save();

    session()->forget(['password_reset', 'reset_step']);

    return redirect()->route('login')
        ->with('status', 'Contraseña actualizada correctamente. Ahora puede iniciar sesión.');

})->name('password.change');

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
| PÁGINA DEL CLIENTE
|--------------------------------------------------------------------------
*/

Route::get('/cliente', function () {

    if (!Auth::check()) {
        return redirect()->route('login');
    }

    if (Auth::user()->rol === 'admin') {
        return redirect()->route('admin.encomiendas.index');
    }

    return view('welcome');

})->name('cliente.inicio');

/*
|--------------------------------------------------------------------------
| REGISTRO DE ENVÍO DEL CLIENTE
|--------------------------------------------------------------------------
*/

Route::get('/cliente/registrar-envio', function () {

    if (!Auth::check()) {
        return redirect()->route('login');
    }

    if (Auth::user()->rol === 'admin') {
        return redirect()->route('admin.encomiendas.index');
    }

    return view('clientes.registrar-envio');

})->name('cliente.registrar.envio');

Route::post('/cliente/registrar-envio', function (Request $request) {

    if (!Auth::check()) {
        return redirect()->route('login');
    }

    if (Auth::user()->rol === 'admin') {
        return redirect()->route('admin.encomiendas.index');
    }

    $request->validate([
        'dni' => ['required', 'digits_between:8,12'],
        'destinatario' => ['required', 'string', 'max:150'],
        'origen' => ['required', 'string', 'max:100'],
        'destino' => ['required', 'string', 'max:100'],
        'descripcion' => ['required', 'string', 'max:255'],
        'pago' => ['required', 'numeric', 'min:1'],
    ], [
        'dni.required' => 'Ingrese el DNI del remitente.',
        'dni.digits_between' => 'El DNI debe tener entre 8 y 12 dígitos.',
        'destinatario.required' => 'Ingrese el nombre del destinatario.',
        'origen.required' => 'Seleccione el origen.',
        'destino.required' => 'Seleccione el destino.',
        'descripcion.required' => 'Ingrese una descripción del envío.',
        'pago.required' => 'Ingrese el monto del pago.',
        'pago.numeric' => 'El pago debe ser un número.',
    ]);

    $codigo = 'CIVA' . now()->format('Ymd') . strtoupper(Str::random(4));

    $datos = [
        'codigo' => $codigo,
        'remitente' => Auth::user()->name,
        'dni' => $request->dni,
        'destinatario' => $request->destinatario,
        'origen' => $request->origen,
        'destino' => $request->destino,
        'descripcion' => $request->descripcion,
        'fecha' => now()->toDateString(),
        'estado' => 'Registrada',
        'estado_envio' => 'Registrada',
        'pago' => $request->pago,
        'monto_pago' => $request->pago,
        'created_at' => now(),
        'updated_at' => now(),
    ];

    $datosFiltrados = [];

    foreach ($datos as $columna => $valor) {
        if (Schema::hasColumn('encomiendas', $columna)) {
            $datosFiltrados[$columna] = $valor;
        }
    }

    DB::table('encomiendas')->insert($datosFiltrados);

    return back()->with('success', 'Envío registrado correctamente. Código de seguimiento: ' . $codigo);

})->name('cliente.registrar.envio.store');

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
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

Route::get('/seguimiento', [SeguimientoController::class, 'index'])
    ->name('seguimiento');

/*
|--------------------------------------------------------------------------
| RUTAS ADMINISTRADOR
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | SI UN CLIENTE ENTRA A /registro, LO MANDAMOS A SU REGISTRO DE ENVÍO
    |--------------------------------------------------------------------------
    */

    Route::get('/registro', function () {

        if (Auth::user()->rol !== 'admin') {
            return redirect()->route('cliente.registrar.envio');
        }

        return app(EncomiendaController::class)->create();

    })->name('registro');

    Route::post('/registro', function (Request $request) {

        if (Auth::user()->rol !== 'admin') {
            return redirect()->route('cliente.registrar.envio');
        }

        return app(EncomiendaController::class)->store($request);

    })->name('registro.store');


    /*
    |--------------------------------------------------------------------------
    | RUTAS DEL ADMINISTRADOR
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/dashboard', function () {

        if (Auth::user()->rol !== 'admin') {
            return redirect()->route('cliente.inicio');
        }

        return app(DashboardController::class)->index();

    })->name('admin.dashboard');


Route::get('/admin/encomiendas', function (Request $request) {

    if (Auth::user()->rol !== 'admin') {
        return redirect()->route('cliente.inicio');
    }

    return app(EncomiendaController::class)->index($request);

})->name('admin.encomiendas.index');


    Route::get('/admin/encomiendas/{encomienda}/estado', function ($encomienda) {

        if (Auth::user()->rol !== 'admin') {
            return redirect()->route('cliente.inicio');
        }

        return app(EncomiendaController::class)->editEstado($encomienda);

    })->name('admin.encomiendas.estado');


    Route::put('/admin/encomiendas/{encomienda}/estado', function (Request $request, $encomienda) {

        if (Auth::user()->rol !== 'admin') {
            return redirect()->route('cliente.inicio');
        }

        return app(EncomiendaController::class)->updateEstado($request, $encomienda);

    })->name('admin.encomiendas.estado.update');


    Route::get('/admin/encomiendas/{encomienda}/pdf', function ($encomienda) {

        if (Auth::user()->rol !== 'admin') {
            return redirect()->route('cliente.inicio');
        }

        return app(EncomiendaController::class)->pdf($encomienda);

    })->name('admin.encomiendas.pdf');


    /*
    |--------------------------------------------------------------------------
    | PERFIL / MI CUENTA
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/perfil', function () {

        if (Auth::user()->rol !== 'admin') {
            return redirect()->route('cliente.inicio');
        }

        return view('admin.perfil');

    })->name('admin.perfil');


    Route::put('/admin/perfil/datos', function (Request $request) {

        if (Auth::user()->rol !== 'admin') {
            return redirect()->route('cliente.inicio');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
        ]);

        $request->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Datos de la cuenta actualizados correctamente.');

    })->name('admin.perfil.datos');


    Route::put('/admin/perfil/password', function (Request $request) {

        if (Auth::user()->rol !== 'admin') {
            return redirect()->route('cliente.inicio');
        }

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
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

    Route::get('/admin/reportes', function () {

        if (Auth::user()->rol !== 'admin') {
            return redirect()->route('cliente.inicio');
        }

        return app(ReporteController::class)->index();

    })->name('admin.reportes');


    Route::get('/admin/reportes/general/excel', function () {

        if (Auth::user()->rol !== 'admin') {
            return redirect()->route('cliente.inicio');
        }

        return app(ReporteController::class)->generalExcel();

    })->name('admin.reportes.general.excel');

});
/*
|--------------------------------------------------------------------------
| CLIENTES - ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/clientes', [ClienteController::class, 'index'])
    ->name('admin.clientes.index');

Route::get('/admin/clientes/crear', [ClienteController::class, 'create'])
    ->name('clientes.create');

Route::post('/admin/clientes', [ClienteController::class, 'store'])
    ->name('clientes.store');

Route::get('/admin/clientes/{cliente}/editar', [ClienteController::class, 'edit'])
    ->name('clientes.edit');

Route::put('/admin/clientes/{cliente}', [ClienteController::class, 'update'])
    ->name('clientes.update');

Route::delete('/admin/clientes/{cliente}', [ClienteController::class, 'destroy'])
    ->name('clientes.destroy');


/*
|--------------------------------------------------------------------------
| VISTA CLIENTE DESDE ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/vista-cliente', function () {

    if (Auth::user()->rol !== 'admin') {
        return redirect()->route('cliente.inicio');
    }

    return view('welcome');

})->name('admin.vista.cliente');