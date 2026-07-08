<?php

namespace App\Http\Controllers;

use App\Models\Encomienda;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEncomiendas = Encomienda::count();

        $registradas = Encomienda::where('estado', 'Registrado')->count();
        $enTransito = Encomienda::where('estado', 'En tránsito')->count();
        $entregadas = Encomienda::where('estado', 'Entregado')->count();
        $observadas = Encomienda::where('estado', 'Observado')->count();

        $ultimasEncomiendas = Encomienda::with('cliente')
            ->latest('id')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalEncomiendas',
            'registradas',
            'enTransito',
            'entregadas',
            'observadas',
            'ultimasEncomiendas'
        ));
    }
}