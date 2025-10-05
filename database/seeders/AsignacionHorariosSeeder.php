<?php

namespace Database\Seeders;

use App\Models\AsignacionHorario;
use App\Models\Empleado;
use App\Models\Horario;
use Illuminate\Database\Seeder;

class AsignacionHorariosSeeder extends Seeder
{
    public function run(): void
    {
        /* ----------------------------------------------------------
         * Horarios disponibles por empresa
         * ---------------------------------------------------------- */
        $horariosEcoBeni   = Horario::where('empresa_id', 1)->get();
        $horariosAmzGlobal = Horario::where('empresa_id', 2)->get();

        /* ----------------------------------------------------------
         * Empleados activos
         * ---------------------------------------------------------- */
        $empleados = Empleado::where('estado', 'activo')->get();

        foreach ($empleados as $emp) {
            $horario = $emp->empresa_id === 1
                ? $horariosEcoBeni->random()
                : $horariosAmzGlobal->random();

            AsignacionHorario::create([
                'empleado_id'  => $emp->id,
                'horario_id'   => $horario->id,
                'fecha_inicio' => now()->subDays(7)->toDateString(), // vigente desde hace 1 semana
                'fecha_fin'    => null,                              // indefinido
                'activo'       => true,
            ]);
        }
    }
}
