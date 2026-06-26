<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Encomienda;
use App\Models\Pago;
use App\Models\Seguimiento;

class DashboardController extends Controller
{
    public function index()
    {
        $totalClientes = Cliente::count();
        $totalEncomiendas = Encomienda::count();
       $enTransito = Encomienda::where('estado', 'En tránsito')->count();
        $totalSeguimientos = Seguimiento::count();

        $encomiendasRecientes = Encomienda::with('cliente')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalClientes',
            'totalEncomiendas',
            'enTransito',
            'totalSeguimientos',
            'encomiendasRecientes'
        ));
    }
}