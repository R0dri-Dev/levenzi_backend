<?php

namespace App\Modules\menu\Http\Controllers;

use Illuminate\Http\Request;

class MenuController
{
    /**
     * Devuelve los items del sidebar según los permisos del usuario autenticado.
     */
    public function meMenu(Request $request)
    {
        $user = $request->user();

        // Mapeo permiso -> item de sidebar.
        // Ajusta labels/routes/icons si cambias las pantallas.
        $permissionToItem = [
            'usuarios.view' => [
                'label' => 'Usuarios',
                'route' => '/usuarios',
                'icon' => 'users',
            ],
            'sedes.view' => [
                'label' => 'Sedes',
                'route' => '/sedes',
                'icon' => 'company',
            ],
            'companias.view' => [
                'label' => 'Company',
                'route' => '/companias',
                'icon' => 'company',
            ],

            'clientes.view' => [
                'label' => 'Clientes',
                'route' => '/clientes',
                'icon' => 'users',
            ],

            'doctores.view' => [
                'label' => 'Doctores',
                'route' => '/doctores',
                'icon' => 'users',
            ],

            'marcas.view' => [
                'label' => 'Marcas',
                'route' => '/marcas',
                'icon' => 'settings',
            ],

            'instalaciones.view' => [
                'label' => 'Instalaciones',
                'route' => '/instalaciones',
                'icon' => 'settings',
            ],

            'productos.view' => [
                'label' => 'Productos',
                'route' => '/productos',
                'icon' => 'box',
            ],
            'ventas.view' => [
                'label' => 'Ventas',
                'route' => '/ventas',
                'icon' => 'calendar',
            ],

            'roles.view' => [
                'label' => 'Roles',
                'route' => '/roles',
                'icon' => 'settings',
            ],

            'permisos.view' => [
                'label' => 'Permisos',
                'route' => '/permisos',
                'icon' => 'filter',
            ],

            'modulos.view' => [
                'label' => 'Módulos',
                'route' => '/modulos',
                'icon' => 'menu',
            ],
            'familias.view' => [
                'label' => 'Familias',
                'route' => '/familias',
                'icon' => 'box',
            ],

            'unidades-medida.view' => [
                'label' => 'Unidades de Medida',
                'route' => '/unidades-medida',
                'icon' => 'settings',
            ],

            'tipos-unidad-medida.view' => [
                'label' => 'Tipos de Unidad',
                'route' => '/tipos-unidad-medida',
                'icon' => 'settings',
            ],

            'producto-conversiones.view' => [
                'label' => 'Conversiones',
                'route' => '/producto-conversiones',
                'icon' => 'filter',
            ],
        ];

        $items = [];

        foreach ($permissionToItem as $permissionName => $item) {
            if (! empty($permissionName) && $user && method_exists($user, 'hasPermissionTo')) {
                if ($user->hasPermissionTo($permissionName)) {
                    $items[] = [
                        ...$item,
                        'active' => false,
                    ];
                }
            }
        }

        // Siempre mostramos dashboard.
        array_unshift($items, [
            'label' => 'Dashboard',
            'route' => '/dashboard',
            'icon' => 'home',
            'active' => true,
        ]);

        return response()->json($items);
    }
}
