<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'usuario']);
        $permission = Permission::create(['name' => 'usuario']);

        $admin = Role::create(['name' => 'admin']);
        $permiso_admin = Permission::create(['name' => 'AdminPermiso']);

        $estudiantes = Role::create(['name' => 'estudiantes']);
        $permiso_estudiantes = Permission::create(['name' => 'estudiantes']);

        $role->givePermissionTo($permission);
        $admin->givePermissionTo($permiso_admin);
        $estudiantes->givePermissionTo($permiso_estudiantes);

        $usuarios=\App\Models\User::find(1);
        $usuarios->assignRole('usuario');

        $admin=\App\Models\User::find(2);
        $admin->assignRole('admin');

        $estudiantes=\App\Models\User::find(3);
        $estudiantes->assignRole('estudiantes');

    }
}
