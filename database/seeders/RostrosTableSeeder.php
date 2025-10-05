<?php

namespace Database\Seeders;

use App\Models\Rostro;
use App\Models\DispositivoEmpleado;
use Illuminate\Database\Seeder;

class RostrosTableSeeder extends Seeder
{
    public function run(): void
    {
        /* ----------------------------------------------------------
         * Un solo template facial por cada vínculo activo
         * ---------------------------------------------------------- */
        $asignaciones = DispositivoEmpleado::where('estado', 'activo')->get();

        foreach ($asignaciones as $asig) {
            /* 1 KB de datos aleatorios simula template ZK facial */
            $fakeTemplate = \Str::random(1024);

            Rostro::create([
                'empleado_id'      => $asig->empleado_id,
                'zk_user_id'       => $asig->zk_user_id,
                'template_rostro'  => $fakeTemplate,
                'foto_rostro'      => null, // se puede llenar después
                'calidad'          => 'media',
                'estado'           => 'activo',
            ]);
        }
    }
}
