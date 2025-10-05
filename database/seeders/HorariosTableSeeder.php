<?php

namespace Database\Seeders;

use App\Models\Horario;
use Illuminate\Database\Seeder;

class HorariosTableSeeder extends Seeder
{
    public function run(): void
    {
        /* ----------------------------------------------------------
         * EMPRESA 1 – EcoBeni S.R.L. (Bolivia – zona America/La_Paz)
         * ---------------------------------------------------------- */
        Horario::create([
            'empresa_id'             => 1,
            'nombre_horario'         => 'Jornada Completa Beni',
            'hora_entrada'           => '07:45:00',
            'hora_salida'            => '17:30:00',
            'hora_entrada_almuerzo'  => '12:00:00',
            'hora_salida_almuerzo'   => '13:00:00',
            'tolerancia_entrada'     => 10,
            'tolerancia_salida'      => 5,
            'dias_laborales'         => ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'],
            'flexible'               => false,
            'nocturno'               => false,
            'creado_por'             => 1,
        ]);

        Horario::create([
            'empresa_id'             => 1,
            'nombre_horario'         => 'Turno Noche Puerto',
            'hora_entrada'           => '19:00:00',
            'hora_salida'            => '07:00:00',  // 12 h nocturnas
            'hora_entrada_almuerzo'  => null,
            'hora_salida_almuerzo'   => null,
            'tolerancia_entrada'     => 5,
            'tolerancia_salida'      => 5,
            'dias_laborales'         => ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            'flexible'               => false,
            'nocturno'               => true,
            'creado_por'             => 1,
        ]);

        /* ----------------------------------------------------------
         * EMPRESA 2 – Amazonía Global S.R.L.
         * ---------------------------------------------------------- */
        Horario::create([
            'empresa_id'             => 2,
            'nombre_horario'         => 'Horario Flexible SCZ',
            'hora_entrada'           => '08:00:00',
            'hora_salida'            => '18:00:00',
            'hora_entrada_almuerzo'  => '12:30:00',
            'hora_salida_almuerzo'   => '13:30:00',
            'tolerancia_entrada'     => 30,
            'tolerancia_salida'      => 10,
            'dias_laborales'         => ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'],
            'flexible'               => true,
            'nocturno'               => false,
            'creado_por'             => 1,
        ]);
    }
}
