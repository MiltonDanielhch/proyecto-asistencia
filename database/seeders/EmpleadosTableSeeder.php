<?php

namespace Database\Seeders;

use App\Models\Empleado;
use App\Models\Departamento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmpleadosTableSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener departamentos creados previamente
        $deptos = Departamento::pluck('id')->toArray();

        if (empty($deptos)) {
            $this->command->warn('⚠️ No hay departamentos. Cancelando EmpleadosTableSeeder.');
            return;
        }

        $empleados = [
            // Trinidad
            ['nombres' => 'Carlos Eduardo',  'apellidos' => 'Roca Pereira',   'dni' => '10234567', 'codigo' => 'BEN-001', 'departamento_id' => $deptos[0] ?? 1],
            ['nombres' => 'María Fernanda',  'apellidos' => 'Suárez Vargas',  'dni' => '10234568', 'codigo' => 'BEN-002', 'departamento_id' => $deptos[0] ?? 1],
            ['nombres' => 'Jorge Luis',      'apellidos' => 'Ribera Aguilera','dni' => '10234569', 'codigo' => 'BEN-003', 'departamento_id' => $deptos[0] ?? 1],
            // Riberalta
            ['nombres' => 'Lucía Alejandra', 'apellidos' => 'Torrico Flores', 'dni' => '10234570', 'codigo' => 'RIB-001', 'departamento_id' => $deptos[1] ?? 2],
            ['nombres' => 'Roberto Carlos',  'apellidos' => 'Paredes Justiniano','dni'=>'10234571','codigo'=>'RIB-002','departamento_id'=>$deptos[1]??2],
            // Guayaramerín
            ['nombres' => 'Ana Paola',       'apellidos' => 'Vaca Guzmán',    'dni' => '10234572', 'codigo' => 'GUA-001', 'departamento_id' => $deptos[2] ?? 3],
            ['nombres' => 'Miguel Ángel',    'apellidos' => 'Choque López',   'dni' => '10234573', 'codigo' => 'GUA-002', 'departamento_id' => $deptos[2] ?? 3],
            // Santa Cruz
            ['nombres' => 'Sandra Patricia', 'apellidos' => 'Melgar Ríos',    'dni' => '10234574', 'codigo' => 'SCZ-001', 'departamento_id' => $deptos[3] ?? 4],
            ['nombres' => 'Luis Fernando',   'apellidos' => 'Aguilera Prado', 'dni' => '10234575', 'codigo' => 'SCZ-002', 'departamento_id' => $deptos[3] ?? 4],
            // La Paz
            ['nombres' => 'Paola Andrea',    'apellidos' => 'Mamani Quispe',  'dni' => '10234576', 'codigo' => 'LPZ-001', 'departamento_id' => $deptos[4] ?? 5],
            ['nombres' => 'Juan Carlos',     'apellidos' => 'Limachi Laura',  'dni' => '10234577', 'codigo' => 'LPZ-002', 'departamento_id' => $deptos[4] ?? 5],
        ];

        foreach ($empleados as $e) {
            Empleado::create([
                'empresa_id'       => 1, // EcoBeni S.R.L.
                'departamento_id'  => $e['departamento_id'],
                'codigo_empleado'  => $e['codigo'],
                'dni'              => $e['dni'],
                'nombres'          => $e['nombres'],
                'apellidos'        => $e['apellidos'],
                'fecha_nacimiento' => now()->subYears(rand(25, 45)),
                'genero'           => collect(['M', 'F'])->random(),
                'email'            => strtolower(str_replace(' ', '.', $e['nombres'] . '.' . $e['apellidos'])) . '@ecobeni.bo',
                'telefono'         => '3-' . rand(4600000, 4699999),
                'direccion'        => 'Ciudad de ' . collect(['Trinidad', 'Riberalta', 'Guayaramerín', 'Santa Cruz', 'La Paz'])->random(),
                'fecha_contratacion' => now()->subMonths(rand(1, 60)),
                'tipo_contrato'    => collect(['indefinido', 'temporal', 'prácticas'])->random(),
                'estado'           => 'activo',
                'foto_perfil'      => null,
                'user_id'          => null,
                'creado_por'       => 1,
            ]);
        }
    }
}
