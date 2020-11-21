<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reiniciar roles y permissions en caché
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /*
            CREACIÓN DE PERMISOS
        */

        // Permisos de modificación de usuarios
        Permission::create(['name' => 'crear usuarios']);
        Permission::create(['name' => 'editar usuarios']);
        Permission::create(['name' => 'consultar usuarios']);
        Permission::create(['name' => 'eliminar usuarios']);

        //Permisos de consulta y modificación de inmobiliarios
        Permission::create(['name' => 'crear inmobiliarios']);
        Permission::create(['name' => 'editar inmobiliarios']);
        Permission::create(['name' => 'consultar inmobiliarios']);
        Permission::create(['name' => 'baja inmobiliarios']);
        Permission::create(['name' => 'eliminar inmobiliarios']);

        //Permisos de consulta y modificación de conceptos de inmobiliarios
        Permission::create(['name' => 'crear conceptos']);
        Permission::create(['name' => 'editar conceptos']);
        Permission::create(['name' => 'consultar conceptos']);
        Permission::create(['name' => 'baja conceptos']);
        Permission::create(['name' => 'eliminar conceptos']);

        //Permisos de generación de corte y revisión de inventarios
        Permission::create(['name' => 'crear cortes']);
        Permission::create(['name' => 'consultar cortes']);
        Permission::create(['name' => 'revisar inventarios']);



        // create roles and assign created permissions

        // this can be done as separate statements
        $role_consultor = Role::create(['name' => 'consultor']);
        $role_consultor->givePermissionTo([
                //  Inmobiliarios
                'consultar inmobiliarios',
                'consultar cortes'
            ]);

        // Rol del editor de aplicaciones
        $role_editor = Role::create(['name' => 'editor']);
        $role_editor->givePermissionTo([
                //  Inmobiliarios
                'crear inmobiliarios',
                'editar inmobiliarios',
                'consultar inmobiliarios',
                //  Cortes y revision
                'crear cortes',
                'consultar cortes',
                'revisar inventarios'
            ]);

        $role_admin = Role::create(['name' => 'admin']);
        $role_admin->givePermissionTo(Permission::all());

        $role_banned = Role::create(['name' => 'banned']);
        $role_banned->revokePermissionTo(Permission::all());
    }
}
