<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(["name" => "Developer"]);
        Role::create(["name" => "Superadmin"]);


        $role= Role::create(["name" => "Admin"]);
        $role->syncPermissions(Permission::pluck('name')->toArray());


        /**
         * @var Role $role
         */
        $role= Role::create(["name" => "medico"]);
        $role->syncPermissions([
            'Ver Partes',
            'Crear Partes',
            'Editar Partes',
            'Eliminar Partes',
        ]);
        $role->options()->sync([
            12, //partes
            13, //Nueva parte
            14, //Pacientes
        ]);

        /**
         * @var Role $role
         */
        $role= Role::create(["name" => "Admisión"]);
        $role->syncPermissions([
            'Ver Partes',
            'Crear Partes',
            'Editar Partes Admisión',
            'Eliminar Partes',
        ]);

        $role->options()->sync([
            22, //partes admision
            13, //Nueva parte
            14, //Pacientes
        ]);





    }
}
