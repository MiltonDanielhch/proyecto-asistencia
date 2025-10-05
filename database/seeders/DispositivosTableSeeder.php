<?php

namespace Database\Seeders;

use App\Models\Dispositivo;
use Illuminate\Database\Seeder;

class DispositivosTableSeeder extends Seeder
{
    public function run(): void
    {
        $dispositivos = [
            /* ----------------------------------------------------------
             * SUCURSAL 1 – Trinidad – Casa Matriz
             * ---------------------------------------------------------- */
            [
                'sucursal_id'      => 1,
                'nombre_dispositivo' => 'ZK-Entrada-Principal',
                'tipo'             => 'huella_facial',
                'numero_serie'     => 'ZK-BEN-2024-001',
                'direccion_ip'     => '192.168.1.201',
                'puerto'           => 4370,
                'password'         => 0,
                'ubicacion'        => 'Portón principal – Trinidad',
                'estado'           => 'activo',
                'ultima_conexion'  => now(),
                'version_firmware' => 'Ver 6.60 Apr 28 2023',
                'creado_por'       => 1,
                'ultimo_user_id'   => 0,
            ],
            [
                'sucursal_id'      => 1,
                'nombre_dispositivo' => 'ZK-Comedor',
                'tipo'             => 'huella',
                'numero_serie'     => 'ZK-BEN-2024-002',
                'direccion_ip'     => '192.168.1.202',
                'puerto'           => 4370,
                'password'         => 0,
                'ubicacion'        => 'Acceso comedor – Trinidad',
                'estado'           => 'activo',
                'ultima_conexion'  => now(),
                'version_firmware' => 'Ver 6.60 Apr 28 2023',
                'creado_por'       => 1,
                'ultimo_user_id'   => 0,
            ],

            /* ----------------------------------------------------------
             * SUCURSAL 2 – Riberalta – Planta
             * ---------------------------------------------------------- */
            [
                'sucursal_id'      => 2,
                'nombre_dispositivo' => 'ZK-Planta-Riberalta',
                'tipo'             => 'huella_facial',
                'numero_serie'     => 'ZK-BEN-2024-003',
                'direccion_ip'     => '192.168.2.201',
                'puerto'           => 4370,
                'password'         => 0,
                'ubicacion'        => 'Ingreso planta – Riberalta',
                'estado'           => 'activo',
                'ultima_conexion'  => now(),
                'version_firmware' => 'Ver 6.60 Apr 28 2023',
                'creado_por'       => 1,
                'ultimo_user_id'   => 0,
            ],

            /* ----------------------------------------------------------
             * SUCURSAL 3 – Guayaramerín – Puerto Interior
             * ---------------------------------------------------------- */
            [
                'sucursal_id'      => 3,
                'nombre_dispositivo' => 'ZK-Puerto-Guayaramerín',
                'tipo'             => 'facial',
                'numero_serie'     => 'ZK-BEN-2024-004',
                'direccion_ip'     => '192.168.3.201',
                'puerto'           => 4370,
                'password'         => 0,
                'ubicacion'        => 'Acceso muelle – Guayaramerín',
                'estado'           => 'activo',
                'ultima_conexion'  => now(),
                'version_firmware' => 'Ver 6.60 Apr 28 2023',
                'creado_por'       => 1,
                'ultimo_user_id'   => 0,
            ],

            /* ----------------------------------------------------------
             * SUCURSAL 4 – Santa Cruz – Comercial
             * ---------------------------------------------------------- */
            [
                'sucursal_id'      => 4,
                'nombre_dispositivo' => 'ZK-Recepción-SCZ',
                'tipo'             => 'huella',
                'numero_serie'     => 'ZK-SCZ-2024-001',
                'direccion_ip'     => '192.168.4.201',
                'puerto'           => 4370,
                'password'         => 0,
                'ubicacion'        => 'Recepción HQ – Santa Cruz',
                'estado'           => 'activo',
                'ultima_conexion'  => now(),
                'version_firmware' => 'Ver 6.60 Apr 28 2023',
                'creado_por'       => 1,
                'ultimo_user_id'   => 0,
            ],

            /* ----------------------------------------------------------
             * SUCURSAL 5 – La Paz – Administración Central
             * ---------------------------------------------------------- */
            [
                'sucursal_id'      => 5,
                'nombre_dispositivo' => 'ZK-LaPaz-Admin',
                'tipo'             => 'huella_facial',
                'numero_serie'     => 'ZK-LPZ-2024-001',
                'direccion_ip'     => '192.168.5.201',
                'puerto'           => 4370,
                'password'         => 0,
                'ubicacion'        => 'Piso 3 – Oficina Central, La Paz',
                'estado'           => 'activo',
                'ultima_conexion'  => now(),
                'version_firmware' => 'Ver 6.60 Apr 28 2023',
                'creado_por'       => 1,
                'ultimo_user_id'   => 0,
            ],
        ];

        foreach ($dispositivos as $d) {
            Dispositivo::firstOrCreate(
                ['numero_serie' => $d['numero_serie']], // clave única
                $d                                        // resto de campos
            );
        }
    }
}
