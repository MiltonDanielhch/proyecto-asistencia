<?php

namespace Database\Seeders;

use App\Models\ReporteAsistencia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ReportesAsistenciaSeeder extends Seeder
{
    public function run(): void
    {
        /* ----------------------------------------------------------
         * 1. Reporte COMPLETADO (ejemplo descargable)
         * ---------------------------------------------------------- */
        $path = 'reportes/asistencia/ecobeni_semana_38_2024.xlsx';
        Storage::disk('public')->put($path, ''); // archivo vacío de prueba

        ReporteAsistencia::create([
            'empresa_id'     => 1,
            'nombre_reporte' => 'Semana 38 – EcoBeni',
            'fecha_inicio'   => now()->startOfWeek()->subWeek(),
            'fecha_fin'      => now()->startOfWeek()->subWeek()->endOfWeek(),
            'tipo'           => 'semanal',
            'filtros'        => ['sucursales' => [1, 2], 'departamentos' => [1, 2, 3]],
            'generado_por'   => 1,
            'archivo_path'   => $path,
            'estado'         => 'completado',
        ]);

        /* ----------------------------------------------------------
         * 2 y 3. Reportes en PROCESO
         * ---------------------------------------------------------- */
        ReporteAsistencia::create([
            'empresa_id'     => 1,
            'nombre_reporte' => 'Septiembre 2025 – EcoBeni (procesando)',
            'fecha_inicio'   => now()->startOfMonth(),
            'fecha_fin'      => now()->endOfMonth(),
            'tipo'           => 'mensual',
            'filtros'        => null,
            'generado_por'   => 1,
            'archivo_path'   => null,
            'estado'         => 'procesando',
        ]);

        ReporteAsistencia::create([
            'empresa_id'     => 2,
            'nombre_reporte' => 'Rango personalizado – Amazonía Global',
            'fecha_inicio'   => now()->subDays(15),
            'fecha_fin'      => now()->subDays(5),
            'tipo'           => 'custom',
            'filtros'        => ['empleados' => [7, 8]],
            'generado_por'   => 1,
            'archivo_path'   => null,
            'estado'         => 'procesando',
        ]);
    }
}
