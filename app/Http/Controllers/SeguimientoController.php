<?php

namespace App\Http\Controllers;

use App\Models\Encomienda;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    public function index(Request $request)
    {
        $codigo = $request->get('codigo');

        $encomienda = null;

        if ($codigo) {
            $encomienda = Encomienda::with([
                'cliente',
                'seguimientos'
            ])
            ->where('codigo_seguimiento', $codigo)
            ->first();
        }

        return view('seguimiento', compact('encomienda', 'codigo'));
    }
}