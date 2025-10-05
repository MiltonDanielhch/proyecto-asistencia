<?php

namespace Database\Seeders;

use App\Models\TipoIncidencia;
use Illuminate\Database\Seeder;

class TiposIncidenciaSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['nombre' => 'Tardanza',               'descripcion' => 'Llegada después del horario permitido'],
            ['nombre' => 'Falta injustificada',    'descripcion' => 'No se presentó a trabajar sin causa justificada'],
            ['nombre' => 'Falta justificada',      'descripcion' => 'Inasistencia autorizada (personal o médica)'],
            ['nombre' => 'Permiso con goce',       'descripcion' => 'Salida o ausencia con sueldo'],
            ['nombre' => 'Permiso sin goce',       'descripcion' => 'Salida o ausencia sin sueldo'],
            ['nombre' => 'Vacaciones',             'descripcion' => 'Periodo de descanso anual'],
            ['nombre' => 'Descanso médico',        'descripcion' => 'Incapacidad temporal (CNS o particular)'],
            ['nombre' => 'Licencia maternidad',    'descripcion' => 'Periodo post-parto (90 días Bolivia)'],
            ['nombre' => 'Licencia paternidad',    'descripcion' => '3 días hábiles después del parto'],
            ['nombre' => 'Comisión oficial',       'descripcion' => 'Tareas fuera de la oficina por encargo empresarial'],
            ['nombre' => 'Suspensión',             'descripcion' => 'Sanción disciplinaria sin goce'],
        ];

        foreach ($items as $item) {
            TipoIncidencia::firstOrCreate(
                ['nombre' => $item['nombre']], // clave única
                $item                         // resto de campos
            );
        }
    }
}
