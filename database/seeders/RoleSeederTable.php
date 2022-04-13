<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * @var Role $role
         */
        $role= Role::create(["name" => "Banco de Sangre"]);
        $role->syncPermissions([
            'Ver Partes',
        ]);
        $role->options()->sync([
            31, //partes
        ]);
    }
}
