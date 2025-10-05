<?php

namespace Database\Seeders;

use App\Models\LogSistema;
use App\Models\User;
use Illuminate\Database\Seeder;

class LogsSistemaSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::find(1);

        LogSistema::create([
            'accion'          => 'INICIO_SESION',
            'descripcion'     => 'Usuario administrador ingresó al sistema',
            'datos_antes'     => null,
            'datos_despues'   => ['user' => $admin->only('id', 'name', 'email')],
            'tabla_afectada'  => 'users',
            'usuario_id'      => $admin->id,
            'empresa_id'      => null,
            'ip_address'      => '127.0.0.1',
            'user_agent'      => 'Seeder/CLI',
            'created_at'      => now()->subDays(3),
        ]);

        LogSistema::create([
            'accion'          => 'SINCRONIZAR_DISPOSITIVO',
            'descripcion'     => 'Descarga de logs ZKTeco Trinidad (192.168.1.201)',
            'datos_antes'     => ['ultimo_user_id' => 0],
            'datos_despues'   => ['ultimo_user_id' => 8, 'registros_nuevos' => 32],
            'tabla_afectada'  => 'dispositivos',
            'usuario_id'      => $admin->id,
            'empresa_id'      => 1,
            'ip_address'      => '127.0.0.1',
            'user_agent'      => 'FastAPI-Scheduler',
            'created_at'      => now()->subDays(1),
        ]);

        LogSistema::create([
            'accion'          => 'APROBAR_INCIDENCIA',
            'descripcion'     => 'Incidencia #3 aprobada por RRHH',
            'datos_antes'     => ['estado' => 'pendiente'],
            'datos_despues'   => ['estado' => 'aprobado'],
            'tabla_afectada'  => 'incidencias',
            'usuario_id'      => $admin->id,
            'empresa_id'      => 1,
            'ip_address'      => '192.168.1.100',
            'user_agent'      => 'Mozilla/5.0 (Voyager)',
            'created_at'      => now()->subHours(4),
        ]);
    }
}
