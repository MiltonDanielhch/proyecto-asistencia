<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder
{
    public function run(): void
    {
        // Trinidad (sucursal 1)
        Departamento::create([
            'sucursal_id'           => 1,
            'nombre_departamento'   => 'Recursos Humanos',
            'descripcion'           => 'Gestión del talento humano en Trinidad',
            'jefe_empleado_id'      => null, // se actualizará después de tener empleados
            'creado_por'            => 1,
        ]);
        Departamento::create([
            'sucursal_id'           => 1,
            'nombre_departamento'   => 'Operaciones',
            'descripcion'           => 'Control de asistencia y logística',
            'jefe_empleado_id'      => null,
            'creado_por'            => 1,
        ]);

        // Riberalta (sucursal 2)
        Departamento::create([
            'sucursal_id'           => 2,
            'nombre_departamento'   => 'Planta Riberalta',
            'descripcion'           => 'Área de producción amazónica',
            'jefe_empleado_id'      => null,
            'creado_por'            => 1,
        ]);

        // Guayaramerín (sucursal 3)
        Departamento::create([
            'sucursal_id'           => 3,
            'nombre_departamento'   => 'Puerto Interior',
            'descripcion'           => 'Operaciones fluviales y aduaneras',
            'jefe_empleado_id'      => null,
            'creado_por'            => 1,
        ]);

        // Santa Cruz (sucursal 4)
        Departamento::create([
            'sucursal_id'           => 4,
            'nombre_departamento'   => 'Comercial',
            'descripcion'           => 'Ventas y atención al cliente',
            'jefe_empleado_id'      => null,
            'creado_por'            => 1,
        ]);

        // La Paz (sucursal 5)
        Departamento::create([
            'sucursal_id'           => 5,
            'nombre_departamento'   => 'Administración Central',
            'descripcion'           => 'Finanzas y soporte corporativo',
            'jefe_empleado_id'      => null,
            'creado_por'            => 1,
        ]);
    }
}
