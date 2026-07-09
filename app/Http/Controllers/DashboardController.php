<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Encomienda;
use App\Models\Pago;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEncomiendas = Encomienda::count();

        $registradas = Encomienda::where('estado', 'Registrado')->count();

        $enTransito = Encomienda::where('estado', 'En tránsito')->count();

        $entregadas = Encomienda::where('estado', 'Entregado')->count();

        $observadas = Encomienda::where('estado', 'Observado')->count();

        $totalIngresos = Pago::where('estado_pago', 'Pagado')->sum('monto');

        $pagosPendientes = Pago::where('estado_pago', 'Pendiente')->count();

        $totalClientes = Cliente::count();

        $ultimasEncomiendas = Encomienda::with(['cliente', 'pago'])
            ->latest('id')
            ->take(6)
            ->get();

        return view('admin.dashboard', compact(
            'totalEncomiendas',
            'registradas',
            'enTransito',
            'entregadas',
            'observadas',
            'totalIngresos',
            'pagosPendientes',
            'totalClientes',
            'ultimasEncomiendas'
        ));
    }
}