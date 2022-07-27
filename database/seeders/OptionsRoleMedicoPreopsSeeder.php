<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class OptionsRoleMedicoPreopsSeeder extends Seeder
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
        $role = Role::find(Role::MEDICO);

        $role->options()->syncWithoutDetaching([
            35
        ]);
    }
}
