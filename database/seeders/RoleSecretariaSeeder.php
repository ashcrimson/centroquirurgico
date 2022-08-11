<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSecretariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * @var Role $roleSecretaria
         */
        $roleSecretaria = Role::with(['options'])->find(Role::SECRETARIA);

        $roleSecretaria->syncPermissions([
            'Ver Partes',
        ]);

        $roleSecretaria->options()->sync([
            30, //lista espera
        ]);

    }
}
