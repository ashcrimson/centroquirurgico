<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class OptionsRoleAdmisionSeeder extends Seeder
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
        $role = Role::find(Role::ADMISION);

        // MANTENEDORES
        $role->options()->syncWithoutDetaching([
            22, //partes admision
            14, //Pacientes
            29, //Medicamentos
            16,
            17,
            18,
            19,
            20,
            21,
            23,
            24,
            25,
            26,
            27,
            28,
//            32,
//            33,
        ]);

    }
}
