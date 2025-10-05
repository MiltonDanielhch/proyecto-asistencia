<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class AsistenciaMenuAppendSeeder extends Seeder
{
    protected $tree = [
        // GRUPO BIOMÉTRICO ─ ASISTENCIA
        [
            'title'      => 'Asistencia',
            'order'      => 1,
            'icon_class' => 'voyager-calendar',
            'route'      => null,
            'url'        => '',
            'children'   => [
                ['title' => 'Empresas',          'route' => 'admin.empresas.index',           'icon_class' => 'voyager-briefcase',         'order' => 1],
                ['title' => 'Sucursales',        'route' => 'admin.sucursales.index',         'icon_class' => 'voyager-shop',              'order' => 2],
                ['title' => 'Departamentos',     'route' => 'admin.departamentos.index',      'icon_class' => 'voyager-categories',        'order' => 3],
                ['title' => 'Empleados',         'route' => 'admin.empleados.index',          'icon_class' => 'voyager-people',            'order' => 4],
                ['title' => 'Dispositivos',      'route' => 'admin.dispositivos.index',       'icon_class' => 'voyager-wifi',              'order' => 5],
                ['title' => 'Horarios',          'route' => 'admin.horarios.index',           'icon_class' => 'voyager-clock',             'order' => 6],
                ['title' => 'Registros',         'route' => 'admin.registros-asistencia.index','icon_class'=> 'voyager-list',               'order' => 7],
                ['title' => 'Incidencias',       'route' => 'admin.incidencias.index',        'icon_class' => 'voyager-warning',           'order' => 8],
                ['title' => 'Reportes',          'route' => 'admin.reportes-asistencia.index','icon_class' => 'voyager-chart',             'order' => 9],
            ],
        ],

        // PERSONAS (IDTGB)
        [
            'title'      => 'Personas',
            'order'      => 10,
            'icon_class' => 'voyager-person',
            'route'      => 'admin.people.index',
            'url'        => '',
        ],

        // CATÁLOGOS IDTGB
        [
            'title'      => 'Catálogos IDTGB',
            'order'      => 11,
            'icon_class' => 'fa-solid fa-folder-tree',
            'route'      => null,
            'url'        => '',
            'children'   => [
                ['title' => 'Parentescos', 'route' => 'admin.parentescos.index', 'icon_class' => 'fa-solid fa-people-group', 'order' => 1],
                ['title' => 'Tasas',       'route' => 'admin.tasas.index',       'icon_class' => 'fa-solid fa-percent',    'order' => 2],
                ['title' => 'Exenciones',  'route' => 'admin.exenciones.index',  'icon_class' => 'fa-solid fa-gift',       'order' => 3],
            ],
        ],

        // INMUEBLES
        [
            'title'      => 'Inmuebles',
            'order'      => 12,
            'icon_class' => 'fa-solid fa-building',
            'route'      => null,
            'url'        => '',
            'children'   => [
                ['title' => 'Inmuebles', 'route' => 'admin.inmuebles.index', 'icon_class' => 'fa-solid fa-home',               'order' => 1],
                ['title' => 'Avalúos',   'route' => 'admin.avaluos.index',   'icon_class' => 'fa-solid fa-file-invoice-dollar','order' => 2],
            ],
        ],

        // TRÁMITES
        [
            'title'      => 'Trámites IDTGB',
            'order'      => 13,
            'icon_class' => 'fa-solid fa-file-lines',
            'route'      => null,
            'url'        => '',
            'children'   => [
                ['title' => 'Trámites', 'route' => 'admin.tramites.index', 'icon_class' => 'fa-solid fa-folder-open', 'order' => 1],
            ],
        ],
    ];

    public function run()
    {
        $menu = Menu::where('name', 'admin')->firstOrFail();

        foreach ($this->tree as $root) {
            $this->createRecursive($menu, $root);
        }
    }

    private function createRecursive($menu, $item, $parentId = null)
    {
        $data = [
            'menu_id'    => $menu->id,
            'parent_id'  => $parentId,
            'title'      => $item['title'],
            'url'        => $item['url'] ?? '',
            'route'      => $item['route'] ?? null,
            'parameters' => '',
            'target'     => '_self',
            'icon_class' => $item['icon_class'],
            'color'      => null,
            'order'      => $item['order'],
        ];

        $dbItem = MenuItem::firstOrCreate(
            ['menu_id' => $menu->id, 'title' => $item['title'], 'parent_id' => $parentId],
            $data
        );

        foreach ($item['children'] ?? [] as $child) {
            $this->createRecursive($menu, $child, $dbItem->id);
        }
    }
}
