<?php

namespace Database\Seeders;

use App\Models\Huella;
use Illuminate\Database\Seeder;

class HuellasTableSeeder extends Seeder
{
    public function run(): void
    {
        // Limpiar tabla (solo desarrollo)
        Huella::query()->delete();

        $huellas = [
            // Empleado 1 – 3 dedos (usando números estándar 1, 2, 3)
            [
                'empleado_id' => 1,
                'zk_user_id' => 1,
                'template_huella' => $this->fakeTemplate(),
                'numero_dedo' => 1,
                'calidad' => 'alta',
                'formato_template' => 'zk'
            ],
            [
                'empleado_id' => 1,
                'zk_user_id' => 1,
                'template_huella' => $this->fakeTemplate(),
                'numero_dedo' => 2,
                'calidad' => 'media',
                'formato_template' => 'zk'
            ],
            [
                'empleado_id' => 1,
                'zk_user_id' => 1,
                'template_huella' => $this->fakeTemplate(),
                'numero_dedo' => 3,
                'calidad' => 'alta',
                'formato_template' => 'zk'
            ],

            // Empleado 2 – 2 dedos
            [
                'empleado_id' => 2,
                'zk_user_id' => 2,
                'template_huella' => $this->fakeTemplate(),
                'numero_dedo' => 1,
                'calidad' => 'alta',
                'formato_template' => 'zk'
            ],
            [
                'empleado_id' => 2,
                'zk_user_id' => 2,
                'template_huella' => $this->fakeTemplate(),
                'numero_dedo' => 2,
                'calidad' => 'media',
                'formato_template' => 'zk'
            ],

            // Empleado 3 – 1 dedo
            [
                'empleado_id' => 3,
                'zk_user_id' => 3,
                'template_huella' => $this->fakeTemplate(),
                'numero_dedo' => 1,
                'calidad' => 'alta',
                'formato_template' => 'zk'
            ],
        ];

        foreach ($huellas as $huella) {
            Huella::create($huella);
        }

        $this->command->info('Huellas creadas: ' . count($huellas));
    }

    /**
     * Genera un template de huella fake más realista
     */
    private function fakeTemplate(): string
    {
        // Simula un template biométrico más realista
        $template = random_bytes(512); // 512 bytes de datos binarios aleatorios
        return $template;
    }
}
