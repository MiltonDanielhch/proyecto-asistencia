<?php

namespace Database\Seeders;

use App\Models\RegistroAsistencia;
use App\Models\Empleado;
use App\Models\Dispositivo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RegistrosAsistenciaSeeder extends Seeder
{
    public function run(): void
    {
        $empleados  = Empleado::where('estado', 'activo')->get();
        $dispositivos = Dispositivo::where('estado', 'activo')->get();
        $hoy = Carbon::now()->startOfDay();

        foreach ($empleados as $emp) {
            // 7 días hacia atrás
            foreach (range(0, 6) as $diasAtras) {
                $fecha = $hoy->copy()->subDays($diasAtras);

                /* --------------------------------------------------
                 * Entrada mañana
                 * -------------------------------------------------- */
                $entrada = $fecha->copy()->setTimeFromTimeString('07:45');
                RegistroAsistencia::create([
                    'empleado_id'            => $emp->id,
                    'dispositivo_id'         => $dispositivos->random()->id,
                    'tipo_marcaje'           => 'entrada',
                    'fecha_local'            => $fecha->toDateString(),
                    'hora_local'             => $entrada->format('H:i'),
                    'fecha_hora'             => $entrada,
                    'tipo_verificacion'      => 'huella',
                    'latitud'                => -14.8333,
                    'longitud'               => -64.9000,
                    'precision_ubicacion'    => 5.50,
                    'confianza_verificacion' => 96.30,
                    'procesado'              => false,
                    'incidencia_id'          => null,
                    'estado_validacion'      => 'pendiente',
                    'observaciones'          => null,
                ]);

                /* --------------------------------------------------
                 * Salida almuerzo
                 * -------------------------------------------------- */
                $salidaA = $fecha->copy()->setTimeFromTimeString('12:00');
                RegistroAsistencia::create([
                    'empleado_id'            => $emp->id,
                    'dispositivo_id'         => $dispositivos->random()->id,
                    'tipo_marcaje'           => 'salida_almuerzo',
                    'fecha_local'            => $fecha->toDateString(),
                    'hora_local'             => $salidaA->format('H:i'),
                    'fecha_hora'             => $salidaA,
                    'tipo_verificacion'      => 'rostro',
                    'latitud'                => null,
                    'longitud'               => null,
                    'precision_ubicacion'    => null,
                    'confianza_verificacion' => 94.10,
                    'procesado'              => false,
                    'incidencia_id'          => null,
                    'estado_validacion'      => 'pendiente',
                    'observaciones'          => null,
                ]);

                /* --------------------------------------------------
                 * Entrada tarde
                 * -------------------------------------------------- */
                $entradaT = $fecha->copy()->setTimeFromTimeString('13:05');
                RegistroAsistencia::create([
                    'empleado_id'            => $emp->id,
                    'dispositivo_id'         => $dispositivos->random()->id,
                    'tipo_marcaje'           => 'entrada_almuerzo',
                    'fecha_local'            => $fecha->toDateString(),
                    'hora_local'             => $entradaT->format('H:i'),
                    'fecha_hora'             => $entradaT,
                    'tipo_verificacion'      => 'huella',
                    'latitud'                => null,
                    'longitud'               => null,
                    'precision_ubicacion'    => null,
                    'confianza_verificacion' => 97.20,
                    'procesado'              => false,
                    'incidencia_id'          => null,
                    'estado_validacion'      => 'pendiente',
                    'observaciones'          => null,
                ]);

                /* --------------------------------------------------
                 * Salida día
                 * -------------------------------------------------- */
                $salida = $fecha->copy()->setTimeFromTimeString('17:30');
                RegistroAsistencia::create([
                    'empleado_id'            => $emp->id,
                    'dispositivo_id'         => $dispositivos->random()->id,
                    'tipo_marcaje'           => 'salida',
                    'fecha_local'            => $fecha->toDateString(),
                    'hora_local'             => $salida->format('H:i'),
                    'fecha_hora'             => $salida,
                    'tipo_verificacion'      => 'huella',
                    'latitud'                => -14.8333,
                    'longitud'               => -64.9000,
                    'precision_ubicacion'    => 4.80,
                    'confianza_verificacion' => 95.40,
                    'procesado'              => false,
                    'incidencia_id'          => null,
                    'estado_validacion'      => 'pendiente',
                    'observaciones'          => null,
                ]);
            }
        }
    }
}
