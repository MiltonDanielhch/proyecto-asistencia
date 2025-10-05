<?php

namespace Database\Seeders;

use App\Models\Incidencia;
use App\Models\Empleado;
use App\Models\TipoIncidencia;
use Illuminate\Database\Seeder;

class IncidenciasTableSeeder extends Seeder
{
    public function run(): void
    {
        $empleados = Empleado::where('estado', 'activo')->limit(6)->get();
        $tipos     = TipoIncidencia::pluck('id');

        // 1. Incidencias pendientes
        foreach ($empleados->take(3) as $emp) {
            Incidencia::create([
                'empleado_id'        => $emp->id,
                'tipo_incidencia_id' => $tipos->random(),
                'fecha_incidencia'   => now()->subDays(3),
                'hora_incidencia'    => '08:45',
                'motivo'             => 'Tardanza por lluvia intensa – Trinidad',
                'observaciones'      => 'Se presentó 45 min después del horario',
                'evidencia'          => null,
                'estado'             => 'pendiente',
                'aprobado_por'       => null,
                'aprobado_en'        => null,
                'creado_por'         => 1,
            ]);
        }

        // 2. Incidencias ya aprobadas
        foreach ($empleados->skip(3)->take(3) as $emp) {
            Incidencia::create([
                'empleado_id'        => $emp->id,
                'tipo_incidencia_id' => $tipos->random(),
                'fecha_incidencia'   => now()->subDays(5),
                'hora_incidencia'    => null,
                'motivo'             => 'Permiso médico COVID-19',
                'observaciones'      => 'Adjuntado certificado de salud',
                'evidencia'          => 'covid-19-4578923.pdf',
                'estado'             => 'aprobado',
                'aprobado_por'       => 1,
                'aprobado_en'        => now()->subDays(4),
                'creado_por'         => 1,
            ]);
        }
    }
}
