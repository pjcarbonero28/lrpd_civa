<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Encomienda;
use App\Models\Seguimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class EncomiendaController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->get('busqueda');

        $encomiendas = Encomienda::with(['cliente', 'seguimientos'])
            ->when($busqueda, function ($query) use ($busqueda) {
                $query->where('codigo_seguimiento', 'LIKE', "%{$busqueda}%")
                    ->orWhere('nombre_destinatario', 'LIKE', "%{$busqueda}%")
                    ->orWhereHas('cliente', function ($q) use ($busqueda) {
                        $q->where('nombre', 'LIKE', "%{$busqueda}%")
                          ->orWhere('dni', 'LIKE', "%{$busqueda}%");
                    });
            })
            ->latest('id')
            ->paginate(10);

        return view('admin.encomiendas.index', compact('encomiendas', 'busqueda'));
    }

    public function editEstado(Encomienda $encomienda)
    {
        $encomienda->load(['cliente', 'seguimientos']);

        return view('admin.encomiendas.estado', compact('encomienda'));
    }

    public function updateEstado(Request $request, Encomienda $encomienda)
    {
        $data = $request->validate([
            'estado' => ['required', 'in:Registrado,En tránsito,Entregado,Observado'],
            'ubicacion' => ['required', 'string', 'max:150'],
            'observacion' => ['nullable', 'string', 'max:255'],
        ]);

        DB::transaction(function () use ($data, $encomienda) {
            $encomienda->update([
                'estado' => $data['estado'],
            ]);

            Seguimiento::create([
                'encomienda_id' => $encomienda->id,
                'estado' => $data['estado'],
                'ubicacion' => $data['ubicacion'],
                'observacion' => $data['observacion'] ?? 'Estado actualizado por el encargado.',
                'fecha_actualizacion' => now(),
            ]);
        });

        return redirect()
            ->route('admin.encomiendas.index')
            ->with('success', 'Estado de encomienda actualizado correctamente.');
    }

    public function create()
    {
        return view('registro');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fecha_envio' => ['required', 'date'],

            'nombre_remitente' => ['required', 'string', 'max:150'],
            'dni_remitente' => ['required', 'string', 'max:15'],
            'telefono_remitente' => ['required', 'string', 'max:20'],

            'nombre_destinatario' => ['required', 'string', 'max:150'],
            'dni_destinatario' => ['required', 'string', 'max:15'],
            'telefono_destinatario' => ['required', 'string', 'max:20'],

            'origen' => ['required', 'string', 'max:100'],
            'destino' => ['required', 'string', 'max:100'],
            'tipo_paquete' => ['required', 'string', 'max:80'],
            'peso' => ['required', 'numeric', 'min:0.1'],
            'descripcion' => ['nullable', 'string', 'max:255'],
        ]);

        $encomienda = DB::transaction(function () use ($data) {
            $cliente = Cliente::updateOrCreate(
                ['dni' => $data['dni_remitente']],
                [
                    'nombre' => $data['nombre_remitente'],
                    'telefono' => $data['telefono_remitente'],
                    'correo' => $data['dni_remitente'] . '@civa.local',
                    'direccion' => 'No registrada',
                ]
            );

            $codigo = 'ENC-' . now()->format('Ymd') . '-' . strtoupper(substr(uniqid(), -5));

            $encomienda = Encomienda::create([
                'cliente_id' => $cliente->id,
                'codigo_seguimiento' => $codigo,
                'fecha_envio' => $data['fecha_envio'],
                'origen' => $data['origen'],
                'destino' => $data['destino'],
                'peso' => $data['peso'],
                'descripcion' => $data['descripcion'] ?? $data['tipo_paquete'],
                'estado' => 'Registrado',
                'nombre_destinatario' => $data['nombre_destinatario'],
                'dni_destinatario' => $data['dni_destinatario'],
                'telefono_destinatario' => $data['telefono_destinatario'],
                'tipo_paquete' => $data['tipo_paquete'],
            ]);

            Seguimiento::create([
                'encomienda_id' => $encomienda->id,
                'estado' => 'Registrado',
                'ubicacion' => $data['origen'],
                'observacion' => 'La encomienda fue registrada correctamente en agencia.',
                'fecha_actualizacion' => now(),
            ]);

            return $encomienda;
        });

        return redirect()
            ->route('registro')
            ->with('success', 'Encomienda registrada correctamente.')
            ->with('codigo', $encomienda->codigo_seguimiento)
            ->with('encomienda_id', $encomienda->id);
    }

    public function pdf(Encomienda $encomienda)
    {
        $encomienda->load(['cliente', 'seguimientos']);

        $pdf = Pdf::loadView('admin.encomiendas.pdf', compact('encomienda'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('constancia-' . $encomienda->codigo_seguimiento . '.pdf');
    }
}