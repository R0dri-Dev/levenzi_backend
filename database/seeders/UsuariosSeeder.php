<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsuariosSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Asegurar roles base (admin/usuario) - guard 'api' porque el backend usa JWT
        $roles = [
            'admin' => 'api',
            'usuario' => 'api',
        ];

        foreach ($roles as $roleName => $guardName) {
            Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => $guardName,
            ]);
        }

        // 2) Permisos mínimos que usa el sidebar (Spatie los gestiona)
        $permissions = [
            // Usuarios
            'usuarios.view',
            'usuarios.edit',

            // Sedes
            'sedes.view',
            'sedes.edit',

            // Compañías
            'companias.view',
            'companias.edit',

            // Clientes
            'clientes.view',
            'clientes.edit',

            // Doctores
            'doctores.view',
            'doctores.edit',

            // Marcas
            'marcas.view',
            'marcas.edit',

            // Instalaciones
            'instalaciones.view',
            'instalaciones.edit',

            // Productos
            'productos.view',
            'productos.edit',

            // Ventas
            'ventas.view',
            'ventas.edit',

            // Roles
            'roles.view',
            'roles.edit',

            // Permisos
            'permisos.view',
            'permisos.edit',

            // Módulos
            'modulos.view',
            'modulos.edit',
        ];


        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate([
                'name' => $permissionName,
                'guard_name' => 'api',
            ]);
        }

        // Usuarios
        $admin = User::firstOrCreate(
            ['email' => 'admin@levenzi.local'],
            [
                'name' => 'Admin Levenzi',
                'password' => Hash::make('password'),
                'activo' => true,
            ]
        );

        $usuario = User::firstOrCreate(
            ['email' => 'user@levenzi.local'],
            [
                'name' => 'Usuario Levenzi',
                'password' => Hash::make('password'),
                'activo' => true,
            ]
        );

        $adminRole = Role::where('name', 'admin')->where('guard_name', 'api')->first();
        $usuarioRole = Role::where('name', 'usuario')->where('guard_name', 'api')->first();

        // Asignar roles a usuarios (pivot model_has_roles)
        $pivotTable = 'model_has_roles';

        if ($adminRole) {
            $exists = DB::table($pivotTable)
                ->where('model_id', $admin->id)
                ->where('role_id', $adminRole->id)
                ->where('model_type', $admin::class)
                ->exists();

            if (! $exists) {
                DB::table($pivotTable)->insert([
                    'model_id' => $admin->id,
                    'role_id' => $adminRole->id,
                    'model_type' => $admin::class,
                ]);
            }
        }

        if ($usuarioRole) {
            $exists = DB::table($pivotTable)
                ->where('model_id', $usuario->id)
                ->where('role_id', $usuarioRole->id)
                ->where('model_type', $usuario::class)
                ->exists();

            if (! $exists) {
                DB::table($pivotTable)->insert([
                    'model_id' => $usuario->id,
                    'role_id' => $usuarioRole->id,
                    'model_type' => $usuario::class,
                ]);
            }
        }

        $permissionsModel = Permission::whereIn('name', $permissions)->where('guard_name', 'api')->get();
        $permissionIds = $permissionsModel->pluck('id')->all();

        $permissionPivot = 'role_has_permissions';

        if ($adminRole && !empty($permissionIds)) {
            foreach ($permissionIds as $pid) {
                $exists = DB::table($permissionPivot)
                    ->where('permission_id', $pid)
                    ->where('role_id', $adminRole->id)
                    ->exists();

                if (! $exists) {
                    DB::table($permissionPivot)->insert([
                        'permission_id' => $pid,
                        'role_id' => $adminRole->id,
                    ]);
                }
            }
        }

        if ($usuarioRole && !empty($permissionIds)) {
            foreach ($permissionIds as $pid) {
                $exists = DB::table($permissionPivot)
                    ->where('permission_id', $pid)
                    ->where('role_id', $usuarioRole->id)
                    ->exists();

                if (! $exists) {
                    DB::table($permissionPivot)->insert([
                        'permission_id' => $pid,
                        'role_id' => $usuarioRole->id,
                    ]);
                }
            }
        }


    }
}
