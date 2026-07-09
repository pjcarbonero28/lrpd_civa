<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Encomienda;
use App\Models\Pago;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function index()
    {
        $totalEncomiendas = Encomienda::count();
        $totalClientes = Cliente::count();

        $registradas = Encomienda::where('estado', 'Registrado')->count();
        $enTransito = Encomienda::where('estado', 'En tránsito')->count();
        $entregadas = Encomienda::where('estado', 'Entregado')->count();
        $observadas = Encomienda::where('estado', 'Observado')->count();

        $totalPagado = Pago::where('estado_pago', 'Pagado')->sum('monto');
        $totalPendiente = Pago::where('estado_pago', 'Pendiente')->sum('monto');
        $pagosPendientes = Pago::where('estado_pago', 'Pendiente')->count();

        return view('admin.reportes', compact(
            'totalEncomiendas',
            'totalClientes',
            'registradas',
            'enTransito',
            'entregadas',
            'observadas',
            'totalPagado',
            'totalPendiente',
            'pagosPendientes'
        ));
    }

    public function generalExcel()
    {
        $resumen = [
            'total_encomiendas' => Encomienda::count(),
            'total_clientes' => Cliente::count(),
            'registradas' => Encomienda::where('estado', 'Registrado')->count(),
            'en_transito' => Encomienda::where('estado', 'En tránsito')->count(),
            'entregadas' => Encomienda::where('estado', 'Entregado')->count(),
            'observadas' => Encomienda::where('estado', 'Observado')->count(),
            'total_pagado' => Pago::where('estado_pago', 'Pagado')->sum('monto'),
            'total_pendiente' => Pago::where('estado_pago', 'Pendiente')->sum('monto'),
            'pagos_pendientes' => Pago::where('estado_pago', 'Pendiente')->count(),
        ];

        $encomiendas = Encomienda::with(['cliente', 'pago'])
            ->latest('id')
            ->get();

        $clientes = Cliente::latest('id')
            ->get();

        $pagos = DB::table('pagos')
            ->leftJoin('encomiendas', 'pagos.encomienda_id', '=', 'encomiendas.id')
            ->select(
                'pagos.id',
                'pagos.monto',
                'pagos.metodo_pago',
                'pagos.estado_pago',
                'pagos.fecha_pago',
                'pagos.created_at',
                'encomiendas.codigo_seguimiento'
            )
            ->orderByDesc('pagos.id')
            ->get();

        $seguimientos = DB::table('seguimientos')
            ->leftJoin('encomiendas', 'seguimientos.encomienda_id', '=', 'encomiendas.id')
            ->select(
                'seguimientos.id',
                'seguimientos.estado',
                'seguimientos.ubicacion',
                'seguimientos.observacion',
                'seguimientos.fecha_actualizacion',
                'encomiendas.codigo_seguimiento'
            )
            ->orderByDesc('seguimientos.fecha_actualizacion')
            ->get();

        $html = view('admin.reportes_excel', compact(
            'resumen',
            'encomiendas',
            'clientes',
            'pagos',
            'seguimientos'
        ))->render();

        $nombreArchivo = 'reporte_general_civacargo_' . now()->format('Ymd_His') . '.xls';

        return response($html)
            ->header('Content-Type', 'application/vnd.ms-excel; charset=UTF-8')
            ->header('Content-Disposition', 'attachment; filename="' . $nombreArchivo . '"')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }
}