<?php

namespace Database\Seeders;

use App\Models\DispositivoEmpleado;
use App\Models\Empleado;
use App\Models\Dispositivo;
use Illuminate\Database\Seeder;

class DispositivoEmpleadoSeeder extends Seeder
{
    public function run(): void
    {
        /* ----------------------------------------------------------
         * Asignamos 2-3 empleados por dispositivo (zk_user_id 1..N)
         * ---------------------------------------------------------- */

        // TRINIDAD – Dispositivos 1 y 2
        $this->asignar(1, [1, 2]);   // zk_user_id 1,2
        $this->asignar(2, [3, 4]);   // zk_user_id 3,4

        // RIIBERALTA – Dispositivo 3
        $this->asignar(3, [5]);      // zk_user_id 5

        // GUAYARAMERÍN – Dispositivo 4
        $this->asignar(4, [6]);      // zk_user_id 6

        // SANTA CRUZ – Dispositivo 5
        $this->asignar(5, [7]);      // zk_user_id 7

        // LA PAZ – Dispositivo 6
        $this->asignar(6, [8]);      // zk_user_id 8
    }

    /* ------------------------------------------------------------------
     * Helper: crea el registro y asigna zk_user_id secuencial
     * ------------------------------------------------------------------ */
    private function asignar(int $dispositivoId, array $empleadosIds): void
    {
        static $zkUserId = 1; // ID interno del reloj

        foreach ($empleadosIds as $empId) {
            DispositivoEmpleado::create([
                'empleado_id'           => $empId,
                'dispositivo_id'        => $dispositivoId,
                'zk_user_id'            => $zkUserId,
                'privilegio'            => 'usuario',
                'tarjeta_id'            => null,
                'estado'                => 'activo',
                'estado_sincronizacion' => 'pendiente',
                'ultima_sincronizacion' => null,
            ]);
            $zkUserId++;
        }
    }
}
