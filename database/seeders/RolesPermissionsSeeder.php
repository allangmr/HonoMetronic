<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abilities = [
            'read',
            'write',
            'create',
        ];

        $permissions_by_role = [
            'administrador' => [
                'permiso para administrar usuarios del sistema',
                'permisos para administrar modulo de pacientes',
                'permisos para administrar modulo de procedimientos',
                'permisos para administrar modulo de doctores',
                'permisos para administrar modulo de reclamos',
            ],
            'editor' => [
                'permisos para administrar modulo de pacientes',
                'permisos para administrar modulo de procedimientos',
                'permisos para administrar modulo de doctores',
                'permisos para administrar modulo de reclamos',
            ]
        ];

        foreach ($permissions_by_role['administrador'] as $permission) {
            foreach ($abilities as $ability) {
                Permission::create(['name' => $ability . ' ' . $permission]);
            }
        }

        foreach ($permissions_by_role as $role => $permissions) {
            $full_permissions_list = [];
            foreach ($abilities as $ability) {
                foreach ($permissions as $permission) {
                    $full_permissions_list[] = $ability . ' ' . $permission;
                }
            }
            Role::create(['name' => $role])->syncPermissions($full_permissions_list);
        }

        User::find(1)->assignRole('administrador');
        User::find(2)->assignRole('editor');
    }
}
